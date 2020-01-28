<?php
namespace MetForm\Core\Entries;
defined( 'ABSPATH' ) || exit;

Class Export{
    use \MetForm\Traits\Singleton;
    
    public function export_data($form_id){

        if( !current_user_can( 'manage_options' ) ){
            return;
        }
        
        $fields = Action::instance()->get_fields($form_id);
        $title = get_the_title( $form_id );
        global $wpdb;
        $entries = $wpdb->get_results( "SELECT `post_id`  FROM `".$wpdb->prefix."postmeta` WHERE `meta_key` = 'metform_entries__form_id' AND `meta_value` = $form_id", OBJECT );
        $entries = (is_array($entries)) ? $entries : [];
        $export = [];
        foreach($entries as $entry){
            $entry_modify = [];

            $form_entry = get_post_meta( $entry->post_id, 'metform_entries__form_data', true );
            $form_entry = (is_array($form_entry) ? $form_entry : []);
            $file_entry = get_post_meta( $entry->post_id, 'metform_entries__file_upload', true );
            $file_entry = (is_array($file_entry) ? $file_entry : []);

            $entry_data = array_merge($form_entry, $file_entry);
            $entry_data = (is_array($entry_data)) ? $entry_data : [] ;

            $entry_modify ['ID'] = $entry->post_id;

            foreach( $fields as $key => $value ){
                $header_key = ( ($value->mf_input_label != '') ? $value->mf_input_label : $key );
                if($value->widgetType == 'mf-file-upload'){
                    $entry_modify[$header_key] = (isset($entry_data[$key]) ? ((isset($entry_data[$key]['url'])) ? $entry_data[$key]['url'] : ' ' ) : ' ' );
                }else if($value->widgetType == 'mf-simple-repeater'){
                    $data_string = '';
                    if(is_array($entry_data[$key])){
                        foreach( $entry_data[$key] as $key => $value ){
                            $data_string .= $key.": ".$value." \n";
                        }
                    }
                    $entry_modify[$header_key] = $data_string;
                }else{
                    $entry_modify[$header_key] = (isset($entry_data[$key]) ? ((is_array($entry_data[$key])) ? implode(', ', $entry_data[$key]) : $entry_data[$key]) : ' ' );
                }
            }

            $entry_modify ['DATE'] = get_the_date( 'd-m-Y', $entry->post_id );
            $export[] = $entry_modify;
        }

        $file_name = $title."-export-".time().".csv";
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Description: File Transfer');
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename={$file_name}");
        header("Expires: 0");
        header("Pragma: public");
        $file_pointer = @fopen( 'php://output', 'w' );
        $csv_header = false;
        foreach ( $export as $data ) {
            // Add a header row if it hasn't been added yet
            if ( !$csv_header ) {
                // Use the keys from $data as the titles
                fputcsv($file_pointer, array_keys($data));
                $csv_header = true;
            }
            // Put the data into the stream
            fputcsv($file_pointer, $data);
        }
        // Close the file
        fclose($file_pointer);
        exit;
    }
}
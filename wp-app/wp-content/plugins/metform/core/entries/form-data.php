<?php
namespace MetForm\Core\Entries;
defined( 'ABSPATH' ) || exit;

Class Form_Data{
    public static function format_form_data( $form_id, $form_data ){
        $map_data = \MetForm\Core\Entries\Action::instance()->get_fields($form_id);
        $map_data = json_decode(json_encode($map_data), true);
        ob_start();
        ?>
        <div class="metform-entry-data container">
            <table class='attr-table attr-table-hover'>
            <thead>
                <tr>
                <th scope="attr-col"><?php esc_html_e('Name', 'metform')?></th>
                <th scope="attr-col"><?php esc_html_e('Value', 'metform')?></th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($map_data as $key => $value){
                if( ( $value['widgetType'] != 'mf-file-upload' ) && ( $value['widgetType'] != 'mf-simple-repeater' ) ){
                    echo "<tr>";
                    echo "<th scope='attr-row'><strong>".esc_html(($map_data[$key]['mf_input_label'] != '') ? $map_data[$key]['mf_input_label'] : $key)."</strong></th>";
                    echo "<td>".esc_html((array_key_exists($key, $form_data) ? ((is_array($form_data[$key])) ? implode(', ', $form_data[$key]) : $form_data[$key]) : ' '))."</td>";
                    echo "</tr>";
                }

                if( $value['widgetType'] == 'mf-simple-repeater' ){
                    echo "<tr>";
                    echo "<th scope='attr-row'><strong>".esc_html(($map_data[$key]['mf_input_label'] != '') ? $map_data[$key]['mf_input_label'] : $key)."</strong></th>";
                    echo "<td>";
                    $repeater_data = ((array_key_exists($key, $form_data)) ? $form_data[$key] : []);
                    foreach($repeater_data as $key => $value){
                        echo "<strong>".esc_html($key).": </strong>";
                        echo "<span>".esc_html($value)."</span>";
                        echo "<br>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }

            }
            ?>
            </tbody>
            </table>
        </div>
        <?php
        $data_html = ob_get_contents();
        ob_end_clean();
        return $data_html;
    }

    public static function format_data_for_mail( $form_id, $form_data ){
        $map_data = \MetForm\Core\Entries\Action::instance()->get_fields($form_id);
        $map_data = json_decode(json_encode($map_data), true);
        ob_start();
        ?>
        <div>
            <table style="width: 100%; max-width: 100%; margin-bottom: 20px;">
            <thead style="text-align: left;">
                <tr style="display: table-row;">
                <th style="border-top: 0;vertical-align: bottom; border-bottom: 2px solid #ddd; padding: 8px; line-height: 1.42857143;"><?php esc_html_e('Name', 'metform')?></th>
                <th style="border-top: 0;vertical-align: bottom; border-bottom: 2px solid #ddd; padding: 8px; line-height: 1.42857143;"><?php esc_html_e('Value', 'metform')?></th>
                </tr>
            </thead>
            <tbody style="text-align: left;">
            <?php
            foreach($map_data as $key => $value){
                if( ( $value['widgetType'] != 'mf-file-upload' ) && ( $value['widgetType'] != 'mf-simple-repeater' ) && ( $value['widgetType'] != 'mf-recaptcha' ) ){
                    echo "<tr style='text-align: left;'>";
                    echo "<th style='padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;'><strong>".esc_html(($map_data[$key]['mf_input_label'] != '') ? $map_data[$key]['mf_input_label'] : $key)."</strong></th>";
                    echo "<td style='padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;'>".esc_html((array_key_exists($key, $form_data) ? ((is_array($form_data[$key])) ? implode(', ', $form_data[$key]) : $form_data[$key]) : ' '))."</td>";
                    echo "</tr>";
                }

                if( $value['widgetType'] == 'mf-simple-repeater' ){
                    echo "<tr style='text-align: left;'>";
                    echo "<th style='padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;'><strong>".esc_html(($map_data[$key]['mf_input_label'] != '') ? $map_data[$key]['mf_input_label'] : $key)."</strong></th>";
                    echo "<td style='padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;'>";
                    $repeater_data = ((array_key_exists($key, $form_data)) ? $form_data[$key] : []);
                    foreach($repeater_data as $key => $value){
                        echo "<strong style='color: #000;'>".esc_html($key).": </strong>";
                        echo "<span style='color: #000;'>".esc_html($value)."</span>";
                        echo "<br>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }

            }
            ?>
            </tbody>
            </table>
        </div>
        <?php
        $data_html = ob_get_contents();
        ob_end_clean();
        return $data_html;
    }

    public static function format_form_data_style_2( $form_id, $form_data ){
        $map_data = \MetForm\Core\Entries\Action::instance()->get_fields($form_id);
        $map_data = json_decode(json_encode($map_data), true);
        ob_start();
        ?>
        <div class="metform-entry-data container">
            <table class='mf-entry-data' cellpadding="5" cellspacing="0">
            <tbody>
            <?php
            foreach($map_data as $key => $value){
                if( ( $value['widgetType'] != 'mf-file-upload' ) && ( $value['widgetType'] != 'mf-simple-repeater' ) ){
                    echo "<tr class='mf-data-label'>";
                    echo "<td colspan='2'><strong>".esc_html(($map_data[$key]['mf_input_label'] != '') ? $map_data[$key]['mf_input_label'] : $key)."</strong></td>";
                    echo "</tr>"; 
                    echo "<tr class='mf-data-value'>";
                    echo "<td class='mf-value-space'>&nbsp;</td>";
                    echo "<td>".esc_html((array_key_exists($key, $form_data) ? ((is_array($form_data[$key])) ? implode(', ', $form_data[$key]) : $form_data[$key]) : ' '))."</td>";
                    echo "</tr>";
                }

                if( $value['widgetType'] == 'mf-simple-repeater' ){
                    echo "<tr class='mf-data-label'>";
                    echo "<td colspan='2'><strong>".esc_html(($map_data[$key]['mf_input_label'] != '') ? $map_data[$key]['mf_input_label'] : $key)."</strong></td>";
                    echo "</tr>";
                    echo "<tr class='mf-data-value'>";
                    echo "<td class='mf-value-space'>&nbsp;</td>";
                    echo "<td>";
                    $repeater_data = ((array_key_exists($key, $form_data)) ? $form_data[$key] : []);
                    foreach($repeater_data as $key => $value){
                        echo "<strong>".esc_html($key).": </strong>";
                        echo "<span>".esc_html($value)."</span>";
                        echo "<br>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }

            }
            ?>
            </tbody>
            </table>
        </div>
        <?php
        $data_html = ob_get_contents();
        ob_end_clean();
        return $data_html;
    }

    public static function format_data_for_mail_style_2( $form_id, $form_data ){
        $map_data = \MetForm\Core\Entries\Action::instance()->get_fields($form_id);
        $map_data = json_decode(json_encode($map_data), true);
        ob_start();
        ?>
        <div>
            <table width="100%" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF" style="border: 1px solid #EAF2FA">
            <tbody>
            <?php
            foreach($map_data as $key => $value){
                if( ( $value['widgetType'] != 'mf-file-upload' ) && ( $value['widgetType'] != 'mf-simple-repeater' ) && ( $value['widgetType'] != 'mf-recaptcha' ) ){
                    echo "<tr bgcolor='#EAF2FA'>";
                    echo "<td colspan='2'><strong>".esc_html(($map_data[$key]['mf_input_label'] != '') ? $map_data[$key]['mf_input_label'] : $key)."</strong></td>";
                    echo "</tr>";
                    echo "<tr bgcolor='#FFFFFF'>";
                    echo "<td width='20'>&nbsp;</td>";
                    echo "<td>".esc_html((array_key_exists($key, $form_data) ? ((is_array($form_data[$key])) ? implode(', ', $form_data[$key]) : $form_data[$key]) : ' '))."</td>";
                    echo "</tr>";
                }

                if( $value['widgetType'] == 'mf-simple-repeater' ){
                    echo "<tr bgcolor='#EAF2FA'>";
                    echo "<td colspan='2'><strong>".esc_html(($map_data[$key]['mf_input_label'] != '') ? $map_data[$key]['mf_input_label'] : $key)."</strong></td>";
                    echo "</tr>";
                    echo "<tr bgcolor='#FFFFFF'>";
                    echo "<td width='20'>&nbsp;</td>";
                    echo "<td>";
                    $repeater_data = ((array_key_exists($key, $form_data)) ? $form_data[$key] : []);
                    foreach($repeater_data as $key => $value){
                        echo "<strong>".esc_html($key).": </strong>";
                        echo "<span>".esc_html($value)."</span>";
                        echo "<br>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }

            }
            ?>
            </tbody>
            </table>
        </div>
        <?php
        $data_html = ob_get_contents();
        ob_end_clean();
        return $data_html;
    }
}
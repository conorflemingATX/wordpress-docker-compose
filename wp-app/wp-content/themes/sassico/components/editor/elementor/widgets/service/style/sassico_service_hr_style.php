<?php 

$sassico_service_box_highlight = '';
if (defined( 'FW' )) {
    $sassico_service_box_highlight = sassico_meta_option(get_the_ID(),'sassico_service_box_highlight');
    $sassico_service_details__footer_button_title = sassico_meta_option(get_the_ID(),'sassico_service_details__footer_button_title');
    
    if ($sassico_service_box_highlight == 'yes') {
        $sassico_service_box_highlight = 'sassico-service-featured';
    }
}

?>

<div class="col-lg-4 col-md-6 sassico-service-column">
    <div class="sassico-service-hr-style-outer <?php echo esc_attr($sassico_service_box_highlight); ?>">
        <a href="<?php echo esc_url(the_permalink());?>" class="sassico-service-hr-style text-center">
            <?php if(defined('FW')){
            $service_icon_holder = fw_get_db_post_option(get_the_ID(), 'sassico_service_icon_pickers');
            if($service_icon_holder) { ?>
            <div class="sassico-thumbnail d-inline-block">
            <?php 
                if ($service_icon_holder['type'] == 'custom-upload') {
                    $service_icon = $service_icon_holder['attachment-id'];
                    echo wp_get_attachment_image($service_icon); ?>
                    <img src="<?php echo esc_url(($service_bg_image)); ?>" class="sassico-service-hover-icon" alt="<?php the_title() ?>" /> <?php
                } else { ?>
                <?php  if ($service_icon_holder['type'] != 'none') { ?>
                    <i class="<?php echo esc_attr($service_icon_holder['icon-class'])?> sassico-service-icon"></i>
                <?php } ?>
                <?php }
            ?>
            </div>
            <?php } } ?>
            <?php the_title('<h2 class="sassico-service-title">', '</h2>'); ?>
            <?php the_excerpt();?>
            <span class="sassico-view-more-btn"><i class="icon icon-plus"></i><?php echo esc_html($sassico_service_details__footer_button_title);?></span>
            <div class="sassico-hover-bubbles">
                <div class="sassico-hover-bubble bubble-one"></div>
                <div class="sassico-hover-bubble bubble-two"></div>
                <div class="sassico-hover-bubble bubble-three"></div>
                <div class="sassico-hover-bubble bubble-four"></div>
            </div>
        </a>
        <div class="sassico-service-memphis"></div>
    </div>
</div>
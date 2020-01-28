<?php 

$sassico_icon_box_style_color = '';
$sassico_service_box_highlight = '';
$color = '#ff518b';
if (defined( 'FW' )) {
    $sassico_icon_box_style_color = sassico_meta_option(get_the_ID(),'sassico_icon_box_style_color');
    $sassico_service_box_highlight = sassico_meta_option(get_the_ID(),'sassico_service_box_highlight');
    
    if ($sassico_icon_box_style_color != '') {
        $color = $sassico_icon_box_style_color;
    }
    if ($sassico_service_box_highlight == 'yes') {
        $sassico_service_box_highlight = 'sassico-service-featured';
    }
}
?>
<div class="col-lg-4 col-md-6 sassico-service-column">
    <a href="<?php echo esc_url(the_permalink());?>" class="sassico-service-content-with-icon text-center <?php echo esc_attr($sassico_service_box_highlight); ?>">
        <?php if(defined('FW')){
        $service_icon_holder = fw_get_db_post_option(get_the_ID(), 'sassico_service_icon_pickers');
        if($service_icon_holder) { ?>
        <div class="sassico-thumbnail-holder" style="--service-box-color: <?php echo esc_attr($color);?>">
            <div class="sassico-thumbnail" style="--service-box-color: <?php echo esc_attr($color);?>">    
                <?php 
                    if ($service_icon_holder['type'] == 'custom-upload') {
                        $service_icon = $service_icon_holder['attachment-id'];
                        echo wp_get_attachment_image($service_icon);
                    } else { ?>
                    <?php  if ($service_icon_holder['type'] != 'none') { ?>
                        <i class="<?php echo esc_attr($service_icon_holder['icon-class'])?> sassico-service-icon"></i>
                    <?php } ?>
                    <?php }
                ?>
            </div>
        </div>
        <?php } } 
        the_title('<h2 class="sassico-service-title">', '</h2>');
        ?>
        <?php the_excerpt();?>
        <div class="sassico-memphis-bg"></div>
    </a>
</div>
<div class="col-lg-4 col-md-6 sassico-service-border">
    <a href="<?php echo esc_url(the_permalink());?>" class="sassico-service-content">
        <div class="sassico-service-front-content-outer">
            <div class="sassico-service-front-content-inner">
                <?php if(defined('FW')){
                $service_icon_holder = fw_get_db_post_option(get_the_ID(), 'sassico_service_icon_pickers');
                if($service_icon_holder) { ?>
                <div class="sassico-thumbnail">
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
                <?php } } the_title('<h2 class="sassico-service-title">', '</h2>'); ?>
            </div>
        </div>
        <div class="sassico-service-hover-content-outer"
            style="background-image: url('<?php echo esc_url(($service_bg_image)); ?>')">
            <div class="sassico-service-hover-content-inner">
                <?php the_title('<h2 class="sassico-service-title">', '</h2>'); ?>
                <?php the_excerpt();?>
            </div>
        </div>
    </a>
</div>
<?php 
$testimonials = isset($sassico_testimonial_list) ? $sassico_testimonial_list : [];

$dots_color_one = '';
if ($sassico_testimonial_style_two_dot_color_one == '') {
    $dots_color_one = '#00d280';
} else {
    $dots_color_one = $sassico_testimonial_style_two_dot_color_one;
}

$dots_color_two = '';
if ($sassico_testimonial_style_two_dot_color_two == '') {
    $dots_color_two = '#99edcc';
} else {
    $dots_color_two = $sassico_testimonial_style_two_dot_color_two;
}
if (is_array($testimonials) && !empty($testimonials)) {

?>
    <div class="swiper-container sassico-testimonial-slider <?php echo esc_attr($sassico_testimonial_style); ?>">
        <div class="swiper-wrapper">
            <?php foreach ($testimonials as $testimonial) { ?>
                <div class="swiper-slide">
                    <div class="sassico-single-testimonial-wraper">
                        <div class="row">
                            <div class="col-lg-3 text-center">
                                <?php if ($testimonial['sassico_testimonial_client_image']['url'] !== '') { ?>
                                <div class="sassico-testimonial-avatar-group">
                                    <div class="sassico-testimonial-avatar">
                                        <img src="<?php echo esc_url($testimonial['sassico_testimonial_client_image']['url'])?>" alt="sassico testimonial image">
                                        <div class="sassico-testimonial-dots">
                                            <div class="sassico-testimonial-dot dot-one" style="--dot-color-one: <?php echo esc_attr($dots_color_one); ?>"></div>
                                            <div class="sassico-testimonial-dot dot-two" style="--dot-color-two: <?php echo esc_attr($dots_color_two); ?>"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php }; ?>
                            </div>
                            <div class="col-lg-9">
                                <div class="sassico-testimonial-content">
                                    <?php if ($settings['sassico_testimonial_quote_image_style'] != 'none') { ?>
                                    <div class="sassico-testimonial-quote-image">
                                        <?php 
                                        switch ($settings['sassico_testimonial_quote_image_style']) {
                                            case 'image': 
                                                if ($settings['sassico_testimonial_quote_image']['url'] != '') {
                                            ?>
                                                <img src="<?php echo esc_url($settings['sassico_testimonial_quote_image']['url'])?>" alt="sassico quote icon">
                                            <?php } break;
                                            case 'icon': 
                                                if ($settings['sassico_testimonial_quote_icon'] != '') {
                                            ?>
                                                <i class="<?php echo esc_attr($settings['sassico_testimonial_quote_icon']); ?> sassico-testimonial-icon"></i>
                                            <?php } break;
                                            
                                            default:
                                            if ($settings['sassico_testimonial_quote_image']['url'] != '') { ?>
                                                <img src="<?php echo esc_url($settings['sassico_testimonial_quote_image']['url'])?>" alt="sassico quote icon">
                                            <?php } break;
                                        }
                                        ?>
                                    </div>
                                    <?php } ?>
                                    
                                    <?php if($testimonial['sassico_testimonial_review'] !== '') { ?>
                                        <p><?php echo esc_html($testimonial['sassico_testimonial_review']); ?></p>
                                    <?php }; ?>

                                    <?php if($testimonial['sassico_testimonial_client_name'] !== '' || $testimonial['sassico_testimonial_designation'] !== '' ) { ?>
                                    <div class="sassico-client-details">

                                    <?php if($testimonial['sassico_testimonial_client_name'] !== '') { ?>
                                        <h2 class="sassico-client-name"><?php echo esc_html($testimonial['sassico_testimonial_client_name']); ?></h2>
                                    <?php }; ?>

                                    <?php if($testimonial['sassico_testimonial_designation'] !== '') { ?>
                                        <h3 class="sassico-client-designation"><?php echo esc_html($testimonial['sassico_testimonial_designation']); ?></h3>
                                    <?php }; ?>

                                    </div>
                                    <?php }; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="sassico-nav-group">
            <span class="sassico-button-next sassico-nav-button square-style">
                <i class="fa fa-angle-right"></i>
            </span>
            <span class="sassico-button-prev sassico-nav-button square-style">
                <i class="fa fa-angle-left"></i>
            </span>
        </div>
    </div>
<?php
}
?>
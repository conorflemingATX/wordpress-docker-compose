<?php 
$testimonials = isset($sassico_testimonial_list) ? $sassico_testimonial_list : [];
if (is_array($testimonials) && !empty($testimonials)) {

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="<?php echo esc_attr($sassico_testimonial_style); ?>">
                <?php if ($settings['sassico_testimonial_quote_image_style'] != 'none') { ?>
                <div class="sassico-testimonial-quote-image">
                    <?php 
                    switch ($settings['sassico_testimonial_quote_image_style']) {
                        case 'image': 
                            if ($settings['sassico_testimonial_quote_image']['url'] != '') {
                        ?>
                            <img class="swiper-lazy" src="<?php echo esc_url($settings['sassico_testimonial_quote_image']['url'])?>" alt="sassico quote icon">
                        <?php } break;
                        case 'icon': 
                            if ($settings['sassico_testimonial_quote_icon'] != '') {
                        ?>
                            <i class="<?php echo esc_attr($settings['sassico_testimonial_quote_icon']); ?> sassico-testimonial-icon"></i>
                        <?php } break;
                        
                        default:
                        if ($settings['sassico_testimonial_quote_image']['url'] != '') { ?>
                            <img class="swiper-lazy" src="<?php echo esc_url($settings['sassico_testimonial_quote_image']['url'])?>" alt="sassico quote icon">
                        <?php } break;
                    }
                    ?>
                </div>
                <?php } ?>
                <div class="sassico-sync-slider-content-wraper">
                    <div class="swiper-container sassico-sync-slider-top">
                        <div class="swiper-wrapper">
                            <?php foreach ($testimonials as $testimonial) { ?>
                            <div class="swiper-slide">
                                <div class="sassico-sync-slider-content">
                                    <ul class="sassico-stars">
                                        <?php
                                                $reviewData = isset($testimonial['sassico_testimonial_rating']) ? $testimonial['sassico_testimonial_rating'] : 0;
                                                for($m = 1; $m <= 5; $m++){
                                                    $iconStart = 'fa fa-star-o';
                                                    if($reviewData >= $m){
                                                        $iconStart = 'fa fa-star';
                                                    }
                                                ?>
                                        <li><i class="<?php esc_attr( $iconStart ); ?>"></i></li>
                                        <?php }?>
                                    </ul>
                                    <?php if($testimonial['sassico_testimonial_review'] !== '') { ?>
                                    <p><?php echo esc_html($testimonial['sassico_testimonial_review']); ?></p>
                                    <?php }; ?>
                                </div>
                            </div>
                            <?php }; ?>
                        </div>
                    </div>
                    <div class="swiper-container sassico-sync-slider-thumbs">
                        <div class="swiper-wrapper">
                            <?php foreach ($testimonials as $testimonial) { ?>
                            <div class="swiper-slide">
                                <div class="sassico-sync-slider-thumb media">
                                    <?php if ($testimonial['sassico_testimonial_client_image']['url'] !== '') {?>
                                    <div class="sassico-testimonial-avatar-group">
                    
                                        <?php if ($testimonial['sassico_testimonial_client_image']['url'] !== '') { ?>
                                        <img class="swiper-lazy" src="<?php echo esc_url($testimonial['sassico_testimonial_client_image']['url'])?>"
                                            alt="sassico testimonial image">
                                        <?php } ?>
                    
                                    </div>
                                    <?php } ?>
                    
                                    <?php if($testimonial['sassico_testimonial_client_name'] !== '' || $testimonial['sassico_testimonial_designation'] !== '' ) { ?>
                                    <div class="sassico-client-details align-self-center">
                    
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
                            <?php }; ?>
                        </div>
                    </div>
                    <div class="sassico-nav-group">
                        <span class="sassico-button-prev sassico-nav-button nav-button-large">
                            <i class="fa fa-angle-left"></i>
                        </span>
                        <span class="sassico-button-next sassico-nav-button nav-button-large">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
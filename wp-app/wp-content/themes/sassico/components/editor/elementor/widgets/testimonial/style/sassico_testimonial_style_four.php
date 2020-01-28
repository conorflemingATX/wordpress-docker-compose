<?php 

$testimonials = isset($sassico_testimonial_list) ? $sassico_testimonial_list : [];
if (is_array($testimonials) && !empty($testimonials)) {
?>
    <div class="swiper-container sassico-hr-managemnt-testimonial sassico-testimonial-slider <?php echo esc_attr($sassico_testimonial_style); ?>">
        <div class="swiper-wrapper">
        <?php foreach ($testimonials as $testimonial) { ?>
            <div class="swiper-slide">
                <div class="row no-gutters">
                    <div class="col-lg-4">
                        <?php if ($testimonial['sassico_testimonial_client_image']['url'] !== '' || $settings['sassico_testimonial_quote_image']['url'] !== '') {?>
                        <div class="sassico-testimonial-avatar-group">
                            <?php if ($testimonial['sassico_testimonial_client_image']['url'] !== '') { ?>
                            <img class="swiper-lazy" src="<?php echo esc_url($testimonial['sassico_testimonial_client_image']['url'])?>" alt="sassico testimonial image">
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <div class="sassico-nav-group">
                            <span class="sassico-button-prev sassico-nav-button nav-button-square">
                                <i class="fa fa-angle-left"></i>
                            </span>
                            <span class="sassico-button-next sassico-nav-button nav-button-square">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="sassico-testimonial-content">
                            <div class="sassico-author-info-wraper">
                                <div class="float-left w-50">
                                    <ul class="sassico-stars">
                                        <?php
                                        $reviewData = isset($testimonial['sassico_testimonial_rating']) ? $testimonial['sassico_testimonial_rating'] : 0;
                                        for($m = 1; $m <= 5; $m++){
                                            $iconStart = 'fa fa-star-o';
                                            if($reviewData >= $m){
                                                $iconStart = 'fa fa-star';
                                            }
                                        ?>
                                        <li><i class="<?php esc_attr( $iconStart );?>"></i></li>
                                        <?php }?>
                                    </ul>
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
                                <div class="float-right w-50 text-right">
                                    <?php if ($testimonial['sassico_testimonial_client_logo']['url'] !== '') { ?>
                                    <img class="swiper-lazy" src="<?php echo esc_url($testimonial['sassico_testimonial_client_logo']['url'])?>" alt="sassico client logo">
                                    <?php } ?>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <?php if($testimonial['sassico_testimonial_review'] !== '') { ?>
                                <p><?php echo esc_html($testimonial['sassico_testimonial_review']); ?></p>
                            <?php }; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }; ?>
        </div>
    </div>
<?php
}
?>
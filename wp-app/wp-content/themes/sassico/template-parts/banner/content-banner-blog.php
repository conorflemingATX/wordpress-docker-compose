<?php 
   $banner_image    =  '';
   $banner_title    = '';
   $header_style    = 'standard';
   
if ( defined( 'FW' ) ) { 
   $banner_settings         = sassico_option('blog_banner_setting');
   $banner_style            = sassico_option('sub_page_banner_style');
   $header_style            = sassico_option('header_layout_style', 'standard');
  
   //image
   $banner_image = ( is_array($banner_settings['banner_blog_image']) && $banner_settings['banner_blog_image']['url'] != '') ? 
                        $banner_settings['banner_blog_image']['url'] : SASSICO_IMG.'/banner/bredcumbs-1.png';

   //title 
   $banner_title = (isset($banner_settings['banner_blog_title']) && $banner_settings['banner_blog_title'] != '') ? 
                        $banner_settings['banner_blog_title'] : get_bloginfo( 'name' );
   //show
   $show = (isset($banner_settings['blog_show_banner'])) ? $banner_settings['blog_show_banner'] : 'yes'; 
   // banner overlay
   $show = (isset($banner_settings['blog_show_banner'])) ? $banner_settings['blog_show_banner'] : 'yes'; 
    
   //breadcumb 
   $show_breadcrumb =  (isset($banner_settings['blog_show_breadcrumb'])) ? $banner_settings['blog_show_breadcrumb'] : 'yes';

 }else{
     //default
   $banner_image             = SASSICO_IMG.'/banner/bredcumbs-1.png';
   $banner_title             = get_bloginfo( 'name' );
   $show                     = 'yes';
   $show_breadcrumb          = 'yes';
 }
 if( isset($banner_image) && $banner_image != ''){
    $banner_image = 'style="background-image:url('.esc_url( $banner_image ).');"';
}
$banner_heading_class = '';
if($header_style=="transparent"){
   $banner_heading_class     = "mt-80";   
};  
$wraper_class = 'xs-jumbotron d-flex align-items-center ';
if (is_single() || is_search() || is_home()) {
    $wraper_class .= ' xs_single_blog_banner ';
}

?>

<?php if(isset($show) && $show == 'yes'): ?>

    <section class="<?php echo esc_attr($wraper_class); echo esc_attr($banner_image == '' ?' banner-solid':' banner-bg'); ?>" <?php echo wp_kses_post( $banner_image ); ?>>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="xs-jumbotron-content-wraper">
                        <h3 class="xs-jumbotron-title">
                            <?php
                            if(is_archive()){
                                the_archive_title();
                            }elseif(is_single()){
                                the_title();
                            }else {
                                echo esc_html($banner_title);
                            }
                            ?>
                        </h3>
    
                        <?php if(isset($show_breadcrumb) && $show_breadcrumb == 'yes'): ?>
                            <?php sassico_get_breadcrumbs(" > "); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
<?php endif; ?>     
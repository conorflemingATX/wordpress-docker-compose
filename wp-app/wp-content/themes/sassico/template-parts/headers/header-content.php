<?php
   $class = '';
   $title = '';
   $default_class = '';
   if ( defined( 'FW' ) ) { 
      $header_top_info_show     = sassico_option('header_top_info_show');

      $header_contact_mail          = sassico_option('header_contact_mail');
      $header_contact_address       = sassico_option('header_contact_address');
      $header_Contact_number       = sassico_option('header_Contact_number');
      
      $header_nav_search_section    = sassico_option('header_nav_search_section');
      $header_quota_button          = sassico_option('header_quota_button');
      if($header_quota_button['style'] == 'yes'){
      $header_quota_text            =  $header_quota_button ['yes']['header_quota_text'];
      $header_quota_url             = $header_quota_button ['yes']['header_quota_url'];
      }
      //Page settings
      $header_nav_sticky            = sassico_option('header_nav_sticky');
      $default_class .="";
   
   }else{
      $header_top_info_show    = "no";
      $header_contact_mail          = '';
      $header_contact_address      = '';
      $header_quota_button          = 'yes';
      $header_nav_search_section    = 'yes';
      $header_quota_url             = "#";
      $header_quota_text            = esc_html__('Get a quote','sassico');
      $header_nav_sticky            = 'no';
      $header_quota_button = [];
      $header_quota_button['style'] = "no";
      $noquota = '';
      $default_class .= 'header_default';
      
   }  

?>
 <?php if(defined( 'FW' ) && $header_top_info_show =='yes' ): ?>
<div class="topbar">
   <div class="container">
      <ul class="top-info">
         <?php if($header_contact_mail!=''): ?>
           <li><i class="icon icon-envelope2"></i> <?php echo sassico_kses($header_contact_mail); ?> </li>
         <?php endif; ?>
         <?php if($header_contact_address!=''): ?>
           <li><i class="icon icon-map-marker1"></i> <?php echo sassico_kses($header_contact_address); ?></li>
         <?php endif; ?> 
         <?php if($header_Contact_number!=''): ?>
           <li><i class="icon icon-phone-call2"></i> <?php echo sassico_kses($header_Contact_number); ?></li>
         <?php endif; ?> 
      </ul>
   <!-- end container -->
   </div>
</div>
<?php endif; ?>
<header id="header" class="header header-standard <?php echo esc_attr( $default_class); ?> <?php echo esc_attr($header_nav_sticky=='yes'?'navbar-sticky':''); ?>">
   <div class="header-wrapper">
      <div class="container">
         <nav class="navbar navbar-expand-lg">
            <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
               <img  class="img-fluid" src="<?php 
                  echo esc_url(
                     sassico_src(
                        'general_main_logo',
                        SASSICO_IMG . '/logo/logo-common.png'
                     )
                  );
               ?>" alt="<?php bloginfo('name'); ?>">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                  data-target="#primary-nav" aria-controls="primary-nav" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
            </button>
            <?php get_template_part( 'template-parts/navigations/nav', 'primary' ); ?>
            <?php if(defined( 'FW' )): ?>
               <?php if($header_nav_search_section=='yes'): ?>
               <div class="nav-search-area">
                  <div class="nav-search">
                     <span id="search">
                     <i class="fa fa-search" aria-hidden="true"></i>
                     </span>
                  </div>
                  <div class="search-block">
                     <?php get_search_form(); ?>
                  </div>
                  <!--Search End-->
               </div>
               <?php endif; ?>
            <?php endif; ?>
            <!-- Site search end-->
            <?php if(defined( 'FW' )): ?>
               <?php if($header_quota_button['style'] =='yes' && $header_quota_text != ''): ?>
                  <div class="header-quote <?php if(!is_user_logged_in()){echo esc_attr("ml-auto");}?>">
                     <a href="<?php echo esc_url($header_quota_url); ?>" class="quote-btn btn">  <?php echo esc_html($header_quota_text); ?>
                     </a>
                  </div>   
               <?php endif; ?>
            <?php endif; ?>
         </nav>
      </div><!-- container end-->
   </div><!-- header wrapper end-->
</header>


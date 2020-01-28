<?php

namespace Elementor;
use \ElementsKit\Modules\Controls\Controls_Manager as ElementsKit_Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Sassico_Blog_Widget extends Widget_Base {

    public function get_name() {
        return 'sassico-blog';
    }

    public function get_title() {
        return esc_html__( 'SASSICO Blog', 'sassico' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_categories() {
        return [ 'sassico-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
			'sassico_blog_content_section',
			[
				'label' => __( 'Content', 'sassico' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
            'sassico_blog_posts_order_by',
            [
                'label'   => esc_html__( 'Order by', 'sassico' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'date'          => esc_html__( 'Date', 'sassico' ),
                    'title'         => esc_html__( 'Title', 'sassico' ),
                    'author'        => esc_html__( 'Author', 'sassico' ),
                    'modified'      => esc_html__( 'Modified', 'sassico' ),
                    'comment_count' => esc_html__( 'Comments', 'sassico' ),
                ],
                'default' => 'date',
            ]
        );
 
        $this->add_control(
            'sassico_blog_posts_sort',
            [
                'label'   => esc_html__( 'Order', 'sassico' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'ASC'  => esc_html__( 'ASC', 'sassico' ),
                    'DESC' => esc_html__( 'DESC', 'sassico' ),
                ],
                'default' => 'DESC',
            ]
        );
 
        $this->add_control(
            'sassico_blog_posts_clumnn',
            [
                'label'   => esc_html__( 'Order', 'sassico' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    '4'  => esc_html__( '3 Column', 'sassico' ),
                    '6' => esc_html__( '2 Column', 'sassico' ),
                ],
                'default' => '4',
            ]
        );

        $this->add_control(
            'sassico_blog_posts_num',
            [
                'label'     => esc_html__( 'Posts Count', 'sassico' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 100,
                'default'   => 1,
            ]
        );

        $this->add_control(
            'sassico_blog_posts_offset',
            [
                'label'     => esc_html__( 'Offset', 'sassico' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 0,
                'max'       => 20,
                'default'   => 0,
            ]
        );

        $this->add_control('sassico_post_cat',
            [
                'label'     => esc_html__( 'Category', 'sassico' ),
                'type'      => \Elementor\Controls_Manager::SELECT2,
                'multiple'  => true,
                'default'   => '',
                'options'   => $this->getCategories(),
            ]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
			'sassico_blog_container',
			[
				'label' => __( 'Container', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sassico_blog_container_bg',
			[
				'label' => __( 'Background Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-blog-post' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
        
        $this->start_controls_section(
			'sassico_blog_meta',
			[
				'label' => __( 'Meta', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sassico_blog_category_color',
			[
				'label' => __( 'Category Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-blog-post .post-cat' => 'color: {{VALUE}}',
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_blog_category_typography',
				'label' => __( 'Typography', 'sassico' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .sassico-blog-post .post-cat',
                'separetor' => 'before',
			]
		);

		$this->add_responsive_control(
			'sassico_blog_author_color',
			[
				'label' => __( 'Author Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .post-author-info .author-name' => 'color: {{VALUE}}',
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_blog_author_typography',
				'label' => __( 'Typography', 'sassico' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .post-author-info .author-name',
                'separetor' => 'before',
			]
		);

		$this->end_controls_section();

    }

    protected function render( ) {
       $settings = $this->get_settings_for_display();

       extract($settings);
       $sassico_blog_posts_offset = ($sassico_blog_posts_offset == '') ? 0 : $sassico_blog_posts_offset;

       $default    = [
           'orderby'           => array( $sassico_blog_posts_order_by => $sassico_blog_posts_sort ),
           'posts_per_page'    => $sassico_blog_posts_num,
           'offset'            => $sassico_blog_posts_offset,
           'cat'               => $sassico_post_cat,
       ];

        $post_query = new \WP_Query( $default ); ?>
        <div class="row">
            <?php  
                while ( $post_query->have_posts() ) {
                $post_query->the_post();
            ?>
                <div class="col-lg-<?php echo esc_attr($sassico_blog_posts_clumnn); ?> col-md-6">
                    <article class="sassico-blog-post">
                        <?php if (has_post_thumbnail()) { ?>
                        <figure class="post-image-wraper">
                            <div class="post-image">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            </div>
                            <?php
                            $category_list = get_the_category_list( ', ' );
                            if( $category_list ){
                                echo '<figcaption  class="post-cats"><span class="post-cat"> '.$category_list.' </span></figcaption >';
                            }
                            ?>
                        </figure>
                        <?php } ?>
                        <div class="sassico-post-body">
                            <div class="entry-content">
                                <h2 class="entry-title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <hr>
                            </div>
                            <div class="post-footer d-flex justify-content-between">
                                <div class="post-author-info">
                                    <span class="author-img">
                                        <?php echo get_avatar( get_the_author_meta( "ID" )); ?>
                                    </span>
                                    <span class="author-name-and-date">
                                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="author-name"><?php the_author_meta('display_name'); ?></a>
                                        <?php sassico_post_meta_date(); ?>
                                    </span>
                                </div>
                                <?php if( function_exists('__wp_social_share_pro_check') ){
                                    if( __wp_social_share_pro_check() ){
                                    ?>
                                    <div class="sassico-social-share-wraper align-self-center">
                                        <i class="icon icon-share sassico-social-share-icon"></i>
                                        <?php echo __wp_social_share( 'all', ['class' => 'sassico-social-share'] ); ?>
                                    </div>
                                    <?php 
                                    }
                                } 
                                ?>
                            </div>
                        </div>
                    </article>
                </div>
            <?php } ?>
        </div>
    <?php }
    protected function _content_template() { }

    public function getCategories(){
        $terms = get_terms( array(
            'taxonomy'    => 'category',
            'hide_empty'  => false,
        ) );


        $cat_list = [];
        if(is_array($terms) && '' != $terms) :
        foreach($terms as $post) {

            $cat_list[$post->term_id]  = [$post->name];
        }
       endif;
        return $cat_list;
    }
}
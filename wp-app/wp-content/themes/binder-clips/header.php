<html>
    <head>
        <meta charset="utf-8" />
        <title>First Test</title>
        <?php wp_head() ?>
    </head>
    <?php
        if (is_front_page()) :
            $binder_clips_classes = array('binder-classes', 'my-class');
        else:
            $binder_clips_classes = array('no-binder-clips-class');
        endif;
    ?>
    <body <?php body_class($binder_clips_classes); ?>>
        <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
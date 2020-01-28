<?php if (!defined('ABSPATH')) die('Direct access forbidden.');

$manifest = array();

$manifest[ 'name' ]			 = 'sassico';
$manifest[ 'uri' ]			 = esc_url( 'https://themeforest.net/user/xpeedstudio' );
$manifest[ 'description' ]	 = esc_html__( 'Sassico WordPress Theme', 'sassico' );
$manifest[ 'version' ]		 = '1.0';
$manifest[ 'author' ]			 = 'xpeedstudio';
$manifest[ 'author_uri' ]		 = esc_url( 'https://themeforest.net/user/xpeedstudio' );
$manifest[ 'requirements' ]	 = array(
	'wordpress' => array(
		'min_version' => SASSICO_MINWP_VERSION,
	),
);

$manifest[ 'id' ] = 'scratch';

$manifest[ 'supported_extensions' ] = array(
	'backups'		 => array(),
);


?>

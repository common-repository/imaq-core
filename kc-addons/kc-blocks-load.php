<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


class rushmoreKcAddonClass{


	function __construct(){
		// integrate with kc with this hook
		add_action( 'init', array( $this, 'rushmoreIntegrateWithKc' ) );
	}
     
    public function rushmoreIntegrateWithKc(){
    	// check if king composer is not installed
    	if( ! defined('KC_VERSION') ){
    		add_action( 'admin_notices', array( $this, 'rushmoreShowKcVersionNotice' ) );
    		return;
    	}

        // king composer addons
    	include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-slides.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-info-block-image.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-info-block-icon.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-about-us-block.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-video.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-fun-facts.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-button.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-team-list.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-profile-card.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-profile-section.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-event-list.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-conference-list.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-book-list.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-address-block.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-contact-info.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-latest-event.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-journal-article.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-selected-publications.php' );
        include( RUSHMORE_ACC_PATH . '/kc-addons/rushmore-fluent-form.php' );

    }
    
    // show king composer version
    public function rushmoreShowKcVersionNotice(){
    	$theme_data = wp_get_theme();
    	echo '<div class="notice notice-warning"><p>' . sprintf(__('<strong>%s</strong> recommends <strong><a href="'.site_url().'/wp-admin/plugin-install.php?s=king+composer&tab=search&type=term" target="_blank">King Composer</a></strong> plugin to be installed and activated on your site.', 'IMAQ'), $theme_data->get('Name')) . '</p></div>';
    }
}

new rushmoreKcAddonClass();
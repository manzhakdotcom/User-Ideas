<?php

/**
 * Plugin Name: User Ideas Widget
 * Plugin URI:  https://github.com/manzhakdotcom/user-ideas
 * Description: A simple method to add user ideas about your site 
 * Version:     0.0.1
 * Author:      Manzhak
 * Author URI:  http://manzhak.com
 * Text Domain: user-ideas
 */

if( ! defined( 'ABSPATH' ) ) exit;

define( 'USER_IDEAS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

if( !class_exists( 'UserIdeas' ) ):

	class UserIdeas
	{
		//
		private static $instance = null;


		//
		private function __construct()
		{
			//
		}


		//
		public static function get_instance()
		{
			if( null == self::$instance )
			{
				self::$instance = new self;
				self::$instance->init();
			}

			return self::$instance;
		}

		private function init()
		{
			self::$instance->setup();
			self::$instance->includes();
			self::$instance->actions();
		}

		private function setup()
		{
			$this->file = __FILE__;
			$this->basename   = plugin_basename( $this->file );
			$this->plugin_dir = plugin_dir_path( $this->file );
			$this->plugin_url = plugin_dir_url ( $this->file );

			// Includes
			$this->includes_dir = trailingslashit( $this->plugin_dir . 'includes'  );
			$this->includes_url = trailingslashit( $this->plugin_url . 'includes'  );

			// Languages
			$this->lang_dir     = trailingslashit( $this->plugin_dir . 'languages' );

			// Templates
			$this->templates_dir   = trailingslashit( $this->plugin_dir . 'templates' );
			$this->templates_url   = trailingslashit( $this->plugin_url . 'templates' ); 

		}

		private function includes()
		{
			require( $this->includes_dir . 'functions.php' );
			require( $this->includes_dir . 'widget.php' );
		}

		private function actions()
		{
            add_action( 'widgets_init', 'user_ideas_init_widget');
		}

	}


	//Start!
	UserIdeas::get_instance();

endif;
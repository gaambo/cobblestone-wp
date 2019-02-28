<?php

namespace Obsidian;

abstract class Assets {
	public static function init() {
		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_styles' ] );
		add_action( 'wp_footer', [ __CLASS__, 'favicons' ] );
	}

	public static function enqueue_scripts() {
		$assets_url = \get_template_directory_uri() . '/assets/';

		wp_enqueue_script( 'jquery' );

		wp_enqueue_script(
			'theme-bundle',
			$assets_url . 'js/bundle.js',
			[],
			OBSIDIAN_VERSION,
			true //in footer
		);
	}

	public static function enqueue_styles() {
		$assets_url = \get_template_directory_uri() . '/assets/';

		$google_fonts = [
			'family' => 'Asap:400,700',
		];
		wp_enqueue_style(
			'google-fonts',
			add_query_arg( $google_fonts, '//fonts.googleapis.com/css' ),
			[],
			null
		);

		wp_enqueue_style(
			'theme-styles',
			$assets_url . 'css/main.css',
			[],
			OBSIDIAN_VERSION,
			false // in footer
		);
	}

	public static function favicons() {
		//use favicon generator from https://realfavicongenerator.net/
		$path = get_template_directory_uri() . '/assets/favicon';

		echo '
		<link rel="apple-touch-icon" sizes="180x180" href="' . $path . '/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="' . $path . '/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="' . $path . '/favicon-16x16.png">
		<link rel="manifest" href="' . $path . '/site.webmanifest">
		<link rel="mask-icon" href="' . $path . '/safari-pinned-tab.svg" color="#213b5e">
		<meta name="msapplication-TileColor" content="#213b5e">
		<meta name="theme-color" content="#213b5e">
		';
	}

}

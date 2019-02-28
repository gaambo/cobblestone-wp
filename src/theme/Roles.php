<?php

namespace Obsidian;

abstract class Roles {


	/**
	 * Initializes the custom roles and capabilities of this theme
	 *
	 * Should be run on admin_init hook
	 * For performance reason only run it on updates/changes
	 *
	 * @return void
	 */
	public static function init_roles() {
		self::remove_unused_roles();
		self::init_special_role();
		self::add_admin_capabilities();
	}

	/**
	 * Removes unused default roles or roles added by plugins
	 *
	 * @return void
	 */
	private static function remove_unused_roles() {
		// remove default unused roles
		remove_role( 'subscriber' );
	}

	/**
	 * Adds a special role and adds capabilities to it
	 *
	 * Should be run on admin_init
	 * Checks if the role already exists, otherwiste it creats it
	 *
	 * @return void
	 */
	private static function init_special_role() {
		$special_role = get_role( 'obsidian-special' );
		if ( ! $special_role ) {
			$special_role = add_role( 'obsidian-special', __( 'Spezielle Rolle', 'obsidian' ), array() );
		}
		$special_capabilities = array(
			'read'                   => true,
			'level_1'                => true,
			'upload_files'           => true,
			'manage_privacy_options' => true,
			// jobs
			'edit_job'               => true,
			'edit_jobs'              => true,
			'edit_others_jobs'       => true,
			'edit_published_jobs'    => true,
			'publish_jobs'           => true,
			'read_job'               => true,
			'read_private_jobs'      => true,
			'delete_job'             => true,
			'delete_jobs'            => true,
			'delete_others_jobs'     => true,
			'delete_published_jobs'  => true,
			'delete_private_jobs'    => true,
		);
		foreach ( $special_capabilities as $cap => $allow ) {
			$special_role->add_cap( $cap, $allow );
		}

		// maybe delete some old capabilities
	}

	/**
	 * Adds custom capabilities to the existing core role administrator
	 *
	 * @return void
	 */
	private static function add_admin_capabilities() {
		$admin = get_role( 'administrator' );
		$admin_capabilities = array(
			// jobs
			'edit_job',
			'edit_jobs',
			'edit_others_jobs',
			'publish_jobs',
			'read_job',
			'read_private_jobs',
			'delete_job',
		);
		foreach ( $admin_capabilities as $cap ) {
			$admin->add_cap( $cap, true );
		}
	}
}

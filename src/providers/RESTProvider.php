<?php

namespace jmucak\wpFormPack\providers;

use jmucak\wpFormPack\controllers\EntryController;
use WP_REST_Server;

class RESTProvider {
	public const ROUTE_FORM_SUBMISSION = 'form-submission';
	public const ROUTE_FORM_ENTRIES = 'entries';
	public static function get_api_namespace(): string {
		return 'wp-form-pack/v1/';
	}

	public static function get_config() : array {
		return array(
			array(
				'namespace' => self::get_api_namespace(),
				'route' => self::ROUTE_FORM_SUBMISSION,
				'args' => array()
			),
			array(
				'namespace' => self::get_api_namespace(),
				'route' => self::ROUTE_FORM_ENTRIES,
				'args' => self::get_entries_args()['items']
			),
			array(
				'namespace' => self::get_api_namespace(),
				'route' => self::ROUTE_FORM_ENTRIES . '/(?P<id>[\d]+)',
				'args' => self::get_entries_args()['item']
			),
		);
	}

	public static function get_entries_args() : array {
		$entry_controller = new EntryController();
		return array(
			'items' => array(
				array(
					'methods'             => WP_REST_Server::READABLE,
					'permission_callback' => '__return_true',
					'callback'            => array( $entry_controller, 'get_items' ),
				),
				array(
					'methods'             => WP_REST_Server::CREATABLE,
					'permission_callback' => '__return_true',
					'callback'            => array( $entry_controller, 'create_item' ),
					'args' => array(
						'subject' => array(
							'description' => 'Entry subject',
							'type' => 'string'
						),
					),
				),
			),
			'item'  => array(
				'args' => array(
					'id' => array(
						'description' => 'Unique identifier for the entry',
						'type'        => 'integer',
					),
				),
				array(
					'methods'             => WP_REST_Server::READABLE,
					'permission_callback' => '__return_true',
					'callback'            => array( $entry_controller, 'get_item' ),
				),
				array(
					'methods'             => WP_REST_Server::EDITABLE,
					'permission_callback' => '__return_true',
					'callback'            => array( $entry_controller, 'update_item' ),
				),
				array(
					'methods'             => WP_REST_Server::DELETABLE,
					'permission_callback' => '__return_true',
					'callback'            => array( $entry_controller, 'delete_item' ),
				)
			)
		);
	}
}
<?php

namespace jmucak\wpFormPack\controllers;

use WP_Error;
use WP_REST_Request;
use WP_REST_Response;
use WP_REST_Server;

class EntryController {
	/**
	 *
	 * GET
	 * @url wp-json/wp-form-pack/v1/entries
	 *
	 * @param WP_REST_Request $request
	 * @return WP_REST_Response
	 */
	public function get_items( WP_REST_Request $request ): WP_REST_Response {
		$response = array();

		return rest_ensure_response( $response );
	}

	/**
	 * POST
	 * @url wp-json/wp-form-pack/v1/entries
	 *
	 * @param WP_REST_Request $request
	 * @return WP_Error|WP_REST_Response
	 */
	public function create_item( WP_REST_Request $request ): WP_Error|WP_REST_Response {
		$body_params = $request->get_body_params();


		return rest_ensure_response( array() );
	}

	/**
	 *
	 * GET
	 * @url wp-json/wp-form-pack/v1/entries/{id}
	 *
	 * @param WP_REST_Request $request
	 * @return WP_Error|WP_REST_Response
	 */
	public function get_item( WP_REST_Request $request ): WP_Error|WP_REST_Response {
		$post_id = $request->get_param( 'id' );

		if ( empty( $post_id ) ) {
			return new WP_Error( 400, 'Entry id is missing' );
		}

		return rest_ensure_response( array() );
	}

	/**
	 *
	 * @url wp-json/wp-form-pack/v1/entries/{id}
	 *
	 * @param WP_REST_Request $request
	 * @return WP_Error|WP_REST_Response
	 */
	public function update_item( WP_REST_Request $request ): WP_Error|WP_REST_Response {
		$post_id = $request->get_param( 'id' );

		if ( empty( $post_id ) ) {
			return new WP_Error( 400, 'Entry id is missing' );
		}

		return rest_ensure_response( array() );
	}


	/**
	 *
	 * @url wp-json/wp-form-pack/v1/entries/{id}
	 *
	 * @param WP_REST_Request $request
	 * @return WP_Error|WP_REST_Response
	 */
	public function delete_item( WP_REST_Request $request ): WP_Error|WP_REST_Response {
		$post_id = $request->get_param( 'id' );

		if ( empty( $post_id ) ) {
			return new WP_Error( 400, 'Entry id is missing' );
		}

		return rest_ensure_response( array() );
	}
}
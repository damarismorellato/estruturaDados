<?php
/*----------------------------------------------
/* Fix wp_json_encode if WordPress Version < 4.1.0
------------------------------------------------*/
global $wp_version;
if (version_compare($wp_version, '4.1.0', '<=')) {
	/**
	 * Encode a variable into JSON, with some sanity checks.
	 *
	 * @since 4.1.0
	 *
	 * @param mixed $data    Variable (usually an array or object) to encode as JSON.
	 * @param int   $options Optional. Options to be passed to json_encode(). Default 0.
	 * @param int   $depth   Optional. Maximum depth to walk through $data. Must be
	 *                       greater than 0. Default 512.
	 * @return bool|string The JSON encoded string, or false if it cannot be encoded.
	 */
	if (!function_exists('wp_json_encode')) {
		function wp_json_encode( $data, $options = 0, $depth = 512 ) {
			/*
			 * json_encode() has had extra params added over the years.
			 * $options was added in 5.3, and $depth in 5.5.
			 * We need to make sure we call it with the correct arguments.
			 */
			if ( version_compare( PHP_VERSION, '5.5', '>=' ) ) {
				$args = array( $data, $options, $depth );
			} elseif ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
				$args = array( $data, $options );
			} else {
				$args = array( $data );
			}

			$json = call_user_func_array( 'json_encode', $args );

			// If json_encode() was successful, no need to do more sanity checking.
			// ... unless we're in an old version of PHP, and json_encode() returned
			// a string containing 'null'. Then we need to do more sanity checking.
			if ( false !== $json && ( version_compare( PHP_VERSION, '5.5', '>=' ) || false === strpos( $json, 'null' ) ) )  {
				return $json;
			}

			try {
				$args[0] = _wp_json_sanity_check( $data, $depth );
			} catch ( Exception $e ) {
				return false;
			}

			return call_user_func_array( 'json_encode', $args );
		}
	}

	/**
	 * Perform sanity checks on data that shall be encoded to JSON.
	 *
	 * @ignore
	 * @since 4.1.0
	 * @access private
	 *
	 * @see wp_json_encode()
	 *
	 * @param mixed $data  Variable (usually an array or object) to encode as JSON.
	 * @param int   $depth Maximum depth to walk through $data. Must be greater than 0.
	 * @return mixed The sanitized data that shall be encoded to JSON.
	 */
	if (!function_exists('_wp_json_sanity_check')) {
		function _wp_json_sanity_check( $data, $depth ) {
			if ( $depth < 0 ) {
				throw new Exception( 'Reached depth limit' );
			}

			if ( is_array( $data ) ) {
				$output = array();
				foreach ( $data as $id => $el ) {
					// Don't forget to sanitize the ID!
					if ( is_string( $id ) ) {
						$clean_id = _wp_json_convert_string( $id );
					} else {
						$clean_id = $id;
					}

					// Check the element type, so that we're only recursing if we really have to.
					if ( is_array( $el ) || is_object( $el ) ) {
						$output[ $clean_id ] = _wp_json_sanity_check( $el, $depth - 1 );
					} elseif ( is_string( $el ) ) {
						$output[ $clean_id ] = _wp_json_convert_string( $el );
					} else {
						$output[ $clean_id ] = $el;
					}
				}
			} elseif ( is_object( $data ) ) {
				$output = new stdClass;
				foreach ( $data as $id => $el ) {
					if ( is_string( $id ) ) {
						$clean_id = _wp_json_convert_string( $id );
					} else {
						$clean_id = $id;
					}

					if ( is_array( $el ) || is_object( $el ) ) {
						$output->$clean_id = _wp_json_sanity_check( $el, $depth - 1 );
					} elseif ( is_string( $el ) ) {
						$output->$clean_id = _wp_json_convert_string( $el );
					} else {
						$output->$clean_id = $el;
					}
				}
			} elseif ( is_string( $data ) ) {
				return _wp_json_convert_string( $data );
			} else {
				return $data;
			}

			return $output;
		}
	}

	/**
	 * Convert a string to UTF-8, so that it can be safely encoded to JSON.
	 *
	 * @ignore
	 * @since 4.1.0
	 * @access private
	 *
	 * @see _wp_json_sanity_check()
	 *
	 * @param string $string The string which is to be converted.
	 * @return string The checked string.
	 */
	if (!function_exists('_wp_json_convert_string')) {
		function _wp_json_convert_string( $string ) {
			static $use_mb = null;
			if ( is_null( $use_mb ) ) {
				$use_mb = function_exists( 'mb_convert_encoding' );
			}

			if ( $use_mb ) {
				$encoding = mb_detect_encoding( $string, mb_detect_order(), true );
				if ( $encoding ) {
					return mb_convert_encoding( $string, 'UTF-8', $encoding );
				} else {
					return mb_convert_encoding( $string, 'UTF-8', 'UTF-8' );
				}
			} else {
				return wp_check_invalid_utf8( $string, true );
			}
		}
	}
}

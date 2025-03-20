<?php 
	namespace App\Helpers;

	class Session {
		public static function start() {
			@session_start();
		}

		static function close() {
		  Session::start();
		  session_regenerate_id(true);
		}

		/**
		 * get a session variable
		 */
		static function getVar($var = false) {
			Session::start();

			if ($var && isset($_SESSION[$var])) {
				return $_SESSION[$var];
			}

			return false;
		}

		/**
		 * set a session variable
		 */
		static function setVar($var = false, $value = false) {
			Session::start();

			if ($var) {
				$_SESSION[$var] = $value;
				return true;
			}

			return false;
		}
	}
	
?>
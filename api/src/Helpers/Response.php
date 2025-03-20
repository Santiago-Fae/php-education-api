<?php 
	namespace App\Helpers;

	class Response {
		/**
		 * Send a response with status and message
		 */
		public static function send($status, $message) {
			header('Content-Type: application/json');
			http_response_code($status);
			echo json_encode([
				'status' => $status,
				'message' => $message
			]);
			exit;
		}
	}
?>
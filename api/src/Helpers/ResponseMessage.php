<?php 
	namespace App\Helpers;

	class ResponseMessage {
		/**
		 * response with status
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
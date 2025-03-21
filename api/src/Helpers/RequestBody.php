<?php 
	namespace App\Helpers;

	class RequestBody {
		/**
		 * Get the body of the request
		 */
		public static function getBody($request) {
            $body = (string) $request->getBody();
            $data = json_decode($body, true); 
            return $data;
		}
	}
?>
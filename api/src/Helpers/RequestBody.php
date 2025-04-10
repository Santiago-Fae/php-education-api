<?php 
	namespace App\Helpers;

	class RequestBody {
		/**
		 * to get body of req
		 */
		public static function getBody($request) {
            $body = (string) $request->getBody();
            $data = json_decode($body, true); 
            return $data;
		}
	}
?>
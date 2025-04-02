<?php
namespace App\Middleware;

use App\Models\Log;

class LogMiddleware
{

    public function handle($request, $next)
    {
        try {
            $route = $request->getUri()->getPath();
            $message = "Request to {$route}";

            $log = new Log();
            $log->saveLog($request, $message, 0);
            
        } catch (\Exception $e) {
            // Handle logging errors gracefully
            error_log("Failed to log request: " . $e->getMessage());
        }
        return $next->handle($request);
    }
}

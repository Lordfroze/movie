<?php

namespace App\Http\Middleware;
// import method yang diperlukan
use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMembership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   // Jika tidak memiliki data membership bernilai true arahkan ke halaman pricing
        if(!$request->membership == true) {
            return redirect('/pricing');
        }

        // before request
        Log::info('Before Request:', [
            'url' => $request->url(),
            'params' => $request->all(),
        ]);
        
        $response =  $next($request);

        sleep(2);

        // after request
        Log::info('After Request:', [
            'status' => $response->getStatusCode(),
            'content' => $response->getContent()
        ]);

        return $response;

    }
}

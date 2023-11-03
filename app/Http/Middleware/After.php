<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class After
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Lógica para ejecutar después de cargar la página 'home'
        // Ejemplo: registrar en un archivo log la visita a la página 'home'
        $logMessage = "Página 'home' cargada - " . now() . "\n";
        file_put_contents(storage_path('logs/after_home.log'), $logMessage, FILE_APPEND);

        return $response;
    }
}

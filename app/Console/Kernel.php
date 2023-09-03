<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
//     protected $middleware = [
//         'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
//         'Illuminate\Cookie\Middleware\EncryptCookies',
//         'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
//         'Illuminate\Session\Middleware\StartSession',
//         'Illuminate\View\Middleware\ShareErrorsFromSession',
//         'App\Http\Middleware\SessionDataCheckMiddleware'
//     ];
// protected $middlewareGroups = [
//         'web' => [
//             \App\Http\Middleware\EncryptCookies::class,
//             \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
//             \Illuminate\Session\Middleware\StartSession::class,
//             \App\Http\Middleware\SessionExpired::class,
 
//         ],
// protected $routeMiddleware = [
//         'auth' => \App\Http\Middleware\Authenticate::class,
//     ];
}

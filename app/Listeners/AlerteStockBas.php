<?php

namespace App\Listeners;

use App\Events\StockBas;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\Alerte;
use Illuminate\Support\Facades\Notification;

class AlerteStockBas
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  StockBas  $event
     * @return void
     */
    public function handle(StockBas $event)
    {
        //
        $users = [\Auth::user()->email, 'toto@toto.com'];
        Notification::route('mail', $users)->notify(new Alerte($event->produit));


    }
}

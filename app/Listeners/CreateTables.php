<?php

namespace App\Listeners;

use Session;
use App\Events\NewSiteWasRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateTables
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
     * @param  NewSiteWasRegistered  $event
     * @return void
     */
    public function handle(NewSiteWasRegistered $event)
    {
        \Artisan::call( 'tenanti:migrate', ['driver' => 'site']);

        Session::put('site', $event->site->id);
    }
}

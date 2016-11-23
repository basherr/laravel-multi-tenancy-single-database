<?php 
namespace App\Observers;

use Orchestra\Tenanti\Observer;

class SiteObserver extends Observer
{
    public function getDriverName()
    {
        return 'site';
    }
}
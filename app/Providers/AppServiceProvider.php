<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Room;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {        
        Schema::defaultStringLength(191);
        
		$provider_pages = Page::find(1);
        $provider_rooms = Room::orderBy("id","DESC")->limit(4)->get();
        
        if ($provider_pages)
            view()->share("provider_pages", $provider_pages);

        if($provider_rooms)
            view()->share("provider_rooms", $provider_rooms);
    }
}

<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Room;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
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

        Paginator::useBootstrap();
        
        $provider_setting = Setting::find(1);
		$provider_pages = Page::find(1);
        $provider_rooms = Room::orderBy("id","DESC")->get();

        if ($provider_setting)
            view()->share("provider_setting", $provider_setting);
        
        if ($provider_pages)
            view()->share("provider_pages", $provider_pages);

        if($provider_rooms)
            view()->share("provider_rooms", $provider_rooms);
    }
}

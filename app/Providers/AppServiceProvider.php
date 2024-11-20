<?php

namespace App\Providers;

use App\Models\Page;
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
        
		$pages = Page::find(1);
        
        if ($pages)
            view()->share("pages", $pages);
    }
}

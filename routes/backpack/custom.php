<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('category', 'CategoryCrudController');
    Route::crud('products', 'ProductsCrudController');
    Route::crud('drinks', 'DrinksCrudController');
    Route::crud('drinks_categories', 'Drinks_categoriesCrudController');
    Route::crud('statice', 'StaticeCrudController');
    Route::crud('banner_information', 'Banner_informationCrudController');
    Route::crud('banner_menus', 'Banner_menusCrudController');
}); // this should be the absolute last line of this file
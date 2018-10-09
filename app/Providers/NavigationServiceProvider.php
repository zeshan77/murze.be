<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Menu\Laravel\Menu;
use Spatie\Menu\Laravel\View;

class NavigationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Menu::macro('main', function () {
            return Menu::new()
                ->addClass('list-reset lg:flex justify-end items-center')
                ->addItemClass('block border-b-2 border-transparent py-2 px-4 text-center align-content-center lg:mx-2')
                ->action('Front\HomeController@index', 'Home')
                ->action('Front\ProjectController@index', 'Projects')
                ->action('Front\AboutMeController@index', 'About')
                ->action('Front\ContactMeController@index', 'Contact')
                ->setActiveFromRequest('/');
        });

        Menu::macro('back', function () {
            return Menu::new()
                ->addClass('list-reset flex flex-col lg:flex-row justify-end items-center mb-8')
                ->addItemClass('block rounded py-2 text-center align-content-center mx-6')
                ->action('Back\PostsController@index', 'Posts')
                ->action('Back\PageController@index', 'Pages')
                ->action('Back\ProjectController@index', 'Projects')
                ->view('back.layouts._partials.logout')
                ->setActiveFromRequest('/');
        });
    }
}

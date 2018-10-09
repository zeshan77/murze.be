<div id="navigation" class="flex text-sm pt-4 py-2 font-medium">
    <div class="hidden lg:inline lg:w-1/4">
        <a class="text-black" href="/admin">{{ config('app.name') }} <br /> <div class="text-grey">certified laravel developer</div></a>
    </div>
    <div class="flex-1 lg:w-3/4 items-end">
        <nav>
            @auth
                {{ Menu::back() }}
            @endauth
        </nav>
    </div>
</div>
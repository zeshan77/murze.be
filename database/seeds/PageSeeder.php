<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run()
    {
        foreach ($this->getData() as $page) {
            factory(\App\Page::class)->create($page);
        }
    }

    protected function getData()
    {
        return [
            [
                'title' => 'Home',
                'slug' => 'home',
                'content' => 'I live in Hamburg, Germany and am passionate about PHP. 
                I\'m a ceritified laravel developer and have used the framework for many products 
                in various companies. Follow me on [@twitter](https://twitter.com/zeshan) to know 
                what keeps me busy.'
            ],[
                'title' => 'About Me',
                'slug' => 'about-me',
                'content' => '** This ** is a new page.'
            ],
            [
                'title' => 'Contact Me',
                'slug' => 'contact-me',
                'content' => 'Some content about contact page.'
            ]
        ];
    }

}

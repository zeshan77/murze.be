<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        foreach ($this->getData() as $project) {
            factory(\App\Models\Project::class)->create($project);
        }
    }

    private function getData()
    {
        return [
            [
                'slug' => 'ivms',
                'title' => 'IVMS',
                'url' => 'https://track24.com/ivms',
                'my_role' => 'I led IVMS for four years.',
                'tools_used' => 'Codeigniter, Foundation Zurb, OpenLayers, AngularJS, MySql',
                'description' => '**IVMS** platform helps keep your drivers and vehicles safe 
                where ever they may be operating. The product is used by many international 
                oil & gas clients, non-government organisations and security agencies operating 
                in high risk regions across the world.',
                'published_at' => date('Y-m-d H:i:s'),
            ],
            [
                'slug' => 'personnel-monitor',
                'title' => 'Personnel Monitor',
                'url' => 'https://track24.com/personnel-monitor',
                'my_role' => 'I created this project from scratch and led it for 5 years.',
                'tools_used' => 'Codeigniter, Bootstrap, AngularJS, MySql',
                'description' => '**Personnel Monitor** used for to find your employees in case of 
                security unrest. It aggregates reliable and up to date data in a centralised system, 
                making it easier to search and filter crucial information.',
                'published_at' => date('Y-m-d H:i:s'),
            ],
            [
                'slug' => 'one-platform-internally-used)',
                'title' => 'One platform (Internally used)',
                'url' => '#',
                'my_role' => 'I wrote this product from scratch and lead it for 3 years.',
                'tools_used' => 'Laravel 5, PostgreSql, AngularJS',
                'description' => '**One platform** is an internally used application that helps company to 
                manage their clients, devices, raising and dispatching invoices. It also has RestAPIs that are used 
                to enable mobile applications communicate with server.',
                'published_at' => date('Y-m-d H:i:s'),
            ],
        ];
    }

}
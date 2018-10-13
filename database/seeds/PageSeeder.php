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
                'content' => $this->aboutMeContent()
            ],
            [
                'title' => 'Contact Me',
                'slug' => 'contact-me',
                'content' => $this->contactMeContent()
            ]
        ];
    }

    private function contactMeContent()
    {
        return 'I can be contacted on [twitter](https://twitter.com/zeshan) and [linkedin](https://www.linkedin.com/in/zeshankhattak/).


You can see my coding style on [Github](https://github.com/zeshan77) to get some feeling how I code ;)';
    }

    protected function aboutMeContent()
    {
        return 'Overview:
        -
With over eight years of industry experience in web development and successful track record, I enjoy to take new 
challenges get out of my comfort zone and explore more exciting things in tech world. I have completed my computer science degree in 2010.

Experience:
-

[AboutYou Gmbh](https://corporate.aboutyou.de) - Hamburg, Germany

*Sep 2018 - Present*

AboutYou is one of the fastest growing fashion tech ecommerce company in Europe with over 150 engineers and more
than 500 employees in total. The company is currently values at over one billion US dollars which creates Hamburg\'s first unicorn.

*My role:* I work as a Senior PHP Developer part of their core product calls 
[Backbone](https://cloud.aboutyou.com/products/backbone/overview).

---------------------

[Track24](https://track24.com) - Dubai, UAE

*Nov 2013 - Aug 2018*

Track24 focuses on keeping clients’ people and assets safe and secure. They provide both gps devices and apps 
for vehicle tracking to help locate and track assets and people, and monitor driver behavior.

*My role*: I was working as a Senior Web Application Developer and developed few exciting products for their 
potential clients across the globe.

[Zeropoint.IT](https://zeropoint.it) - Islamabad, Pakistan

*Jan 2012 - Mar 2013*

Zeropoint.IT provides software engineers and web application developers from Pakistan and Sri Lanka to its belgium clients. 
They’re specialised in managing well skilled software developers to meet their clients need.

*my role*: I worked remotely as an Open Source Developer for one of their clients.

[DiscreteLogix Pvt Ltd](https://discretelogix.com) - Islamabad, Pakistan

Oct 2011 - Dec 2012

DX is an offshore software firm operating for more than 10 years. DX is one of the well known IT solution provider 
in Pakistan serving their international clients.

*my role*: I worked as a Web Developer for DiscreteLogix and this was my first professional experience ;).

Education:

-

[Graduation in computer science - University of Peshawar, Pakistan](http://www.uop.edu.pk/)

2006 - 2010

I luckily hold graduation degree in computer science with programming as major subject from one of the historical 
educational institutes in north Pakistan.';

    }

}

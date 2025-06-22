<?php

namespace App\Servces;

use App\Models\Blog;
use App\Models\Service;
use Spatie\Sitemap\Sitemap;

class SiteMapService
{
    /**
     * Create a new class instance.
     */
    public static function generate()
    {
        $sitemap = Sitemap::create()
            ->add(route('front.home'))
            ->add(route('front.about'))
            ->add(route('front.services.index'))
            ->add(route('front.contacts.index'))
            ->add(route('front.blogs.index'));
        
        Blog::chunk(100, function ($blogs) use (&$sitemap) {
            foreach($blogs as $blog) {
                $sitemap->add(route('front.blogs.show', $blog));
            }
        });
        
        Service::chunk(100, function ($services) use (&$sitemap) {
            foreach($services as $service) {
                $sitemap->add(route('front.services.show', $service));
            }
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}

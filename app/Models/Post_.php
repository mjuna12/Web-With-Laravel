<?php

namespace App\Models;


class Post 
{
    private static $blog_posts = [
            [
                "title"=>"Judul 1",
                "slug"=>"judul-post-1",
                "author"=>"Penulis 2",
                "body"=>"Loremmasdnadjnaljdnajsdn asjdnkandjasdnoandowndjnadknad"
            ],
            [
                "title"=>"Judul 2",
                "slug"=>"judul-post-2",
                "author"=>"Penulis 1",
                "body"=>"Loremmasdnadjnaljasdassssssssssssssssssssdnajsdn asjdnkandjasdnoandowndjnadknad"
            ]
            ];

            public static function all()
            {
                return collect(self::$blog_posts);
            }

            public static function find($slug)
            {
                $posts = static::all();

                return $posts->firstWhere('slug',$slug);
            }
}

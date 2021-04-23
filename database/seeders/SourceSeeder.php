<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Source::create([
            'name' => 'РБК',
            'url' => 'https://www.rbc.ru',
            'link_selector' => '.js-news-feed-list a.news-feed__item',
            'content_selector' => '.article__text > p',
            'overview_selector' => '.article__text__overview',
            'image_selector' => 'img.js-rbcslider-image',
        ]);

        \App\Models\Source::create([
            'name' => 'Лента',
            'url' => 'https://lenta.ru/parts/news',
            'link_selector' => '.item.news .titles a',
            'content_selector' => '.b-topic__content .b-text p',
            'image_selector' => '.b-topic__title-image img',
        ]);
    }
}

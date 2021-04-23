<?php


namespace App\Lib;

use App\Models\Source;

interface CrawlerInterface
{
    public function crawl(Source $source): array;
}
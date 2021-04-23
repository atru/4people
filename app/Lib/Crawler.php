<?php

namespace App\Lib;

use App\Exceptions\CrawlerException;
use App\Exceptions\CrawlerLinksNotFoundException;
use App\Models\Article;
use App\Models\Source;
use Goutte\Client as GoutteClient;


class Crawler implements CrawlerInterface
{
    protected $client;
    private $pageLimit;
    private $sleepMicroseconds;

    public function __construct(GoutteClient $client)
    {
        $this->client = $client;
        $this->pageLimit = env('CRAWL_PAGE_LIMIT');
        $this->sleepMicroseconds = env('CRAWL_SLEEP_MICROSECONDS');
    }

    /**
     * @throws CrawlerLinksNotFoundException|CrawlerException
     */
    public function crawl(Source $source): array
    {
        $data = [];

        /** get links from the main source page */

        try {
            $crawler = $this->client->request('GET', $source->url);
            $items = clone $crawler->filter($source->link_selector);
        } catch (\Exception $e) {
            throw new CrawlerException($e->getMessage(), $e->getCode(), $e);
        }

        if ($items->count() < 1) {
            throw new CrawlerLinksNotFoundException();
        }

        dump(sprintf('Found %d links', $items->count()));

        $count = 0;

        /** iterate over links, visit each page, crawl content */

        $items->each(function($node) use(&$data, $source, &$count) {
            usleep($this->sleepMicroseconds);
            $count++;
            if ($count > $this->pageLimit)
            {
                return;
            }

            $datum = [];
            $datum['source_url'] = $node->links()[0]->getUri();
            $datum['title'] = $node->text();
            $contentCrawler = $this->client->request('GET', $datum['source_url']);

            if (!empty($source->overview_selector)) {
                try {
                    $datum['overview'] = trim($contentCrawler->filter($source->overview_selector)->first()->html());
                } catch (\Exception $e) {}
            }

            try {
                $datum['content'] = trim(implode("", $contentCrawler->filter($source->content_selector)->each(function ($node) {
                    return $node->outerHtml();
                })));
            } catch (\Exception $e) {}

            try {
                $datum['excerpt'] = trim(mb_substr(implode("", $contentCrawler->filter($source->content_selector)->each(function ($node) {
                    return $node->text();
                })), 0, 200));
            } catch (\Exception $e) {}

            try {
                $datum['image'] = $contentCrawler->filter($source->image_selector)->first()->attr('src');
            } catch(\Exception $e) {}

            dump(sprintf('Crawled link %s', $datum['source_url']));

            $data[] = $datum;
        });

        return array_reverse($data);
    }
}
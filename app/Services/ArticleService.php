<?php


namespace App\Services;


use App\Models\Article;

class ArticleService
{
    public function saveArticles(array $data, int $sourceId): void
    {
        foreach($data as $datum) {
            if (Article::where('source_url', $datum['source_url'])->count() > 0) {
                dump(sprintf('Article already exists, skipping %s', $datum['source_url']));
                continue; // already exists in the database
            }
            Article::create($datum + ['source_id' => $sourceId]);
            dump(sprintf('Saved new article %s', $datum['source_url']));
        }
    }
}
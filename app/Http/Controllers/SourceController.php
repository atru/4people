<?php

namespace App\Http\Controllers;

use App\Lib\CrawlerInterface;
use App\Models\Source;
use App\Services\ArticleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        $sources = Source::orderBy('id', 'DESC')->paginate(10);
        return response()->view('admin.source.index', compact('sources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Response
    {
        return response()->view('admin.source.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'url' => 'required|url|max:255',
            'link_selector' => 'required|string|max:255',
            'content_selector' => 'required|string|max:255',
        ]);

        $source = new Source([
            'name' => $request->name,
            'url' => $request->url,
            'link_selector' => $request->link_selector,
            'content_selector' => $request->content_selector,
            'image_selector' => $request->image_selector,
            'overview_selector' => $request->overview_selector,
        ]);

        $source->save();

        return redirect()->route('sources.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source): Response
    {
        return response()->view('admin.source.edit', compact('source'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Source $source): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'url' => 'required|url|max:255',
            'link_selector' => 'required|string|max:255',
            'content_selector' => 'required|string|max:255',
        ]);

        $source->name = $request->name;
        $source->url = $request->url;
        $source->link_selector = $request->link_selector;
        $source->content_selector = $request->content_selector;
        $source->image_selector = $request->image_selector;
        $source->overview_selector = $request->overview_selector;

        $source->save();

        return redirect()->route('sources.index');
    }

    /**
     * Scrape specific source.
     * @param Source $source
     * @param ArticleService $articleService
     * @param CrawlerInterface $crawler
     * @return Response
     */
    public function crawl(Source $source, ArticleService $articleService, CrawlerInterface $crawler): Response
    {

        dump('Started crawling');

        $data = $crawler->crawl($source);

        dump('Finished crawling');

        $articleService->saveArticles($data, $source->id);

        dump('Finished saving');

        return response('Finished scraping');
    }
}

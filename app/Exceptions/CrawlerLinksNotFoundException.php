<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class CrawlerLinksNotFoundException extends CrawlerException
{
    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request): Response
    {
        return response('Crawling error: no links found on page. Consider revisiting link selector.');
    }
}

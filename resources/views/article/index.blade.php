@extends('layout')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <h2 class="text-2xl">Articles</h2>
            @if(count($articles) > 0)
                @foreach($articles as $article)
                    <div class="w-full my-4 p-2 flex ">
{{--                        @if(!empty($article->image))--}}
{{--                            <div class="w-1/2 mr-5">--}}
{{--                                <img src="{{ $article->image  }}" class="pull-left img-responsive thumb margin10 img-thumbnail" width="200" />--}}
{{--                            </div>--}}
{{--                        @endif--}}
                        <div class="">
                            <h4 class="text-xl mb-4">
                                <a href="{{ url('articles/' . $article->id) }}">{{ $article->title }}</a>
                            </h4>
                            @if ($article->excerpt)
                                <p class="mb-4">{{ $article->excerpt }}...</p>
                            @endif

                            <div class="flex justify-between">
                                <span>
                                    <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-blue-600 bg-blue-200 uppercase last:mr-0 mr-1">
                                        <a href="{{ $article->source_url }}" target="_blank">{{ $article->source->name }}</a>
                                    </span>
                                    <span class="text-sm">saved at {{ $article->created_at->timezone('Europe/Moscow') }}</span>
                                </span>
                                <span class="mr-6 text-blue-500">
                                    <a class="" href="{{ url('articles/' . $article->id) }}">More →</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr/>
                @endforeach
            <div class="mt-5">
                {{ $articles->links() }}
            </div>
            @else
                <i>No articles found</i>
            @endif
        </div>
    </div>
@endsection
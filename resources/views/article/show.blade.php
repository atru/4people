@extends('layout')

@section('content')

    <div class="flex justify-center mb-12">
        <div class="w-6/12 bg-white p-6 rounded-lg">


            <div class=" my-2 text-sm">
                <span class="text-base text-blue-500">
                    <a href="/">← Back</a>
                </span>
            </div>

            <h2 class="text-3xl my-6">{{ $article->title }}</h2>

            <article class="text-lg">

                @if ($article->image)
                    <div class="flex justify-center my-6">
                        <div class="w-8/12 flex justify-center">
                            <img src="{{ $article->image  }}"/>
                        </div>
                    </div>
                @endif

                <h4 class="font-bold">{!! $article->overview !!}</h4>

                {!! $article->content !!}
            </article>

            <div class=" my-2 text-sm">
                <div>
{{--                    <em class="mr-3 text-base">Source: </em>--}}
                    <a href="{{ $article->source_url }}" target="_blank" class="text-blue-500">
                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-blue-600 bg-blue-200 uppercase last:mr-0 mr-1">{{ $article->source->name }}</span>
                        {{ $article->source_url }}
                    </a>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('script')
    <style>
        article.text-lg>p {margin-top:1em; margin-bottom:1em;}
    </style>
@endsection
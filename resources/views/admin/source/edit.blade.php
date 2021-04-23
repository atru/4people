@extends('layout')

@section('content')

    <div class="flex justify-center">
        <div class="w-5/12 bg-white p-6 rounded-lg">
            <div class="pb-6 font-bold">Edit Source</div>

            @if(session('error')!='')
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (count($errors) > 0)

                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('sources.update', $source->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="sr-only1">Name</label>
                    <input type="text" name="name" id="name" placeholder="News source name"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{$source->name}}">
                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="name" class="sr-only1">Url</label>
                    <input type="text" name="url" id="url" placeholder="News source url"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('url') border-red-500 @enderror" value="{{ $source->url }}">
                    @error('url')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="link_selector" class="sr-only1">Link Selector</label>
                    <input type="text" name="link_selector" id="link_selector" placeholder="News source link_selector"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('link_selector') border-red-500 @enderror" value="{{ $source->link_selector }}">
                    @error('link_selector')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="content_selector" class="sr-only1">Link Selector</label>
                    <input type="text" name="content_selector" id="content_selector" placeholder="News source content_selector"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('content_selector') border-red-500 @enderror" value="{{ $source->content_selector }}">
                    @error('content_selector')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="overview_selector" class="sr-only1">Link Selector</label>
                    <input type="text" name="overview_selector" id="overview_selector" placeholder="News source overview_selector"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('overview_selector') border-red-500 @enderror" value="{{ $source->overview_selector }}">
                    @error('overview_selector')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image_selector" class="sr-only1">Link Selector</label>
                    <input type="text" name="image_selector" id="image_selector" placeholder="News source image_selector"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('image_selector') border-red-500 @enderror" value="{{ $source->image_selector }}">
                    @error('image_selector')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="bg-blue-500 rounded py-4 px-3 font-medium text-white w-full" id="btn-save">Update</button>
                </div>

            </form>
        </div>
    </div>

@endsection
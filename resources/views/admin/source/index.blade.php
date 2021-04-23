@extends('layout')

@section('content')


    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="flex justify-between">
                <h2 class="text-xl">Sources</h2>
                <a href="{{ route('sources.create') }}" class="bg-blue-500 rounded py-2 px-4 font-medium text-white">Add new</a>
            </div>
            @if(count($sources) > 0)

                <table class="table-auto bg-white min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">URL</th>
                            <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Link Selector</th>
                            <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Content Selector</th>
                            <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Overview Selector</th>
                            <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image Selector</th>
                            <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($sources as $source)
                            <tr>
                                <td class="text-sm px-3 py-4 whitespace-nowrap_">{{ $source->name }}</td>
                                <td class="text-sm px-3 py-4 whitespace-nowrap_"><a class="font-bold" href="{{ $source->url }}">{{ $source->url }}</a> </td>
                                <td class="text-sm px-3 py-4 whitespace-nowrap_">{{ $source->link_selector }}</td>
                                <td class="text-sm px-3 py-4 whitespace-nowrap_">{{ $source->content_selector }}</td>
                                <td class="text-sm px-3 py-4 whitespace-nowrap_">{{ $source->overview_selector }}</td>
                                <td class="text-sm px-3 py-4 whitespace-nowrap_">{{ $source->image_selector }}</td>
                                <td class="text-sm px-3 py-4 whitespace-nowrap_">
                                    <div class="flex align-baseline">
                                        <a class="mr-2 bg-blue-500 rounded py-2 px-4 font-medium text-white" href="{{ url('sources/' . $source->id . '/edit') }}">Edit</a>
                                        <form action="{{ route('source.crawl', $source->id) }}" method="POST">
                                            @csrf
                                            <button class="bg-yellow-500 rounded py-2 px-4 font-medium text-white">Scrape!</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $sources->links() }}

            @else
                <i>No sources found</i>
            @endif
        </div>
    </div>

@endsection
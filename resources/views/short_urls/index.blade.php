@extends('adminlte::page')

@section('title', 'Short URLs')

@section('content_header')
    <h1>Short URLs</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    @if (auth()->user()->role !== 'SuperAdmin')
        <a href="{{ route('short-urls.create') }}" class="btn btn-primary mb-3">
            Add Short URL
        </a>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Original URL</th>
                <th>Short Code</th>
                <th>Hit Url</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shortUrls as $shortUrl)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $shortUrl->original_url }}</td>

                    <td>
                        <a href="{{ route('shorturl.redirect', $shortUrl->short_code) }}" target="_blank">
                            {{ route('shorturl.redirect', $shortUrl->short_code) }}
                        </a>
                    </td>
                    <td>{{ $shortUrl->clicks }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

@stop

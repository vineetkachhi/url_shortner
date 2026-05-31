@extends('adminlte::page')

@section('title', 'Add Short URL')

@section('content_header')
    <h1>Add Short URL</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="mb-4 rounded-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('short-urls.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Original URL</label>
            <input type="text" name="original_url" value="" class="form-control">
        </div>

        <div class="mb-3">
            <label>Short URL</label>
            <input type="text" name="short_code" value="" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">
            Save
        </button>

    </form>

@stop

@extends('adminlte::page')

@section('title', 'Add Company')

@section('content_header')
    <h1>Add Company</h1>
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

    <form action="{{ route('companies.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Company Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            Save
        </button>

    </form>

@stop

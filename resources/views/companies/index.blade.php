@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <h1>Companies</h1>
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

    <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">
        Add Company
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Users</th>
                <th>Generated URLs</th>
                <th> Total Urls Hits</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->users_count }}</td>
                    <td>{{ $company->short_urls_count }}</td>
                    <td>{{ $company->short_urls_sum_clicks }}</td>
                    <td>{{ $company->status }}</td>
                    <td>
                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <a href="{{ route('companies.invite', $company->id) }}" class="btn btn-primary btn-sm">
                            Invite Admin
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

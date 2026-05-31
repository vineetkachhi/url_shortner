@extends('adminlte::page')

@section('title', 'Invite Admin')

@section('content_header')
    <h1>Invite Admin/Member</h1>
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
    <div class="card">
        <div class="card-header">
            <h3>{{ $company->name }}</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('invite.sendInvite', $company->id) }}" method="POST">

                @csrf
                <div class="mb-3">
                    <label>Invite Type</label>
                    <select name="role" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="admin">Admin</option>
                        <option value="Member">Member</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Admin Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Admin Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">
                    Send Invitation
                </button>

                <a href="{{ route('companies.index') }}" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>
    </div>

@stop

@extends('adminlte::page')

@section('title', 'Edit Company')

@section('content_header')
    <h1>Edit Company</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            <form action="{{ route('companies.update', $company->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $company->name) }}"
                        required>

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>

                    <select name="status" class="form-control">
                        <option value="active" {{ $company->status == 'active' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="inactive" {{ $company->status == 'inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>

                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">
                    Update Company
                </button>

                <a href="{{ route('companies.index') }}" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>
    </div>

@stop

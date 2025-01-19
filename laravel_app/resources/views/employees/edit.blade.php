@extends('layouts.app')

@section('content')
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="{{ $employee->first_name }}" required class="form-control">
        </div>

        <div class="mb-3">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="{{ $employee->last_name }}" required class="form-control">
        </div>

        <div class="mb-3">
            <label for="company_id">Company:</label>
            <select name="company_id" class="form-control">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $employee->email }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" value="{{ $employee->phone }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection

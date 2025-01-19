@extends('layouts.app')

@section('content')
    <h1>Create Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div>
            <label>First Name:</label>
            <input type="text" name="first_name" required>
        </div>
        <div>
            <label>Last Name:</label>
            <input type="text" name="last_name" required>
        </div>
        <div>
            <label>Company:</label>
            <select name="company_id">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email">
        </div>
        <div>
            <label>Phone:</label>
            <input type="text" name="phone">
        </div>
        <button type="submit">Save</button>
    </form>
@endsection

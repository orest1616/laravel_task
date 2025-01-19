@extends('layouts.app')

@section('content')
    <h1>Edit Company</h1>
    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Company Name:</label>
            <input type="text" name="name" value="{{ $company->name }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $company->email }}">
        </div>
        <div>
            <label for="logo">Logo:</label>
            <input type="file" name="logo">
        </div>
        <div>
            <label for="website">Website:</label>
            <input type="text" name="website" value="{{ $company->website }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection

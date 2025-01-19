@extends('layouts.app')

@section('content')
    <h1>Create new company</h1>
    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Company Name:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="logo">Logo:</label>
            <input type="file" name="logo">
        </div>
        <div>
            <label for="website">Website:</label>
            <input type="text" name="website">
        </div>
        <button type="submit">Save</button>
    </form>
@endsection

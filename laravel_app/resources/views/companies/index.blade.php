@extends('layouts.app')

@section('content')
    <h1>Company List</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Website</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>
                        @if($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" width="50" height="50">
                        @else
                            No logo
                        @endif
                    </td>
                    <td><a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('companies.create') }}">Create Newww company</a>
@endsection

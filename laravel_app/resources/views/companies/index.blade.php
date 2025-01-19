@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Company List</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table id="companies-table" class="table table-striped">
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
    <div class="mt-4">
        {{ $companies->links() }}
    </div>
        <a href="{{ route('companies.create') }}" class="btn btn-primary mt-3">Create New Company</a>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#companies-table').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true
            });
        });
    </script>
@endsection

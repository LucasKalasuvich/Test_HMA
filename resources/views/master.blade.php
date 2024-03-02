@extends('layouts.app')
@section('title', 'Master')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/2.0.0/css/select.bootstrap5.css" />


    <style>
        .table tr,
        .table td,
        .table th,
        .table thead,
        .table tbody {
            background-color: #ffffff !important;
        }

        #table tbody td {
            cursor: pointer;
        }

        #table tbody td:hover {
            background-color: #7b95e4 !important;
        }
    </style>
@endpush

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Users') }}
    </h2>

    <div class="py-12">
        <div class="max-w-2xl sm:px-6 lg:px-2 d-grid gap-5">

            <div class="container_table">
                <a href="{{ route('tambahUsers.view') }}" type="button" class="btn btn-primary text-dark">Tambah Users</a>
                <table id="table" class="table table-striped mt-3" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <form action="{{ route('deleteUsers.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('editUsers.edit', $item->id) }}" type="button"
                                            class="btn btn-warning btn-sm btn-circle btn-edit">Edit</a>
                                        <button type="submit" class="btn btn-danger btn-sm" style="color: black"
                                            onclick="return confirm('Yakin');">
                                            <i class="fas fa-trash"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

        </div>

    </div>
@endsection


@push('js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#table', {
            select: true
        });
    </script>
@endpush

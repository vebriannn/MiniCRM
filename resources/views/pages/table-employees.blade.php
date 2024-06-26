@extends('components.layouts.app')

@section('title', 'Table Data Employees')

@section('content')
    <div class="container-fluid">

        <p>
            <a href="{{ route('dashboard') }}" class="mt-4">Dashboard </a> / Data Employees
        </p>
        <!-- DataTales Example -->
        <div class="card shadow mb-4 mt-5">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Employees</h6>
                @if (Auth::user()->role != 'user')
                    <a href="{{ route('create.data.employees', $items->id) }}">Tambah Data</a>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="employeesTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                @if (Auth::user()->role != 'user')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items->employees as $item)
                                <tr>
                                    <td>
                                        {{ $item->first_name }}
                                    </td>
                                    <td>{{ $item->last_name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    @if (Auth::user()->role != 'user')
                                        <td class="d-flex justify-content-around">
                                            <a href="{{ route('edit.data.employees', $item->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <a href="{{ route('delete.data.employees', $item->id) }}" class="btn btn-danger"
                                                id="id-delete">
                                                Delete
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Maaf Data Tidak Tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#employeesTable').DataTable();
        });
    </script>
@endsection

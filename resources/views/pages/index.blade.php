@extends('components.layouts.app')

@section('title', 'Table Data Companies')

@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Companies</h6>
                @if (Auth::user()->role != 'user')
                    <a href="{{ route('dashboard.create') }}">Tambah Data</a>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="companiesTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name Company</th>
                                <th>Email Company</th>
                                <th>Link Website</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/imagesLogo/' . $item->logo) }}" alt=""
                                            srcset="" style="width: 40px; heigt: 40px;">
                                        {{ $item->name }}
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->website }}</td>
                                    <td class="d-flex justify-content-around">
                                        <a href="{{ route('view.data.employees', $item->id) }}" class="btn btn-success">
                                            View Detail
                                        </a>
                                        @if (Auth::user()->role == 'admin')
                                            <a href="{{ route('edit.data.companies', $item->id) }}"
                                                class="btn btn-primary">Edit</a>
                                        @elseif (Auth::user()->role == 'superadmin')
                                            <a href="{{ route('edit.data.companies', $item->id) }}"
                                                class="btn btn-primary">Edit</a>

                                            <a href="{{ route('delete.data.companies', $item->id) }}" class="btn btn-danger"
                                                id="id-delete">Delete</a>
                                        @endif
                                    </td>
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
            $('#companiesTable').DataTable();
        });
    </script>
@endsection

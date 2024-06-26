@extends('components.layouts.app')

@section('title', 'Table Data Divisions')

@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Divisions</h6>
                @if (Auth::user()->role != 'user')
                    <a href="{{ route('create.data.division') }}">Tambah Data</a>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="divisionsTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name Divisions</th>
                                <th>Member</th>
                                @if (Auth::user()->role != 'user')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->name_division }}</td>
                                    <td>{{ $item->member }}</td>
                                    @if (Auth::user()->role != 'user')
                                        <td class="d-flex justify-content-around">
                                            <a href="{{ route('edit.data.division', $item->id) }}"
                                                class="btn btn-primary">Edit</a>
                                                <a href="{{ route('delete.data.division', $item->id) }}" class="btn btn-danger"
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
            $('#divisionsTable').DataTable();
        });
    </script>
@endsection

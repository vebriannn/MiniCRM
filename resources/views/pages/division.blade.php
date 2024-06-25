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
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    @if (Auth::user()->role == 'admin')
                                        <td class="d-flex justify-content-around">
                                            <form action="{{ route('delete.data.division', $item->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    @elseif (Auth::user()->role == 'superadmin')
                                        <td class="d-flex justify-content-around">
                                            <a href="{{ route('edit.data.division', $item->id) }}" target="_blank"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('delete.data.division', $item->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
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

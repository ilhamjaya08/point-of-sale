@extends('layouts.user_type.auth')

@section('content')

<div>
    @if(session('msg'))
    <div class="alert alert-{{ session('type')}}" role="alert">
        {{ session('msg') }}
    </div>
    @endsession

    <div class="row">
        <div class="card mb-4 mx-4">
            <div class="card-header pb-1">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <h5>Category</h5>
                    </div>
                    <a href="{{route('category.create')}}" class="btn btn-sm bg-gradient-primary" type='button'>Tambah
                        Category</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Category</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($data as $value)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $value->item_category_name }}</td>
                                <td>
                                    <form action="{{ route('category.destroy', $value->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Hapus</button>
                                    </form>
                                    <a href="{{route('category.edit', $value->id)}}" class='btn btn-sm btn-warning'>Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

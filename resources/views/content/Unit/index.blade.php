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
                        <h5>Unit</h5>
                    </div>
                    <a href="{{route('unit.create')}}" class="btn btn-sm bg-gradient-primary" type='button'>Tambah
                        Unit</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Unit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($units as $index => $unit)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $unit->item_unit_name }}</td>
                                <td><a href="{{ route('unit.edit', $unit->id) }}">Edit</a></td>
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

@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert"></div>
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
                            <tr>
                                <td>1</td>
                                <td>Pcs</td>
                                <td><a>Edit</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>BAG</td>
                                <td><a>Edit</a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>BTL</td>
                                <td><a>Edit</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

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
                    <a href="{{route('unit.index')}}" class="btn btn-sm bg-gradient-primary" type='button'>
                        Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <div class="text-dark">Nama Unit</div>
                            <input type="text">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

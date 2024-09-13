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
            <form action="{{route('unit.update', $unit->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="text-dark">Nama Unit</div>
                                <input placeholder="Masukkan Nama Unit" type="text" class='form-control'
                                    required name='item_unit_name' id='item_unit_name' value="{{ $unit->item_unit_name}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div civ class="text-dark">Kode Unit</div>
                                <div class="form-group">
                                <input placeholder="Masukkan Kode Unit" type="text" class='form-control'
                                required name='item_unit_code' id='item_unit_code' value="{{ $unit->item_unit_code}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer float-end">
                    <button class='btn btn-danger' type='reset'>Batal</button>
                    <button class='btn btn-primary' type='submit'>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

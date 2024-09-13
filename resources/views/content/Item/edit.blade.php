@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert"></div>
    <div class="row">
        <div class="card mb-4 mx-4">
            <div class="card-header pb-1">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <h5>Item</h5>
                    </div>
                    <a href="{{route('item.index')}}" class="btn btn-sm bg-gradient-primary" type='button'>
                        Kembali</a>
                </div>
            </div>
            <form action="{{route('item.update', $item->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="text-dark">Nama Item</div>
                                <input placeholder="Masukkan Nama Item" type="text" class='form-control'
                                    required name='item_item_name' id='item_item_name' value="{{ $item->item_item_name}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div civ class="text-dark">Kode Item</div>
                                <div class="form-group">
                                <input placeholder="Masukkan Kode Item" type="text" class='form-control'
                                required name='item_item_code' id='item_item_code' value="{{ $item->item_item_code}}">
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

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
                                required  name='item_name' id='item_name' value='{{$item->item_name}}'>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="text-dark">Kode Item</div>
                                <input placeholder="Masukkan Kode Item" type="text" class='form-control'
                                required  name='item_code' id='item_code' value='{{$item->item_code}}'>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="text-dark">Barcode Item</div>
                                <input placeholder="Masukkan Barcode Item" type="text" class='form-control'
                                required  name='item_barcode' id='item_barcode' value='{{$item->item_barcode}}'>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="text-dark">Stock Item</div>
                                <input placeholder="Masukkan Stock Item" type="number" class='form-control'
                                required  name='last_balance' id='last_balance' value='{{$item->stock->last_balance}}'>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="text-dark">Harga Beli</div>
                                <input placeholder="Masukkan Harga Beli Item" type="number" class='form-control'
                                required  name='item_unit_cost' id='item_unit_cost' value='{{$item->item_unit_cost}}'>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="text-dark">Harga Jual</div>
                                <input placeholder="Masukkan Harga Beli Item" type="number" class='form-control'
                                required  name='item_unit_price' id='item_unit_price' value='{{$item->item_unit_price}}'>
                            </div>
                        </div>
                        <div class="col-sm-12 col-sm-6">
                            <div class="form-group">
                                <div class="text-dark">Category</div>
                                <select name="item_category_id" id="item_category_id" class='form-select'>
                                    @foreach( $category as $key => $val)
                                        <option {{$key == $item->item_category_id? 'selected':'' }} value="{{ $key }}">{{$val}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-sm-6">
                            <div class="form-group">
                                <div class="text-dark">Unit</div>
                                <select name="item_unit_id" id="item_unit_id" class='form-select'>
                                    @foreach( $unit as $key => $val)
                                        <option {{$key == $item->item_unit_id? 'selected':'' }} value="{{ $key }}">{{$val}}</option>
                                    @endforeach 
                                </select>
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        $data = Item::get();
        return view('content.Item.index', compact('data'));
    }
    public function edit(Item $item)
    {
        return view('content.Item.edit', compact('item'));
    }

    public function create()
    {
        return view('content.Item.add');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            Item::create($request->all());
            DB::commit();

            return redirect()->route('item.index')->with(['msg'=>'Input Success', 'type'=>'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            report($th);

            return redirect()->route('item.index')->with(['msg'=>'Input Failed', 'type'=>'danger']);
        }
    }

    public function destroy(Item $item)
    {
        try {
            DB::beginTransaction();
            $item->delete();
            DB::commit();

            return redirect()->route('item.index')->with(['msg' => 'Delete Success', 'type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            report($th);

            return redirect()->route('item.index')->with(['msg' => 'Delete Failed', 'type' => 'danger']);
        }
    }
    public function update(Request $request, Item $item)
    {
        try {
            DB::beginTransaction();
            $item->update($request->all());
            DB::commit();

            return redirect()->route('item.index')->with(['msg' => 'Update Success', 'type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            report($th);

            return redirect()->route('item.index')->with(['msg' => 'Update Failed', 'type' => 'danger']);
        }
    }
}


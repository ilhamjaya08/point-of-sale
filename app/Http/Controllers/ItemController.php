<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Unit;
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
        $unit = Unit::get()->pluck('item_unit_name', 'id');
        $category = Category::get()->pluck('item_category_name', 'id');
        $item = Item::find($item->id);
        return view('content.Item.edit', compact('unit', 'item', 'category'));
    }

    public function create()
    {
        $unit = Unit::get()->pluck('item_unit_name', 'id');
        $category = Category::get()->pluck('item_category_name', 'id');
        return view('content.Item.add', compact('unit', 'category'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $item = Item::create($request->all());
            $item->stock()->create($request->only('last_balance'));
            DB::commit();

            return redirect()->route('item.index')->with(['msg'=>'Input Success', 'type'=>'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            report($th);

            return redirect()->route('item.index')->with(['msg'=>'Input Failed', 'type'=>'danger']);
        }
    }

    public function destroy(Item $item)
    {
        try {
            DB::beginTransaction();
            $item->delete();
            $item->stock()->delete();
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
            $item->stock()->update($request->only('last_balance'));
            DB::commit();

            return redirect()->route('item.index')->with(['msg' => 'Update Success', 'type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            report($th);
            dd($th);

            return redirect()->route('item.index')->with(['msg' => 'Update Failed', 'type' => 'danger']);
        }
    }
}


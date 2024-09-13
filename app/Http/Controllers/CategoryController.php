<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::get();
        return view('content.Category.index', compact('data'));
    }
    public function edit(Category $category)
    {
        return view('content.Category.edit', compact('category'));
    }

    public function create()
    {
        return view('content.Category.add');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            Category::create($request->all());
            DB::commit();

            return redirect()->route('category.index')->with(['msg'=>'Input Success', 'type'=>'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            report($th);

            return redirect()->route('category.index')->with(['msg'=>'Input Failed', 'type'=>'danger']);
        }
    }

    public function destroy(Category $category)
    {
        try {
            DB::beginTransaction();
            $category->delete();
            DB::commit();

            return redirect()->route('category.index')->with(['msg' => 'Delete Success', 'type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            report($th);

            return redirect()->route('category.index')->with(['msg' => 'Delete Failed', 'type' => 'danger']);
        }
    }
    public function update(Request $request, Category $category)
    {
        try {
            DB::beginTransaction();
            $category->update($request->all());
            DB::commit();

            return redirect()->route('category.index')->with(['msg' => 'Update Success', 'type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            report($th);

            return redirect()->route('category.index')->with(['msg' => 'Update Failed', 'type' => 'danger']);
        }
    }
}


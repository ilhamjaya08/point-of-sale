<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    public function index()
    {
        $data = Unit::get();
        return view('content.Unit.index', compact('data'));
    }
    public function edit(Unit $unit)
    {
        return view('content.Unit.edit', compact('unit'));
    }

    public function create()
    {
        return view('content.Unit.add');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            Unit::create($request->all());
            DB::commit();

            return redirect()->route('unit.index')->with(['msg'=>'Input Success', 'type'=>'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            report($th);

            return redirect()->route('unit.index')->with(['msg'=>'Input Failed', 'type'=>'danger']);
        }
    }

    public function destroy(Unit $unit)
    {
        try {
            DB::beginTransaction();
            $unit->delete();
            DB::commit();

            return redirect()->route('unit.index')->with(['msg' => 'Delete Success', 'type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            report($th);

            return redirect()->route('unit.index')->with(['msg' => 'Delete Failed', 'type' => 'danger']);
        }
    }
    public function update(Request $request, Unit $unit)
    {
        try {
            DB::beginTransaction();
            $unit->update($request->all());
            DB::commit();

            return redirect()->route('unit.index')->with(['msg' => 'Update Success', 'type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            report($th);

            return redirect()->route('unit.index')->with(['msg' => 'Update Failed', 'type' => 'danger']);
        }
    }
}


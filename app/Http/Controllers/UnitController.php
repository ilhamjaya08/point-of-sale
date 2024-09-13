<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    public function index()
    {
        $units = DB::table('units')->get();
        return view('content.Unit.index', compact('units'));
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
    }}

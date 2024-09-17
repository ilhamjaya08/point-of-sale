<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sales::get();
        return view('content.Sales.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sales)
    {
        try {
            DB::beginTransaction();
            $sales->delete();
            $sales->items()->delete();
            DB::commit();

            return redirect()->route('item.index')->with(['msg' => 'Delete Success', 'type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            report($th);

            return redirect()->route('item.index')->with(['msg' => 'Delete Failed', 'type' => 'danger']);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\InventoryUsage;
use Illuminate\Http\Request;

class InventoryUsageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventoryUsages = InventoryUsage::with('product','order')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            #dd($inventoryUsages);
        return view('inventoryusage.index', compact('inventoryUsages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventoryusage.create');
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
    public function show(InventoryUsage $inventoryUsage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InventoryUsage $inventoryUsage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InventoryUsage $inventoryUsage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InventoryUsage $inventoryUsage)
    {
        //
    }
}

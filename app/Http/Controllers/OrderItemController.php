<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Provider;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $providers = Provider::all();
        $selectedProviderId = $request->get('provider_id');
        $orderItems = collect();
        if ($selectedProviderId) {
        $orderItems = \App\Models\OrderItem::with(['order', 'product'])
            ->whereHas('order', function ($query) use ($selectedProviderId) {
                $query->where('provider_id', $selectedProviderId);
            })
            ->orderByDesc('created_at')
            ->get();
        }
        return view('orderitem.index', compact('providers','selectedProviderId', 'orderItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orderitem.create');
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
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderItem $orderItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderItem $orderItem)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Inventory;
use App\Models\InventoryUsage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::orderBy('id')->get();
        return view('orders.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = Provider::all();
        $products = Product::all();
        return view('orders.create', compact('providers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'provider_id' => 'required|exists:providers,id',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $order = Order::create([
                'provider_id' => $request->provider_id,
                'order_number' => 'ORD-' . Str::upper(Str::random(8)),
                'status' => 'Completed',
            ]);

            $total = 0;

            foreach ($request->products as $item) {
                $product = Product::find($item['id']);
                $subtotal = $product->price * $item['quantity'];
                $total += $subtotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                    'subtotal' => $subtotal,
                ]);

                // Update product stock
                $product->decrement('stock', $item['quantity']);
                //dd($product->id);

                // Log inventory usage
                InventoryUsage::create([
                    'product_id' => $product->id,
                    'order_id' =>  $order->id,
                    'quantity' => $item['quantity'],
                    'transaction_type' => 'OUT'
                ]);
            }

            $order->update(['total_amount' => $total]);
        });

        return redirect()->route('orders.confirmation')->with('success', 'Order placed successfully!');
    }
    /**
     * confirmation
     */
    public function confirmation()
    {
        return view('orders.confirmation');
    }
    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}

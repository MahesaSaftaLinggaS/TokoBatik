<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ShoppingCart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutComponent extends Component
{
    public $cartItems;
    public $subtotal = 0;
    public $vat = 0;
    public $discount = 0;
    public $total = 0;

    public $address = '';
    public $payment_method = 'credit_card';

    public $pageTitle = 'Checkout';

    public function mount()
    {
        $this->cartItems = $this->getCartItems();
        $this->calculateTotals();
    }

    public function getCartItems()
    {
        return ShoppingCart::with('product')
            ->where('user_id', Auth::id())
            ->get();
    }

    public function calculateTotals()
    {
        $this->subtotal = $this->cartItems->sum(function($item) {
            return $item->quantity * $item->product->price;
        });
        $this->vat = $this->subtotal * 0.11;
        $this->discount = 30000; // example discount
        $this->total = $this->subtotal + $this->vat - $this->discount;
    }

    public function placeOrder()
    {
        $this->validate([
            'address' => 'required|string|max:255',
            'payment_method' => 'required|string',
        ]);

        if ($this->cartItems->isEmpty()) {
            session()->flash('error', 'Your cart is empty.');
            return;
        }

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => Auth::id(),
                'status' => 'pending',
                'total' => $this->total,
                'address' => $this->address,
                'payment_method' => $this->payment_method,
            ]);

            foreach ($this->cartItems as $item) {
                $order->products()->attach($item->product_id, [
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }

            // Clear shopping cart
            ShoppingCart::where('user_id', Auth::id())->delete();

            DB::commit();

            session()->flash('success', 'Order placed successfully!');
            return redirect()->route('order.success');

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to place order: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.checkout-component');
    }
}

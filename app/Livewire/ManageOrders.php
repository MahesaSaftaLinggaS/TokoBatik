<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class ManageOrders extends Component
{
    public $orders;

    public function mount()
    {
        $this->loadOrders();
    }

    public function loadOrders()
    {
        $this->orders = Order::with('user', 'products')->orderBy('created_at', 'desc')->get();
    }

    public function updateStatus($orderId, $status)
    {
        $order = Order::find($orderId);
        if ($order) {
            $order->status = $status;
            $order->save();
            $this->loadOrders();
            session()->flash('success', 'Order status updated successfully.');
        }
    }

    public function deleteOrder($orderId)
{
    $order = Order::find($orderId);

    if ($order) {
        $order->delete();
        // Reset auto-increment counter after deletion
        \DB::statement('ALTER TABLE orders AUTO_INCREMENT = 1');
        $this->loadOrders();
        session()->flash('success', 'Order deleted successfully.');
    }
}


    public function render()
    {
        return view('livewire.manage-orders', [
            'orders' => $this->orders,
        ])->layout('admin-layout');
    }
}

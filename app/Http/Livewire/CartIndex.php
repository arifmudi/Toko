<?php

namespace App\Http\Livewire;

use App\product;
use App\Support\Facades\Cart;
use Livewire\Component;

class CartIndex extends Component
{
    public $cart;
    public $grandTotal = 0;

    public function mount()
    {
        $this->cart = Cart::get();
        $this->grandTotal = collect($this->cart['products'])->sum('price');
    }

    public function render()
    {
                return view('livewire.cart-index', [
            'items' => Cart::groupedItems()->sortBy('name'),
        ]);
    }

    public function removeItems(int $productId)
    {
        Cart::removeItem($productId);
        $this->updateCart();
    }

    public function kurangQtyProduct(int $productId)
    {
        Cart::remove($productId);
        $this->updateCart();
    }

    public function tambahQtyProduct(int $productId)
    {
        cart::add(Product::find($productId));
        $this->updateCart();
    }

    public function clearCart()
    {
        Cart::clear();
        $this->updateCart();
    }

    private function updateCart()
    {
        $this->cart = cart::get();
        $this->grandTotal = collect($this->cart['products'])->sum('price');
        $this->emit('updateCartTotal');
    }
}

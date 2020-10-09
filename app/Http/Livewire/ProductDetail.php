<?php

namespace App\Http\Livewire;

use App\Product;
use App\Support\Facades\Cart;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;
    // public $cart;

    public function mount(Product $product)
    {
        // $this->cart = Cart::get();
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.product-detail');
    }

    public function addToCart($productId)
    {
        Cart::add(Product::find($productId));
        $this->emit('updateCartTotal');
    }
}

<?php

namespace App\Http\Livewire;

use App\Support\Facades\Cart;
use Livewire\Component;

class Navbar extends Component
{
    public $cartTotal = 0;

    protected $listeners = [
        'updateCartTotal'
    ];

    public function mount()
    {
        $this->cartTotal = count(Cart::get()['products']);
    }

    public function render()
    {
        return view('livewire.navbar');
    }

    public function updateCartTotal()
    {
        $this->cartTotal = count(Cart::get()['products']);
    }
    
}

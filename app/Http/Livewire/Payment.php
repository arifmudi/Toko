<?php

namespace App\Http\Livewire;

use App\Order;
use Livewire\Component;

class Payment extends Component
{
    public $order;
    
    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.payment');
    }
}

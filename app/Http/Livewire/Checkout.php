<?php

namespace App\Http\Livewire;

use App\Courier;
use App\Order;
use App\OrderDetail;
use App\Support\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Checkout extends Component
{
    public $name;
    public $email;
    public $address;
    public $phone;
    public $courier;
    public $cityId = 0;
    public $shoppingTotal = 0;
    public $shippingCost = 0;
    public $cities = [];
    public $courierServices = [];

    public function mount()
    {
        $this->shoppingTotal = collect(Cart::get()['products'])->sum('price');
        $this->name = Auth::user()->name; 
        $this->email = Auth::user()->email;
    }

    public function render()
    {
        $provinces = Http::withHeaders([
            'key' => config('toko.services.rajaongkir.api_key'),
        ])->get('https://api.rajaongkir.com/starter/province')
                ->json()['rajaongkir']['results'];

        return view('livewire.checkout', [
            'items' => Cart::groupedItems()->sortby('name'),
            'provinces' => $provinces,
            'couriers' => Courier::get(),
        ]);
    }

    public function selectProvince($provinceId)
    {
        $this->cities = Http::withHeaders([
            'key' => config('toko.services.rajaongkir.api_key'),
        ])->get('https://api.rajaongkir.com/starter/city?province='.$provinceId)
                ->json()['rajaongkir']['results'];
    }

    public function selectCourier($courier)
    {
        $this->courierServices = Http::withHeaders(([
            'key' => config('toko.services.rajaongkir.api_key'),
        ]))->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => config('toko.services.rajaongkir.origin'),
            'destination' => $this->cityId,
            'weight' => 1000,
            'courier' => $courier
        ])->json()['rajaongkir']['results'][0]['costs'];

        // dd($this->courierServices);
    }

    public function selectService($service)
    {
        $this->shippingCost = collect($this->courierServices)
                                ->where('service', $service)
                                ->first()['cost'][0]['value'];

    }

    public function createOrder()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address'=>'required',
            'phone'=>'required|numeric'
        ]);

        DB::transaction(function () {
            $order = Order::create([
                'user_id'=>Auth::id(),
                'user_name' => $this->name,
                'user_email' => $this->email,
                'user_address' => $this->address,
                'user_phone'=> $this->phone,
                'courier'=> "{$this->courier} {$this->courierServices[0]['service']}",
                'shipping_cost' => $this->shippingCost,
                'total' => $this->shoppingTotal
            ]);
    
            $items = Cart::groupedItems()->sortby('name');
            $items->each(function($item) use ($order){
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'qty' => $item['qty'],
                    'price'	=> $item['price'],
                    'subtotal' => $item['sub_total']
                ]);
            });

            Cart::clear();
            return redirect()->route('payment.index', $order);

        });        
    }
}

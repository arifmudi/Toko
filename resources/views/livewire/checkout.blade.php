<div class="flex space-x-2">
    <div class="w-8/12 bg-white p-4">
        <div class="mb-2">
            <span class="text-xl font-bold">Shipping Detail</span>
        </div>
        {{-- Name --}}
        <div class="mb-2">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input
            wire:model="name"
            type="text" name="name" class="shadow appearance-none border w-full py-2 px-3 text-gray-700 mb-2 leading-tight focus:outline-none focus:shadow-outline @error('name')
                border-red-500
            @enderror" placeholder="Enter Your Name" value="{{ Auth::user()->name }}">
            @error('name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        {{-- email --}}
        <div class="mb-2">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input 
            wire:model="email"
            type="email" name="email" class="shadow appearance-none border w-full py-2 px-3 text-gray-700 mb-2 leading-tight focus:outline-none focus:shadow-outline @error('email')
                border-red-500
            @enderror" placeholder="Enter Your Name" value="{{ Auth::user()->email }}">
            @error('email')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        {{-- Province --}}
        <div class="mb-2">
            <label for="province" class="block text-gray-700 text-sm font-bold mb-2">Province</label>
            <div class="inline-block relative w-full">
                <select wire:change="selectProvince($event.target.value)" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="province">
                  <option>Select Province</option>
                  @foreach ($provinces as $province)
                  <option value="{{ $province['province_id']  }}">{{ $province['province'] }}</option>
                  @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
              </div>
        </div>
        {{-- Kota --}}
        <div class="mb-2">
            <label for="city" class="block text-gray-700 text-sm font-bold mb-2">City</label>
            <div class="inline-block relative w-full" wire:loading wire:target="selectProvince">
                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="city" disabled>
                  <option selected>Loading Data ... </option>
                </select>
            </div>
            <div class="inline-block relative w-full" wire:loading.remove wire:target="selectProvince">
                <select wire:model="cityId" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="city">
                  <option selected>Select City</option>
                  @foreach ($cities as $city)
                    <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                  @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
              </div>
        </div>
        {{-- Alamat --}}
        <div class="mb-2">
            <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
            <input type="text" wire:model="address" class="shadow appearance-none border w-full py-2 px-3 text-gray-700 mb-2 leading-tight focus:outline-none focus:shadow-outline @error('alamat')
                border-red-500
            @enderror" placeholder="Enter Your alamat"">
            @error('alamat')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        {{-- phone --}}
        <div class="mb-2">
          <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone </label>
          <input wire:model="phone" type="text" class="shadow appearance-none border w-full py-2 px-3 text-gray-700 mb-2 leading-tight focus:outline-none focus:shadow-outline @error('phone')
              border-red-500
          @enderror" placeholder="Enter Your Phone"">
          @error('phone')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
      </div>
        {{-- Courier --}}
        <div class="mb-2">
            <label for="courier" class="block text-gray-700 text-sm font-bold mb-2">Courier</label>
            <div class="inline-block relative w-full">
                <select 
                wire:model="courier"
                wire:change="selectCourier($event.target.value)" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="courier">
                  <option selected>Select Courier</option>
                  @foreach ($couriers as $courier)
                  <option value="{{ $courier['code'] }}">{{ $courier['name'] }}</option>
                  @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
              </div>
        </div>
        {{-- Service Courier --}}
        <div class="mb-2">
          <label for="courier_service" class="block text-gray-700 text-sm font-bold mb-2">Service Courier</label>
            <div class="inline-block relative w-full" wire:loading wire:target="selectCourier">
                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="city" disabled>
                  <option selected>Loading Data ... </option>
                </select>
            </div>
            
            <div class="inline-block relative w-full" wire:loading.remove wire:target="selectCourier">
                <select
                wire:change="selectService($event.target.value)"
                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" 
                name="courier_service">
                  <option selected>Select Service Courier</option>
                  @foreach ($courierServices as $courierService)
                    <option value="{{ $courierService['service']  }}">{{ $courierService['description'] }} - {{ format_rupiah($courierService['cost'][0]['value']) }}</option>
                  @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
              </div>
        </div>
    </div>
    <div class="w-4/12 bg-white p-4">
        <div>
            <div class="flex">
              <span class="w-1/2 text-xl font-bold">Cart Detail</span>
              <div class="flex justify-end w-1/2">
                <button wire:click="createOrder" class="justify-end bg-green-600 text-white font-bold p-2 hover:bg-green-400">
                  Create Order
                </button>
              </div>
            </div>
            @foreach ($items as $item)
            <div class="flex bg-white p-2 mb-2 shadow-md border my-2">
                <div class="w-1/6">
                    <img src="{{ $item['image'] }}" class="w-12 h-12 justify-end" alt="{{ $item['name'] }}">
                </div>
                <div class="w-5/6">
                    <div class="flex">
                        <div class="justify-start flex-col w-5/6">
                            <h3 class="font-bold">{{ $item['name'] }}</h3>
                            <p class="text-sm">{{ $item['qty'] }} x @ {{ format_rupiah($item['price']) }}</p>
                        </div>
                    </div>
                    
                    <div class="flex justify-end ">
                        <span class="font-bold text-green-500">
                            {{ format_rupiah($item['sub_total']) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="bg-white p-2 mb-2 shadow-md border-2 my-2">
              <div class="flex">
                <span class="w-3/5">Total Shopping</span>
                <span class="w-2/5 justify-end font-bold text-green-500">{{ format_rupiah($shoppingTotal) }}</span>
              </div>
              <div class="flex">
                <span class="w-3/5">Shipping Cost</span>
                <span class="w-2/5 justify-end font-bold text-green-500">{{ format_rupiah($shippingCost) }}</span>
              </div>
              <div class="flex">
                <span class="w-3/5">Total</span>
                <span class="w-2/5 justify-end font-bold text-green-500">{{ format_rupiah($shoppingTotal + $shippingCost) }}</span>
              </div>
            </div>
        </div>
        
    </div>
</div>

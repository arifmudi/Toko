<div>
    <div class="flex">
        <div class="w-4/5">
            <h2 class="text-3xl font-bold">Shoping Cart</h2>
        </div>
        @if ($items->count() !== 0)
        <div class="w-1/5 flex justify-end m-2">
            <button wire:click="clearCart" class="bg-red-500 p-2 text-white rounded-lg font-bold hover:bg-red-300">Clear Cart</button>
            <a href="{{ route('checkout.index') }}" class="bg-teal-500 p-2 text-white rounded-lg font-bold hover:bg-teal-300 ml-2">Checkout</a>
        </div>
        @endif
    </div>
    @forelse ($items as $item)
        <div class="flex bg-white p-2 mb-2">
            <div class="w-1/6">
                <img src="{{ $item['image'] }}" class="w-24 h-24 justify-end" alt="{{ $item['name'] }}">
            </div>
            <div class="w-5/6">
                <div class="flex">
                <div class=w-4/5>
                    <div class="justify-start flex-col w-5/6">
                        <h3 class="text-xl font-bold">{{ $item['name'] }}</h3>
                        <p>{{ $item['qty'] }} x @ {{ format_rupiah($item['price']) }}</p>
                        <div class="flex space-x-2 mt-2">
                            <button wire:click="kurangQtyProduct({{ $item['id'] }})" class="flex items-center h-6 w-6 justify-center bg-red-500 hover:bg-red-300 p-1 rounded-lg font-extrabold">-</button>
                            
                            <button wire:click="tambahQtyProduct({{ $item['id'] }})" class="flex items-center h-6 w-6 justify-center bg-teal-500 hover:bg-teal-300 p-1 rounded-lg font-extrabold">+</button>
                        </div>
                    </div>
                </div>
                <div class=w-1/5>
                    <div class="flex justify-end">
                        <button wire:click="removeItems({{ $item['id'] }})"
                            class="bg-red-600 text-white rounded p-2 mr-2 mb-2 hover:opacity-75">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="trash w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                </div>
                <div class="flex justify-end ">
                    <span class="text-xl font-bold">Sub Total
                        {{ format_rupiah($item['sub_total']) }}</span>
                </div>
            </div>
        </div>
    @empty
        <div class="flex bg-white p-4 mb-2 items-center justify-center">
            <h2 class="text-2xl font-bold"> No Items in cart</h2>
        </div>
    @endforelse

    @if ($items->count() != 0)
    <div class="flex bg-white p-4 mb-2 items-center">
        <div class="w-5/6">
            <span class="text-xl font-bold mr-4">Total Belanja</span>
        </div>
        <div class="w-1/6 flex justify-end">
                <span class="text-xl font-bold">{{ format_rupiah($grandTotal) }}</span>
        </div>
    </div>
    @endif

</div>

<div>
    <div class="container max-w-3xl m-auto">
        <h1 class="font-bold text-3xl">Payment Detail</h1>
        <div class="bg-white mt-4 border shadow shadow-md">
            <div class="flex p-2 justify-center bg-green-300">
                Need Payment
            </div>

            <div class="flex p-4 justify-between border-b">
                <span class="font-bold">ORDER #{{ $order->id }} </span>
                <span class="font-bold text-gray-600">{{ $order->created_at->format('d M Y') }}</span>
            </div>

            <div class="flex bor-b">
                <div class="flex w-1/3 p-4 flex-col">
                    <h1 class="font-bold">Delivery Details</h1>
                    <span>Name : {{ $order->user_name }}</span>
                    <span>Address : {{ $order->user_address }}</span>
                    <span>Phone : {{ $order->user_phone }}</span>
                </div>

                <div class="flex w-2/3 p-4 flex-col">
                    <h1 class="font-bold">Order Details</h1>
                    @foreach ($order->details as $item)
                        <div class="flex justify-between bg-white border p-2 shadow shadow-sm m-1">
                            <span class="flex justify-start">
                                {{ $item->product->name }} x {{ $item->qty }}
                            </span>
                            <span class="flex justify-end">
                                {{ format_rupiah($item->subtotal) }}
                            </span>
                        </div>
                    @endforeach
                    <div class="flex justify-between bg-white border p-2 shadow shadow-sm m-1">
                        <span class="flex justify-start">
                            Ongkir
                        </span>
                        <span class="flex justify-end">
                            {{ format_rupiah($order->shipping_cost) }}
                        </span>
                    </div>
                    <div class="flex justify-between bg-white border p-2 shadow shadow-sm m-1">
                        <span class="flex justify-start">
                            Total
                        </span>
                        <span class="flex justify-end">
                            {{ format_rupiah($order->total + $order->shipping_cost) }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="flex justify-end items-center m-2">
                    <button class="p-2 bg-green-600 text-white p-2 hover:bg-green-400">Pay Now</button>
            </div>
        </div>
    </div>
</div>

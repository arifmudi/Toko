<div class="flex flex-wrap">

    <div class="w-full md:w-2/12 sr-only md:not-sr-only">
        <div class="bg-white mt-2 px-8 py-6">
            <h1 class="font-bold border-b text-xl">
                Kategori
            </h1>
            @foreach ($categories as $categoryProduct)
                <a wire:click="selectCategory({{ $categoryProduct->id }})" class="my-2 flex  hover:text-green-600">
                    @if ($category === $categoryProduct->id)
                        <span class="text-green-600">{{ $categoryProduct->name }}
                            ({{ $categoryProduct->products->count() }})</span>
                    @else
                        <span>{{ $categoryProduct->name }}
                            ({{ $categoryProduct->products->count() }})</span>
                    @endif
                </a>
            @endforeach
        </div>
    </div>

    <div class="w-full md:w-10/12">
        <div class="flex flex-wrap">
            <input type="text" wire:model="search"
                class="focus:outline-none focus:shadow-outline border border-gray-500 rounded-md py-2 px-4 block w-full mb-2 mx-2 mt-2"
                placeholder="Type your search">
            @foreach ($products as $product)
                <div class="w-1/2 md:w-1/3 lg:w-1/4 p-2">  
                        <div class="flex justify-center flex-col bg-white shadow-md p-4 rounded-md hover:bg-green-100">
                            <a href="{{ route('product.detail', $product) }}">
                            <div class="flex justify-center">
                                <img src="{{ $product->getImage() }}" alt="{{ $product->name }}"
                                    class="h-32 w-32 md:h-48 md:w-48">
                            </div>

                            <div class="text-left">
                                <span class="font-bold">{{ $product->name }}</span>
                                <p class="text-pink-700">{{ format_rupiah($product->price) }}</p>
                            </div>
                            </a>
                            <button wire:click="addToCart({{ $product->id }})" class="p-2 bg-green-600 text-white hover:bg-green-400 rounded-lg">Add to Cart</button>
                        </div>
                </div>
            @endforeach
        </div>
        {{ $products->links('vendor.pagination.tailwind') }}
    </div>
</div>

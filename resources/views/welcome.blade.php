<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Toko.Com</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/main.css">
</head>


<body class="bg-gray-200">
    <div class="fixed w-full top-0">
        @if (Route::has('login'))
            <div class="flex items-center flex-wrap bg-green-600 text-white p-4 ">
                <div class="flex-1 font-bold md:ml-12 items-center">
                    <h1 class="font-bold md:ml-12 items-center flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-shopping-bag h-8 w-8">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                        </svg>
                        <span class="text-xl ml-2">Toko.Com</span>
                    </h1>
                </div>
                <div class="justify-end md:mr-12">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-bold mr-2">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-bold ">Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        @endif
    </div>
    <div class="h-full overflow-y-auto mt-20">
        <div class="container mx-auto p-2">
            <div class="flex flex-wrap">

                <div class="w-full md:w-2/12 sr-only md:not-sr-only">
                    <div class="bg-white mt-2 px-8 py-6">
                        <h1 class="font-bold border-b text-xl">
                            Kategori
                        </h1>
                        @foreach ($categories as $category)
                            <a href="#" class="my-2 flex text-gray-700 hover:text-green-600">{{ $category->name }}
                                (0)</a>
                        @endforeach
                    </div>
                </div>

                <div class="w-full md:w-10/12">
                    <div class="flex flex-wrap">
                        @foreach ($products as $product)
                            <div class="w-1/2 md:w-1/3 lg:w-1/4 p-2">
                                <a href="#">
                                    <div
                                        class="flex justify-center flex-col bg-white shadow-md p-4 rounded-md hover:opacity-75">

                                        <div class="flex justify-center">
                                            <img src="{{ $product->getImage() }}" alt="{{ $product->name }}"
                                                class="h-32 w-32 md:h-48 md:w-48">
                                        </div>

                                        <div class="text-left">
                                            <span class="font-bold">{{ $product->name }}</span>
                                            <p class="text-pink-700">Rp. {{ number_format($product->price) }}</p>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    {{ $products->links('vendor.pagination.tailwind') }}
                </div>

            </div>
        </div>
    </div>
</body>

</html>

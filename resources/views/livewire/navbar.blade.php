<div class="fixed w-full top-0">
    @if (Route::has('login'))
        <div class="flex items-center flex-wrap bg-green-600 text-white p-4 ">
            <div class="flex-1 font-bold md:ml-12 items-center">
                <a href="{{ route('index') }}">
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
                </a>
            </div>
            <div class="justify-end md:mr-12">
                @auth
                    <div class="flex flex-center">
                        <a href="{{ route('cart.index') }}">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="shopping-cart w-6 h-6">
                                <path
                                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                </path>
                            </svg>
                        </a>
                        <span class="text-xl">({{ $cartTotal }})</span>
                        {{-- <a class="font-bold mr-2 ml-2" href="{{ url('/home') }}">Home</a>
                        --}}
                        <a class="font-bold mr-2 ml-4" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="font-bold mr-2">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-bold">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    @endif
</div>

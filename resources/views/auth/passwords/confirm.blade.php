@extends('layouts.app')

@section('content')
    <div class="w-full">
        <div class="flex p-4 items-center justify-center mt-10">
            <div class="w-2/4 bg-white shadow-md rounded-md">
                <div class="p-4">
                    <div class="text-center font-bold text-2xl my-4">{{ __('Confirm Password') }}</div>

                    <div class="">
                        {{ __('Please confirm your password before continuing.') }}

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="password"
                                    class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="shadow appearance-none border rounded w-full px-3 py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border border-red-500 @enderror"
                                        name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="text-red-500 text-xs italic" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="flex items-center justify-between">
                                    <button type="submit"
                                        class="bg-green-600 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        {{ __('Confirm Password') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

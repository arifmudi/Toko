@extends('layouts.app')

@section('content')
    <div class="w-full">
        <div class="flex p-4 items-center justify-center mt-10">
            <div class="w-2/4 bg-white shadow-md rounded-md">
                <div class="p-4">
                    <div class="text-center font-bold text-2xl my-4">{{ __('Verify Your Email Address') }}</div>

                    <div class="">
                        @if (session('resent'))
                            <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 border-green-300 text-white-700"
                                role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline font-normal text-white bg-green-600 hover:opacity-75">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

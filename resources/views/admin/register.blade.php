
@extends('dashboard')

@section('content')
@if(Auth::user()->usertype == 'adm')
    <x-jet-authentication-card>
        <x-slot name="logo">
            <!-- <x-jet-authentication-card-logo /> -->
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
        <form method="POST" action="{{ Route('registration.post') }}">
            @csrf
            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('First Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="secondname" value="{{ __('Second name') }}" />
                <x-jet-input id="secondname" class="block mt-1 w-full" type="text" name="secondname" :value="old('secondname')" required autofocus autocomplete="secondname" />
            </div>

            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('Phone Number') }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="usertype" value="{{ __('User Type') }}" />
                <select id="usertype" name="usertype" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus: ring-opacity-50 ronded-md shadow-sm">
                <option value=""> </option>
                   <option value="adm">adm</option>
                   <option value="usr">usr</option>
                </select>
            </div>
            <!-- <div class="mt-4">
                <x-jet-label for="usertype" value="{{ __('usertype') }}" />
                <x-jet-input id="usertype" class="block mt-1 w-full" type="text" name="usertype" :value="old('usertype')" required autofocus autocomplete="usertype" />
            </div> -->


            <div class="flex items-center justify-end mt-4">

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    @endif
@endsection
@extends('home')

@section('content')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
            <p>{{ $message }}</p>
        </div>
    @endif
    <x-jet-authentication-card>
        <x-slot name="logo">
            <!-- <x-jet-authentication-card-logo /> -->
        </x-slot>
     
        <x-jet-validation-errors class="card shadow mb-4" />
     
        <form method="POST" action="{{ route('registration.post') }}">
            @csrf

            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <div class="mt-4">
                <x-jet-label for="secondname" value="{{ __('Second Name') }}" />
                <x-jet-input id="secondname" class="block mt-1 w-full" type="text" name="secondname" :value="old('secondname')" required autofocus autocomplete="secondname" />
            </div>
            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('Phone') }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <!-- <div class="mt-4">
                <x-jet-label for="usertype" value="{{ __('usertype') }}" />
                <x-jet-input id="usertype" class="block mt-1 w-full" type="text" name="usertype" :value="old('usertype')" required autofocus autocomplete="usertype" />
            </div> -->

            
            <div class="mt-4">
                <x-jet-label for="usertype" value="{{ __('User Type') }}" />
                <select id="usertype" name="usertype" type="text" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus: ring-opacity-50 ronded-md shadow-sm">
                <option value=""> </option>
                   <option value="adm">adm</option>
                   <option value="usr">usr</option>
                </select>
            </div>

            <!-- <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div> -->

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a> -->

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
   @endsection
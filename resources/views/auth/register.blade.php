<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-3" />

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <x-jet-label value="{{ __('Name') }}" />

                    <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                                 :value="old('name')" required autofocus autocomplete="name" />
                    <x-jet-input-error for="name"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('Email') }}" />

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                                 :value="old('email')" required />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('Password') }}" />

                    <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                 name="password" required autocomplete="new-password" />
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('Confirm Password') }}" />

                    <x-jet-input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('Country') }}" />

                    <x-jet-input class="{{ $errors->has('country') ? 'is-invalid' : '' }}" type="country" name="text"
                                 :value="old('country')" required />
                    <x-jet-input-error for="country"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('State') }}" />

                    <x-jet-input class="{{ $errors->has('state') ? 'is-invalid' : '' }}" type="state" name="text"
                                 :value="old('state')" required />
                    <x-jet-input-error for="state"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('City') }}" />

                    <x-jet-input class="{{ $errors->has('city') ? 'is-invalid' : '' }}" type="city" name="text"
                                 :value="old('city')" required />
                    <x-jet-input-error for="city"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('Zip Code') }}" />

                    <x-jet-input class="{{ $errors->has('zip_code') ? 'is-invalid' : '' }}" type="zip_code" name="text"
                                 :value="old('zip_code')" required />
                    <x-jet-input-error for="zip_code"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('Street') }}" />

                    <x-jet-input class="{{ $errors->has('street') ? 'is-invalid' : '' }}" type="street" name="text"
                                 :value="old('street')" required />
                    <x-jet-input-error for="street"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('Bulding Number') }}" />

                    <x-jet-input class="{{ $errors->has('building_number') ? 'is-invalid' : '' }}" type="building_number" name="text"
                                 :value="old('building_number')" required />
                    <x-jet-input-error for="building_number"></x-jet-input-error>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <x-jet-checkbox id="terms" name="terms" />
                            <label class="custom-control-label" for="terms">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                            </label>
                        </div>
                    </div>
                @endif

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <a class="text-muted mr-3 text-decoration-none" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-jet-button>
                            {{ __('Register') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>

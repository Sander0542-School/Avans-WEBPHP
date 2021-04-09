<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('admin.restaurants.title.edit') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('admin.restaurants.update', [$restaurant]) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="restaurantName">{{ __('admin.restaurants.form.name.label') }}</label>
                    <input name="name" value="{{ old('name', $restaurant->name) }}" type="text" class="form-control @error('name') is-invalid @enderror" id="restaurantName">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="restaurantKitchen">{{ __('admin.restaurants.form.kitchen.label') }}</label>
                    <select name="restaurant_kitchen_id" id="restaurantKitchen" class="form-control @error('restaurant_kitchen_id') is-invalid @enderror">
                        <option disabled selected>{{ __('admin.restaurants.form.kitchen.option.default') }}</option>
                        @foreach($kitchens as $kitchen)
                            <option @if(old('restaurant_kitchen_id', $restaurant->restaurant_kitchen_id) == $kitchen->id) selected @endif value="{{ $kitchen->id }}">{{ $kitchen->name }}</option>
                        @endforeach
                    </select>
                    @error('restaurant_kitchen_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="restaurantLocation">{{ __('admin.restaurants.form.location.label') }}</label>
                    <input name="location" value="{{ old('location', $restaurant->location) }}" type="text" class="form-control @error('location') is-invalid @enderror" id="restaurantLocation">
                    @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="restaurantOpens">{{ __('admin.restaurants.form.opens.label') }}</label>
                    <input name="opens_at" value="{{ old('opens_at', $restaurant->opens_at->format('H:i')) }}" type="time" class="form-control @error('opens_at') is-invalid @enderror" id="restaurantOpens">
                    @error('opens_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="restaurantCloses">{{ __('admin.restaurants.form.closes.label') }}</label>
                    <input name="closes_at" value="{{ old('closes_at', $restaurant->closes_at->format('H:i')) }}" type="time" class="form-control @error('closes_at') is-invalid @enderror" id="restaurantCloses">
                    @error('closes_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="restaurantSeats">{{ __('admin.restaurants.form.seats.label') }}</label>
                    <input name="max_seats" value="{{ old('max_seats', $restaurant->max_seats) }}" type="number" class="form-control @error('max_seats') is-invalid @enderror" id="restaurantSeats">
                    @error('max_seats')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <input type="submit" class="btn btn-success" value="{{ __('admin.restaurants.button.save') }}">
            </form>
        </div>
    </div>
</x-app-layout>

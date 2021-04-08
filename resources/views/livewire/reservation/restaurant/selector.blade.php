<div>
    <div class="form-group">
        <label for="inputRestaurantId">{{ __('reservation.restaurant.form.restaurant.label') }}</label>
        <select id="inputRestaurantId" wire:model="restaurantId" class="form-control">
            <option>{{ __('reservation.restaurant.form.restaurant.option.default') }}</option>
            @foreach($restaurants as $restaurant)
                <option value="{{ $restaurant->id }}">{{ $restaurant->name }} ({{ $restaurant->kitchen->name }})</option>
            @endforeach
        </select>
    </div>

    @if($dataValid)
        <button wire:click="confirmRestaurant" class="btn btn-primary">{{ __('reservation.restaurant.button.confirm-restaurant') }}</button>
    @endif
</div>

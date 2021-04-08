<div>
    <div class="form-group">
        <label for="inputRestaurantId">@lang('reservation.restaurant.form.restaurant.label')</label>
        <select id="inputRestaurantId" wire:model="restaurantId" class="form-control">
            <option>@lang('reservation.restaurant.form.restaurant.option.default')</option>
            @foreach($restaurants as $restaurant)
                <option value="{{ $restaurant->id }}">{{ $restaurant->name }} ({{ $restaurant->kitchen->name }})</option>
            @endforeach
        </select>
    </div>

    @if($dataValid)
        <button wire:click="confirmRestaurant" class="btn btn-primary">@lang('reservation.restaurant.button.confirm-restaurant')</button>
    @endif
</div>

<div>

    <div class="form-group">
        <label for="inputRestaurantDay">@lang('reservation.restaurant.form.day.label')</label>
        <select id="inputRestaurantDay" wire:model="day" class="form-control @error('day') is-invalid @enderror">
            <option>@lang('reservation.restaurant.form.day.option.default')</option>
            @foreach($selectableDates as $dateKey => $dateValue)
                <option value="{{ $dateKey }}">{{ $dateValue }}</option>
            @endforeach
        </select>
        @error('day') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="inputRestaurantDay">@lang('reservation.restaurant.form.day-part.label')</label>
        <select id="inputRestaurantDay" wire:model="dayPart" class="form-control @error('dayPart') is-invalid @enderror">
            <option>@lang('reservation.restaurant.form.day-part.option.default')</option>
            @foreach($selectableParts as $dayPart)
                <option value="{{ $dayPart }}">{{ \Carbon\Carbon::today()->addMinutes($dayPart * 30)->format('H:i') }}</option>
            @endforeach
        </select>
        @error('dayPart') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    @if($dataValid)
        <button wire:click="confirmTime" class="btn btn-primary">@lang('reservation.restaurant.button.confirm-reservation')</button>
    @endif
</div>

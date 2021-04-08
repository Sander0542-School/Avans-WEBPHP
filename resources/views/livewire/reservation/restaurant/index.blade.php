<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @lang('reservation.restaurant.title.header')
    </h2>
</x-slot>

<div>
    @if($reservationStep == 0 || $reservationStep == 1)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('reservation.restaurant.title.step.0')</h5>
                <livewire:reservation.restaurant.selector/>
            </div>
        </div>
        <br/>

        @if($reservationStep == 1)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('reservation.restaurant.title.step.1')</h5>

                    <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.restaurant.information.name')</h6>
                    <p class="card-text">{{ $restaurant->name }}</p>

                    <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.restaurant.information.location')</h6>
                    <p class="card-text">{{ $restaurant->location }}</p>

                    <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.restaurant.information.opening-hours')</h6>
                    <p class="card-text">{{ $restaurant->opens_at->format('H:i') }} - {{ $restaurant->closes_at->format('H:i') }}</p>

                    <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.restaurant.information.seats')</h6>
                    <p class="card-text">{{ $restaurant->max_seats }}</p>

                    <button wire:click="stepSelect" class="btn btn-primary">@lang('reservation.restaurant.button.select-time')</button>
                </div>
            </div>
        @endif
    @elseif($reservationStep == 2)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('reservation.restaurant.title.step.2')</h5>
                <livewire:reservation.restaurant.time :restaurant-id="$restaurant->id"/>
            </div>
        </div>
    @elseif($reservationStep == 3)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('reservation.restaurant.title.step.3')</h5>

                <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.restaurant.information.name')</h6>
                <p class="card-text">{{ $restaurant->name }}</p>

                <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.restaurant.information.location')</h6>
                <p class="card-text">{{ $restaurant->location }}</p>

                <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.restaurant.information.date')</h6>
                <p class="card-text">{{ \Carbon\Carbon::make($reservation['day'])->format('l j F Y') }}</p>

                <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.restaurant.information.time')</h6>
                <p class="card-text">{{ \Carbon\Carbon::today()->addMinutes(30 * $reservation['day_part'])->format('H:i') }}</p>

                <button class="btn btn-primary" wire:click="finishReservation">@lang('reservation.restaurant.button.finish')</button>
            </div>
        </div>
    @elseif($reservationStep == 4)
        <livewire:common.cards.success :title="__('reservation.restaurant.title.step.4')"/>
    @elseif($reservationStep == 5)
        <livewire:common.cards.error :title="__('reservation.restaurant.title.step.5')" :subtitle="__('reservation.restaurant.message.could-not-create')"/>
    @endif
</div>

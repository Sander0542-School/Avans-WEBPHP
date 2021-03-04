<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @lang('reservation.event.title.header')
    </h2>
</x-slot>

<div class="container">
    @if($reservationStep == 0 || $reservationStep == 1)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('reservation.event.title.step.0')</h5>
                <livewire:reservation.event.selector/>
            </div>
        </div>
        <br/>

        @if($reservationStep == 1)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('reservation.event.title.step.1')</h5>

                    <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.event.information.name')</h6>
                    <p class="card-text">{{ $event->name }}</p>

                    <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.event.information.days')</h6>
                    <div class="row">
                        @foreach($event->days as $day)
                            <div class="col col-2">
                                <div class="card text-white bg-secondary">
                                    <div class="card-body text-center">
                                        <h5 class="card-title m-0">{{ $day->format('d F') }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <br/>

                    <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.event.information.location')</h6>
                    <p class="card-text">{{ $event->location }}</p>

                    <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.event.information.max-tickets')</h6>
                    <p class="card-text">{{ $event->max_tickets }}</p>

                    <button wire:click="stepSelect" class="btn btn-primary">@lang('reservation.event.button.select-tickets')</button>
                </div>
            </div>
        @endif

    @elseif($reservationStep == 2)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('reservation.event.title.step.2')</h5>
                <livewire:reservation.event.ticket :max-tickets="$event->max_tickets" :event-id="$event->id"/>
            </div>
        </div>
    @elseif($reservationStep == 3)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('reservation.event.title.step.3')</h5>
                <livewire:reservation.event.picture />
            </div>
        </div>
    @endif
</div>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @lang('reservation.event.title.header')
    </h2>
</x-slot>

<div>
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
                <livewire:reservation.event.picture/>
            </div>
        </div>
    @elseif($reservationStep == 4)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('reservation.event.title.step.4')</h5>
                <div class="row">
                    <div class="col-8">
                        <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.event.information.name')</h6>
                        <p class="card-text">{{ $event->name }}</p>

                        <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.event.information.location')</h6>
                        <p class="card-text">{{ $event->location }}</p>

                        <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.event.information.ticket-count')</h6>
                        <p class="card-text">{{ $reservation['ticket_count'] }}</p>

                        <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.event.information.start-date')</h6>
                        <p class="card-text">{{ \Carbon\Carbon::make($reservation['start_date'])->format('d F') }}</p>

                        <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.event.information.end-date')</h6>
                        <p class="card-text">{{ \Carbon\Carbon::make($reservation['end_date'])->format('d F') }}</p>
                    </div>
                    <div class="col-4">
                        <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.event.information.picture')</h6>
                        <img alt="{{ auth()->user()->name }}" src="{{ asset('storage/'.$reservation['picture']) }}" width="100%" class="img-thumbnail"/>
                    </div>
                </div>
                <br/>
                <button class="btn btn-primary" wire:click="finishReservation">@lang('reservation.event.button.finish')</button>
            </div>
        </div>
    @elseif($reservationStep == 5)
        <div class="row">
            <div class="col-4 offset-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">@lang('reservation.event.title.step.5')</h5>

                        <i class="fas fa-check-circle fa-10x text-success"></i>
                        <br/>
                        <br/>
                        <button class="btn btn-primary" wire:click="goHome">@lang('reservation.event.button.home')</button>
                    </div>
                </div>
            </div>
        </div>
    @elseif($reservationStep == 6)
        <div class="row">
            <div class="col-4 offset-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">@lang('reservation.event.title.step.6')</h5>
                        <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.event.message.could-not-create')</h6>

                        <i class="fas fa-exclamation-circle fa-10x text-danger"></i>
                        <br/>
                        <br/>
                        <button class="btn btn-primary" wire:click="goHome">@lang('reservation.event.button.home')</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

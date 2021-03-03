<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @lang('reservation.event.index.title.events')
    </h2>
</x-slot>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">@lang('reservation.event.index.title.select')</h5>
            <livewire:reservation.event.selector/>
        </div>
    </div>
    <br/>
    @if($event != null)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $event->name }}</h5>

                <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.event.index.title.days')</h6>
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

                <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.event.index.title.location')</h6>
                <p class="card-text">{{ $event->location }}</p>

                <h6 class="card-subtitle mb-2 text-muted">@lang('reservation.event.index.title.max-tickets')</h6>
                <p class="card-text">{{ $event->max_tickets }}</p>

                <button wire:click="stepSelect" class="btn btn-primary">@lang('reservation.event.index.button.buy')</button>
            </div>
        </div>
        <br/>

        @if ($selectStep)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('reservation.event.index.title.tickets')</h5>
                    <livewire:reservation.event.ticket :max-tickets="$event->max_tickets" :event-id="$event->id"/>
                </div>
            </div>
        @endif
    @endif
</div>

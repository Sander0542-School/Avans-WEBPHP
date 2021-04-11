<div class="row">
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('home.lists.events.section.order.title') }}</h5>
                <div class="form-group">
                    <select wire:model="order" class="form-control" id="inputOrder">
                        @foreach($sortOrders as $sortOrder)
                            <option value="{{ $sortOrder }}-asc">{{ __('home.lists.events.section.order.option.'.$sortOrder.'-asc') }}</option>
                            <option value="{{ $sortOrder }}-desc">{{ __('home.lists.events.section.order.option.'.$sortOrder.'-desc') }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <br/>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('home.lists.events.section.types.title') }}</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="showEvents" id="inputShowEvents">
                    <label class="form-check-label" for="inputShowEvents">{{ __('home.lists.events.section.types.option.events') }}</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="showMovies" id="inputShowMovies">
                    <label class="form-check-label" for="inputShowMovies">{{ __('home.lists.events.section.types.option.movies') }}</label>
                </div>
            </div>
        </div>
        <br/>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('home.lists.events.section.location.title') }}</h5>
                <div class="form-group">
                    <select wire:model="location" class="form-control" id="inputLocation">
                        <option value="">{{ __('home.lists.events.section.location.option.default') }}</option>
                        @foreach($locations as $location)
                            <option value="{{ $location['value'] }}">{{ $location['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <br/>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('home.lists.events.section.date.title') }}</h5>

                <div class="form-group">
                    <label for="inputStart">{{ __('home.lists.events.section.date.label.start') }}</label>
                    <input wire:model="dateStart" type="date" class="form-control" id="inputStart">
                </div>

                <div class="form-group">
                    <label for="input_end">{{ __('home.lists.events.section.date.label.end') }}</label>
                    <input wire:model="dateEnd" type="date" class="form-control" id="inputEnd">
                </div>
            </div>
        </div>
    </div>
    <div class="col-9">
        <div class="card">
            <div class="card-body">
                <table class="table table-borderless table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th>{{ __('home.lists.events.header.name') }}</th>
                        <th>{{ __('home.lists.events.header.location') }}</th>
                        <th>{{ __('home.lists.events.header.duration') }}</th>
                        <td/>
                    </tr>
                    </thead>
                    <tbody>

                    @if($events->count() > 0)
                        @foreach($events as $event)
                            <tr class="c-pointer" onclick="window.location.href = this.dataset.href" data-href="{{ $event['reservation_url'] }}">
                                <td><i class="fas fa-{{ $event['icon'] }}"></i></td>
                                <td>{{ $event['name'] }}</td>
                                <td>{{ $event['location'] }}</td>
                                <td>{{ $event['duration'] }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="5">{{ __('home.lists.events.messages.no-events') }}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                {{ $events->links() }}
            </div>
        </div>
    </div>
</div>


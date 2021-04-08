<div class="row">
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('home.lists.events.section.order.title')</h5>
                <div class="form-group">
                    <select wire:model="order" class="form-control" id="inputOrder">
                        @foreach($sortOrders as $sortOrder)
                            <option value="{{ $sortOrder }}-asc">@lang('home.lists.events.section.order.option.'.$sortOrder.'-asc')</option>
                            <option value="{{ $sortOrder }}-desc">@lang('home.lists.events.section.order.option.'.$sortOrder.'-desc')</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <br/>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('home.lists.events.section.types.title')</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="showEvents" id="inputShowEvents">
                    <label class="form-check-label" for="inputShowEvents">@lang('home.lists.events.section.types.option.events')</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="showMovies" id="inputShowMovies">
                    <label class="form-check-label" for="inputShowMovies">@lang('home.lists.events.section.types.option.movies')</label>
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
                        <th>@lang('home.lists.events.header.name')</th>
                        <th>@lang('home.lists.events.header.location')</th>
                        <th>@lang('home.lists.events.header.duration')</th>
                        <td/>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($events as $event)
                        <tr class="c-pointer" onclick="window.location.href = this.dataset.href" data-href="{{ $event['reservation_url'] }}">
                            <td><i class="fas fa-{{ $event['icon'] }}"></i></td>
                            <td>{{ $event['name'] }}</td>
                            <td>{{ $event['location'] }}</td>
                            <td>{{ $event['duration'] }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $events->links() }}
            </div>
        </div>
    </div>
</div>


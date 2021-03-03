<div>
    <div class="form-group">
        <label for="inputEventId">@lang('reservation.event.selector.form.event.label')</label>
        <select id="inputEventId" wire:model="eventId" class="form-control">
            <option>@lang('reservation.event.selector.form.event.default')</option>
            @foreach($events as $event)
                <option value="{{ $event->id }}">{{ $event->name }}</option>
            @endforeach
        </select>
    </div>
</div>

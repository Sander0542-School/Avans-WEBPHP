<div>
    <div class="form-group">
        <label for="inputEventId">{{ __('reservation.event.form.event.label') }}</label>
        <select id="inputEventId" disabled wire:model="eventId" class="form-control">
            <option>{{ __('reservation.event.form.event.option.default') }}</option>
            @foreach($events as $event)
                <option value="{{ $event->id }}">{{ $event->name }}</option>
            @endforeach
        </select>
    </div>
</div>

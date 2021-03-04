<div>
    <div class="form-group">
        <label for="inputEventId">@lang('reservation.event.form.event.label')</label>
        <select id="inputEventId" wire:model="eventId" class="form-control">
            <option>@lang('reservation.event.form.event.option.default')</option>
            @foreach($events as $event)
                <option value="{{ $event->id }}">{{ $event->name }}</option>
            @endforeach
        </select>
    </div>

    @if($dataValid)
        <button wire:click="confirmEvent" class="btn btn-primary">@lang('reservation.event.button.confirm-event')</button>
    @endif
</div>

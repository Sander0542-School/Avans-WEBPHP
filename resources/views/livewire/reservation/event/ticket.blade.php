<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="inputTicketCount">@lang('reservation.event.ticket.form.ticket-count.label'):</label>
            <input id="inputTicketCount" type="number" min="1" max="{{ $maxTickets }}" wire:model="ticketCount" class="form-control"/>
        </div>
        @if (sizeof($event->days) > 1)
            <div class="form-group">
                <label for="inputDayCount">@lang('reservation.event.ticket.form.day-count.label')</label>
                <select id="inputDayCount" wire:model="dayCount" class="form-control">
                    <option>@lang('reservation.event.selector.form.day-count.default')</option>
                    @if (sizeof($event->days) > 1)
                        <option value="1">@lang('reservation.event.selector.form.day-count.1')</option>
                    @endif
                    @if (sizeof($event->days) > 2)
                        <option value="2">@lang('reservation.event.selector.form.day-count.2')</option>
                    @endif
                    <option value="0">@lang('reservation.event.selector.form.day-count.all')</option>
                </select>
            </div>
            @if (!empty($dayCount) && $dayCount != '0' && !($dayCount == '2' && sizeof($event->days) == 2) && !($dayCount == '1' && sizeof($event->days) == 1))
                <div class="form-group">
                    <label for="inputStartDay">@lang('reservation.event.ticket.form.start-date.label')</label>
                    <select id="inputStartDay" wire:model="startDate" class="form-control">
                        <option>@lang('reservation.event.selector.form.start-date.default')</option>
                        @foreach($event->days as $day)
                            @if(!($dayCount == '2' && $day->format('Y-m-d') == $event->end_datetime->format('Y-m-d')))
                                <option value="{{ $day->format('Y-m-d') }}">{{ $day->format('d F') }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            @endif
        @endif

        @if($showNext)
            <button wire:click="confirmTicket" class="btn btn-primary">@lang('reservation.event.ticket.button.confirm')</button>
        @endif
    </div>
    <div class="col-6">

    </div>
</div>

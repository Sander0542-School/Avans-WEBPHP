<div class="row">
    <div class="col-6">
        <label for="inputTicketCount">{{ __('reservation.event.form.ticket-count.label') }}</label>
        <div class="input-group inline-group">
            <div class="input-group-prepend">
                <button wire:click="decreaseTicket" class="btn btn-outline-secondary" @if($ticketCount <= 1) disabled @endif>
                    <i class="fa fa-minus"></i>
                </button>
            </div>
            <input id="inputTicketCount" type="number" min="1" max="{{ $maxTickets }}" wire:model="ticketCount" class="form-control quantity @error('ticketCount') is-invalid @enderror" readonly/>
            <div class="input-group-append">
                <button wire:click="incrementTicket" class="btn btn-outline-secondary" @if($ticketCount >= $maxTickets) disabled @endif>
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <br/>
    </div>
    <div class="col-6">
        @if (sizeof($event->days) > 1)
            <div class="form-group">
                <label for="inputDayCount">{{ __('reservation.event.form.day-count.label') }}</label>
                <select id="inputDayCount" wire:model="dayCount" class="form-control @error('dayCount') is-invalid @enderror">
                    <option>{{ __('reservation.event.form.day-count.option.default') }}</option>
                    @if (sizeof($event->days) > 1)
                        <option value="1">{{ __('reservation.event.form.day-count.option.1') }}</option>
                    @endif
                    @if (sizeof($event->days) > 2)
                        <option value="2">{{ __('reservation.event.form.day-count.option.2') }}</option>
                    @endif
                    <option value="0">{{ __('reservation.event.form.day-count.option.all') }}</option>
                </select>
                @error('dayCount') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            @if (!empty($dayCount) && $dayCount != '0' && !($dayCount == '2' && sizeof($event->days) == 2) && !($dayCount == '1' && sizeof($event->days) == 1))
                <div class="form-group">
                    <label for="inputStartDay">{{ __('reservation.event.form.start-date.label') }}</label>
                    <select id="inputStartDay" wire:model="startDate" class="form-control @error('startDate') is-invalid @enderror">
                        <option>{{ __('reservation.event.form.start-date.option.default') }}</option>
                        @foreach($event->days as $day)
                            @if(!($dayCount == '2' && $day->format('Y-m-d') == $event->end_datetime->format('Y-m-d')))
                                <option value="{{ $day->format('Y-m-d') }}">{{ $day->format('d F') }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('startDate') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            @endif
        @endif
    </div>

    @if($dataValid)
        <div class="col-12">
            <button wire:click="confirmTicket" class="btn btn-primary">{{ __('reservation.event.button.upload-picture') }}</button>
        </div>
    @endif
</div>

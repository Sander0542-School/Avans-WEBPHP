<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('admin.events.title.edit') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('admin.events.update', [$event]) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="eventName">{{ __('admin.events.form.name.label') }}</label>
                    <input name="name" value="{{ old('name', $event->name) }}" type="text" class="form-control @error('name') is-invalid @enderror" id="eventName">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="eventLocation">{{ __('admin.events.form.location.label') }}</label>
                    <input name="location" value="{{ old('location', $event->location) }}" type="text" class="form-control @error('location') is-invalid @enderror" id="eventLocation">
                    @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="eventStart">{{ __('admin.events.form.start.label') }}</label>
                    <input name="start_datetime" value="{{ old('start_datetime', $event->start_datetime->format('Y-m-d\TH:i')) }}" type="datetime-local" class="form-control @error('start_datetime') is-invalid @enderror" id="eventStart">
                    @error('start_datetime')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="eventEnd">{{ __('admin.events.form.end.label') }}</label>
                    <input name="end_datetime" value="{{ old('end_datetime', $event->end_datetime->format('Y-m-d\TH:i')) }}" type="datetime-local" class="form-control @error('end_datetime') is-invalid @enderror" id="eventEnd">
                    @error('end_datetime')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="eventTickets">{{ __('admin.events.form.tickets.label') }}</label>
                    <input name="max_tickets" value="{{ old('max_tickets', $event->max_tickets) }}" type="number" class="form-control @error('max_tickets') is-invalid @enderror" id="eventTickets">
                    @error('max_tickets')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <input type="submit" class="btn btn-success" value="{{ __('admin.events.button.save') }}">
            </form>
        </div>
    </div>
</x-app-layout>

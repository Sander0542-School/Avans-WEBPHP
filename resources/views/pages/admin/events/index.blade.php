<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('admin.events.title.index') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <div>
                <a id="createEvent" class="btn btn-primary" href="{{ route('admin.events.create') }}">{{ __('admin.events.button.create') }}</a>
                <br/><br/>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>{{ __('admin.events.information.id') }}</th>
                    <th>{{ __('admin.events.information.name') }}</th>
                    <th>{{ __('admin.events.information.location') }}</th>
                    <th>{{ __('admin.events.information.duration') }}</th>
                    <th>{{ __('admin.events.information.reservations') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->location }}</td>
                        <td>{{ $event->start_datetime->format('d-m-Y H:i') }} - {{ $event->end_datetime->format('d-m-Y H:i') }}</td>
                        <td>{{ $event->reservations->count() }}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{ route('admin.events.edit', ['event' => $event]) }}"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>

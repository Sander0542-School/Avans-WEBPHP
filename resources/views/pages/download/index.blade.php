<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('downloads.title.index') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-5">
            <h2>{{ __('downloads.subtitle.export-events') }}</h2>
            <div class="card">
                <div class="card-body">
                    <p>{{ __('downloads.events.message.info') }}</p>
                    <a href="{{ route('downloads.events', ['type' => 'json']) }}" class="btn btn-primary">{{ __('downloads.events.button.json') }}</a>
                    <a href="{{ route('downloads.events', ['type' => 'csv']) }}" class="btn btn-primary">{{ __('downloads.events.button.cvs') }}</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

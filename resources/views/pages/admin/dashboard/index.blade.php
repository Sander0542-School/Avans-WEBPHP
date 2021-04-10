<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('admin.dashboard.title.index') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ __('admin.dashboard.section.events.title') }}</h5>

                    <a class="btn btn-primary" href="{{ route('admin.events.index') }}">{{ __('admin.dashboard.section.events.button') }}</a>
                </div>
            </div>
            <br/>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ __('admin.dashboard.section.restaurants.title') }}</h5>

                    <a class="btn btn-primary" href="{{ route('admin.restaurants.index') }}">{{ __('admin.dashboard.section.restaurants.button') }}</a>
                </div>
            </div>
            <br/>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ __('admin.dashboard.section.cinemas.title') }}</h5>

                    <a class="btn btn-primary" href="{{ route('admin.cinemas.index') }}">{{ __('admin.dashboard.section.cinemas.button') }}</a>
                </div>
            </div>
            <br/>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ __('admin.dashboard.section.downloads.title') }}</h5>

                    <a class="btn btn-primary" href="{{ route('admin.downloads.index') }}">{{ __('admin.dashboard.section.downloads.button') }}</a>
                </div>
            </div>
            <br/>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ __('admin.dashboard.section.restaurants-crowding.title') }}</h5>

                    <a class="btn btn-primary" href="{{ route('admin.restaurants.crowding.index') }}">{{ __('admin.dashboard.section.restaurants-crowding.button') }}</a>
                </div>
            </div>
            <br/>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('admin.restaurants.title.index') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <div>
                <a class="btn btn-primary" href="{{ route('admin.restaurants.create') }}">{{ __('admin.restaurants.button.create') }}</a>
                <br/><br/>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>{{ __('admin.restaurants.information.id') }}</th>
                    <th>{{ __('admin.restaurants.information.name') }}</th>
                    <th>{{ __('admin.restaurants.information.location') }}</th>
                    <th>{{ __('admin.restaurants.information.kitchen') }}</th>
                    <th>{{ __('admin.restaurants.information.opening-hours') }}</th>
                    <th>{{ __('admin.restaurants.information.seats') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($restaurants as $restaurant)
                    <tr>
                        <td>{{ $restaurant->id }}</td>
                        <td>{{ $restaurant->name }}</td>
                        <td>{{ $restaurant->location }}</td>
                        <td>{{ $restaurant->kitchen->name }}</td>
                        <td>{{ $restaurant->opens_at->format('H:i') }} - {{ $restaurant->closes_at->format('H:i') }}</td>
                        <td>{{ $restaurant->max_seats }}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant]) }}"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>

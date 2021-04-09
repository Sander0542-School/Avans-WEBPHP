<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('admin.restaurants.crowding.title.index') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>{{ __('admin.restaurants.crowding.information.name') }}</th>
                    <th>{{ __('admin.restaurants.crowding.information.seats') }}</th>
                    <th>{{ __('admin.restaurants.crowding.information.reservations') }}</th>
                    <th>{{ __('admin.restaurants.crowding.information.state') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($restaurants as $restaurant)
                    <tr>
                        <td>{{ $restaurant->name }}</td>
                        <td>{{ $restaurant->seats }}</td>
                        <td>{{ $restaurant->reservations }}</td>
                        <td>{{ __('admin.restaurants.crowding.state.'.$restaurant->state) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>

<div>
    <h2>{{ $kitchen->name }}</h2>

    <div class="row">
        @foreach($kitchen->restaurants as $restaurant)
            <div class="col-xs-12 col-sm-6 col-md-4 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $restaurant->name }}</h5>

                        <h6 class="card-subtitle mb-2 text-muted">{{ __('home.restaurants.information.location') }}</h6>
                        <p class="card-text">{{ $restaurant->location }}</p>

                        <h6 class="card-subtitle mb-2 text-muted">{{ __('home.restaurants.information.opening-hours') }}</h6>
                        <p class="card-text">{{ $restaurant->opens_at->format('H:i') }} - {{ $restaurant->closes_at->format('H:i') }}</p>

                        <h6 class="card-subtitle mb-2 text-muted">{{ __('home.restaurants.information.seats') }}</h6>
                        <p class="card-text">{{ $restaurant->max_seats }}</p>

                        <a href="{{ route('reservation.restaurant', ['restaurantId' => $restaurant->id]) }}" class="btn btn-primary">{{ __('home.restaurants.button.make-reservation') }}</a>
                    </div>
                </div>
                <br/>
            </div>
        @endforeach
    </div>
</div>

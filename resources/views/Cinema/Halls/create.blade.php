<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Zalen
        </h2>
    </x-slot>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <h2>Bioscoop zaal toevoegen</h2>
            <div class="card">
                <div class="card-body">
                    <form  method="post" action="{{ route('cinemas.halls.store', $cinemaId) }}" accept-charset="UTF-8">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <input name="cinema" type="hidden" value="{{ $cinemaId}}"/>
                        <div class="form-group">
                            <label for="InputCinemaHallRows">Aantal rijen:</label>
                            <input type="number" name="chair_rows" class="form-control" id="InputCinemaHallRows" placeholder="Aantal rijen">
                        </div>
                        <div class="form-group">
                            <label for="InputCinemaHallRowSeats">Aantal stoelen per rij:</label>
                            <input type="number" name="chair_row_seats" class="form-control" id="InputCinemaHallRowSeats" placeholder="Aantal stoelen">
                        </div>

                        <button type="submit" class="btn btn-primary">Opslaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

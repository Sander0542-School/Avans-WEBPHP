<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Confirm reservation
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <h2>Reservering succesvol voor de film: {{$reservation->show->movie->title}} </h2>
            <div class="card">
                <div class="card-body">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Bioscoop: </b> {{$reservation->show->cinema->name}}</li>
                        <li class="list-group-item"><b>Locatie: </b> {{$reservation->show->cinema->location}}</li>
                        <li class="list-group-item">
                            <b>Tijd: </b> {{Carbon\Carbon::parse($reservation->show->start_datetime)->format('H:i')}} - {{Carbon\Carbon::parse($reservation->show->end_datetime)->format('H:i')}}
                        </li>
                        <li class="list-group-item"><b>Zaal: </b> {{$reservation->show->hall->id}}</li>

                        <li class="list-group-item"><b>Stoelen: </b><br>
                            <ul>
                                @foreach($reservation->seats as $seat)
                                    <li>Rij: {{$seat->row_id}} - Stoel:{{$seat->seat_id}}</li>
                                @endforeach

                            </ul>


                        </li>
                    </ul>


                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<div>
    <div class="card">
        <div class="card-body">
            <h2>Film: {{$show->movie->title}}, hal: {{$show->cinema_hall_id}}</h2>
            <h2>Datum: {{ \Carbon\Carbon::parse($show->start_datetime)->format('d/m/Y')}}</h2>
            <h2>Tijd: {{Carbon\Carbon::parse($show->start_datetime)->format('H:i')}} - {{Carbon\Carbon::parse($show->end_datetime)->format('H:i')}}</h2>

            @if($selectedChairs != [])
            <h2>Stoelen: <br><h5>@foreach($selectedChairs as $chair) Rij: {{$chair['row_id']}}, stoel: {{$chair['seat_id']}}<h5> <br>@endforeach</h2>
            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Selecteer uw stoelen</h5>
            <table class="table-sm table-borderless">

                <tbody>
                @foreach($rows as $row => $chairs)
                    <tr>
                    @foreach($chairs as $chair => $val)

                        @if($val['state'] == "reserved")
                            <td > <button  disabled type="button" class="btn btn-danger disabled "><i class="fas fa-chair"></i></button></td>
                        @elseif($val['state'] == "blocked")
                            <td > <button  disabled type="button" class="btn   btn-secondary disabled "><i class="fas fa-chair"></i></button></td>
                            @elseif($val['state'] == "picked")
                                <td > <button  disabled type="button" class="btn   btn-success disabled "><i class="fas fa-chair"></i></button></td>
                        @else
                            <td > <button  wire:click="selectChair({{$row}}, {{$chair}})" type="button" class="btn btn-primary"><i class="fas fa-chair"></i></button></td>
                        @endif
                    @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="form-group">
                <button class="btn-primary btn"  wire:click="$emitUp('decrementStep')">terug</button>
                @if($selectedChairs != [])
                <button class="btn-primary btn" wire:click="confirmReservation()">Stoelen kiezen</button>
                @endif
            </div>
        </div>
    </div>
</div>

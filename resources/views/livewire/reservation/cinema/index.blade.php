<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @lang('reservation.event.index.title.events')
    </h2>
</x-slot>


<div class="container">

    @if($step == 1)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">@lang('reservation.event.index.title.select')</h5>
            <livewire:cinema.select-cinema :cinemaId="$cinemaId" />

            @if(count($movies) > 0)
                <livewire:cinema.select-movie :movies="$movies" :movieId="$movieId" />
                @if($selectPeople)
                    <div class="form-group">
                        <label>Aantal personen:</label>
                        <input wire:model="persons" type="number" class="form-control" min="10" max="100">
                    </div>
                @endif
            @endif

            @if($persons >= 1)
                <div class="form-group">
                    <button class="btn-primary btn" wire:click="incrementStep">Stoelen kiezen</button>
                </div>
            @endif
        </div>
    </div>
    @elseif($step == 2)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">@lang('reservation.event.index.title.select')</h5>
            <table class="table table-bordered">

                <tbody>
                @for ($row = 0; $row < $show->hall->chair_row_seats; $row++)
                    <tr>
                        @for ($seat = 0; $seat < $show->hall->chair_rows; $seat++)
                        <td >{{$row}} {{$seat}}</td>
                        <td>{{$row}} {{$seat}}</td>
                        <td>{{$row}} {{$seat}}</td>
                        <td>{{$row}} {{$seat}}</td>
                        @endfor
                    </tr>
                @endfor
                </tbody>
            </table>
            <div class="form-group">
                <button class="btn-primary btn" wire:click="decrementStep">terug</button>
                <button class="btn-primary btn" wire:click="">Stoelen kiezen</button>

            </div>

        </div>
    </div>
    @endif
</div>


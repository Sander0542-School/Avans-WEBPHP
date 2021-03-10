<div class="card">
    <div class="card-body">
        <h5 class="card-title">@lang('reservation.event.index.title.select')</h5>
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


{{--            @for ($seat = 1; $seat <= $show->hall->chair_rows; $seat++)--}}
{{--                <tr>--}}
{{--                    @for ($row = 1; $row <= $show->hall->chair_row_seats; $row++)--}}
{{--                        <td > <button  wire:click="decrementStep" type="button" class="btn btn-primary">{{$row}} {{$seat}}<i class="fas fa-chair"></i></button></td>--}}
{{--                    @endfor--}}
{{--                </tr>--}}
{{--            @endfor--}}
            </tbody>
        </table>
        <div class="form-group">
            <button class="btn-primary btn"  wire:click="$emitUp('decrementStep')">terug</button>
            <button class="btn-primary btn" wire:click="">Stoelen kiezen</button>
            <button class="btn-primary btn" wire:click="$emitUp('refresh')">refresh</button>

        </div>

    </div>
</div>
<script>


</script>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">@lang('reservation.event.index.title.select')</h5>
        <table class="table-sm table-borderless">

            <tbody>
            @for ($seat = 0; $seat < $show->hall->chair_rows; $seat++)
                <tr>
                    @for ($row = 0; $row < $show->hall->chair_row_seats; $row++)
                        <td > <button {{$row}} {{$seat}} wire:click="decrementStep" type="button" class="btn btn-primary"><i class="fas fa-chair"></i></button></td>
                    @endfor
                </tr>
            @endfor
            </tbody>
        </table>
        <div class="form-group">
            <button class="btn-primary btn"  wire:click="$emitUp('decrementStep')">terug</button>
            <button class="btn-primary btn" wire:click="">Stoelen kiezen</button>
            <button class="btn-primary btn" wire:click="$emitUp('refresh')">refresh</button>

        </div>

    </div>
</div>

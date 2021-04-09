<div>
    <div class="form-group">
        <label for="inputEventId">Film:</label>
        <select style="min-width: 252px" name="movie" wire:model="showId" class="form-control">
            <option value="">Kies een film</option>
            @foreach($shows as $show)
                <option value="{{ $show->id }}">{{ $show->movie->title }} - {{ $show->start_datetime->format('M d Y H:i')}} - {{ $show->end_datetime->format('H:i')}} </option>
            @endforeach
        </select>
    </div>
</div>

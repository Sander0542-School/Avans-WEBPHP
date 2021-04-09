<div>
    <div class="form-group">
        <label for="inputEventId">Film:</label>
    <select style="min-width: 252px" name="movie" wire:model="movieId"
            class="form-control">
        <option  value=''>Kies een film</option>
        @foreach($movies as $movieSelect)
            <option value="{{ $movieSelect->id }}">{{ $movieSelect->movie->title }}    {{ Carbon\Carbon::parse($movieSelect->movie->start_datetime)->format('M d Y H:i')}} - {{ Carbon\Carbon::parse($movieSelect->movie->end_datetime)->format('H:i')}} </option>
        @endforeach
        </select>
    </div>
</div>


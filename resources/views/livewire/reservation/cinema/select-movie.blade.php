<div>
    <div class="form-group">
        <label for="inputEventId">Film:</label>
    <select style="min-width: 252px" name="movie" wire:model="movie"
            class="form-control">
        <option  value=''>Kies een film</option>
        @foreach($movies as $movieSelect)
            <option value="{{ $movieSelect->id }}">{{ $movieSelect->movie->title }}</option>
        @endforeach
        </select>
    </div>
</div>


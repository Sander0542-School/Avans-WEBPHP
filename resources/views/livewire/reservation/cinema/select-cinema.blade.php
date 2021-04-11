<div>
    <div class="form-group">
        <label for="inputCinemaId">Bioscoop:</label>

        <select id="inputCinemaId" disabled style="min-width: 252px" wire:model="cinemaId" class="form-control">
            <option value=''>Kies een bioscoop</option>
            @foreach($cinemas as $cinema)
                <option value="{{ $cinema->id }}">{{ $cinema->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div>
    <div class="form-group">
        <label for="inputEventId">Bioscoop:</label>

        <select style="min-width: 252px" name="country" wire:model="cinemaId" class="form-control">
            <option value=''>Kies een bioscoop</option>
            @foreach($cinemas as $cinema)
                <option @if($cinemaId == $cinema->id) selected @endif value="{{ $cinema->id }}">{{ $cinema->name }}</option>
            @endforeach
        </select>
    </div>
</div>

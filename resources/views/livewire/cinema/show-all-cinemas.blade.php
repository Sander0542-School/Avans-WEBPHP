<div>
    <div class="mb-8">
        <label class="inline-block w-32 font-bold">Bioscoop:</label>
        <select name="country" wire:model="cinema" class="border shadow p-2 bg-white">
            <option value=''>Kies een bioscoop</option>
            @foreach($cinemas as $cinema)
                <option value={{ $cinema->id }}>{{ $cinema->name }}</option>
            @endforeach
        </select>
    </div>
    @if(count($movies) > 0)
        <div class="mb-8">
            <label class="inline-block w-32 font-bold">City:</label>
            <select name="movie" wire:model="movie"
                    class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                <option value=''>Kies een film</option>
                @foreach($movies as $movie)
                    <option value={{ $movie->id }}>{{ $movie->title }}, {{$movie->start_datetime}} - {{$movie->end_datetime}}</option>
                @endforeach
            </select>
        </div>
    @endif
</div>

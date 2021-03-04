<div class="mb-8">
    <label class="inline-block w-32 font-bold">Film:</label>
    <select style="min-width: 252px" name="movie" wire:model="movie"
            class=" p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline ">
        <option  value=''>Kies een film</option>
        @foreach($movies as $movieSelect)
            <option value="{{ $movieSelect->id }}">{{ $movieSelect->movie->title }}</option>
        @endforeach
    </select>
</div>




<div class="h-screen w-full flex flex-col -mt-36 justify-center items-center">
    <div class='max-w-lg bg-white shadow-md rounded-lg overflow-hidden mx-auto'>
        <div class="py-4 px-8 mt-3">
            <div class="flex flex-col mb-8">
                <h2 class="text-gray-700 font-semibold text-2xl tracking-wide mb-2">Welke film wordt het vandaag?</h2>
            </div>
            <div>
                <div class="mb-8">
                    <label class="inline-block w-32 font-bold">Bioscoop:</label>
                    <select style="min-width: 252px" name="country" wire:model="cinemaId" class=" p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline ">
                        <option  value=''>Kies een bioscoop</option>
                        @foreach($cinemas as $cinema)
                            <option value="{{ $cinema->id }}">{{ $cinema->name }}</option>
                        @endforeach
                    </select>
                </div>
                @if(count($movies) > 0)
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
                    @if($movie)
                        <div class="mb-8">
                            <label class="inline-block w-32 font-bold">Aantal personen:</label>

                            <input wire:model="persons" type="number" class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline" min="10" max="100">

                        </div>
                    @endif


                @endif
            </div>
            @if($persons >= 1)
                <div class="py-4">
                    <a href="#" class="block tracking-widest uppercase text-center shadow bg-indigo-600 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">Stoelen kiezen</a>
                </div>
            @endif

        </div>
    </div>
</div>

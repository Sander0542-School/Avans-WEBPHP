<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @lang('reservation.event.index.title.events')
    </h2>
</x-slot>


<div class="container">
    <div class="card">
        <div class="card-body">

            <h5 class="card-title">@lang('reservation.event.index.title.select')</h5>

            <livewire:cinema.select-cinema/>


            @if(count($movies) > 0)

                <livewire:cinema.select-movie :movies="$movies"/>

                @if($selectPeople)
                    <div class="form-group">
                        <label>Aantal personen:</label>

                        <input wire:model="persons" type="number" class="form-control" min="10" max="100">

                    </div>
                @endif


            @endif

            @if($persons >= 1)
                <div class="form-group">
                    <a href="#" class="btn btn-primary ">Stoelen kiezen</a>
                </div>
            @endif
        </div>
    </div>
</div>


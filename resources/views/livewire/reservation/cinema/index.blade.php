<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Film reserveren
    </h2>
</x-slot>

<div class="container-fluid">

    @if($step == 1)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Film reserveren</h5>
                <livewire:reservation.cinema.select-cinema :cinemaId="$cinemaId"/>

                @if($cinemaId != null)
                    <livewire:reservation.cinema.select-show :cinemaId="$cinemaId" :showId="$showId"/>
                    @if($selectPeople)
                        <div class="form-group">
                            <label>Aantal personen (tussen 1 en de 6):</label>
                            <input wire:model="persons" name="persons" type="number" class="form-control" min="1" max="6">
                            @error('persons') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        @if($persons >= 1)
                            <div class="form-group">
                                <button class="btn-primary btn" wire:click="incrementStep">Stoelen kiezen</button>
                            </div>
                        @endif
                    @endif
                @endif

            </div>
        </div>

    @elseif($step == 2)
        <livewire:reservation.cinema.select-chair :show="$show" :persons="$persons"/>
    @endif

</div>


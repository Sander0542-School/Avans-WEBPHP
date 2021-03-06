<x-slot name="header">
    <h2 class="h4 font-weight-bold">
        @lang('home.title.restaurants')
    </h2>
</x-slot>

<div>
    @foreach($kitchens as $kitchen)
        <livewire:home.restaurants.kitchen :kitchen-id="$kitchen->id"/>
        <br/>
    @endforeach
</div>

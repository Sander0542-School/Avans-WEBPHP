<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Zalen
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <h2>Bioscopen</h2>
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary py-3" role="button" href="{{ route('admin.cinemas.halls.create', $cinema->id) }}">Zaal toevoegen</a>
                    <table class="table table-bordered mb-5">
                        <thead>
                        <tr class="table-success">
                            <th scope="col">#</th>
                            <th scope="col">Bioscoop</th>
                            <th scope="col">Aantal rijen</th>
                            <th scope="col">Aantal stoelen per rij</th>
                            <th scope="col">acties</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($halls as $hall)
                            <tr>
                                <th scope="row">{{ $hall->id }}</th>
                                <td>{{ $cinema->name }}</td>
                                <td>{{ $hall->chair_rows }}</td>
                                <td>{{ $hall->chair_row_seats }}</td>
                                <td><a class="btn btn-primary" role="button" href="{{ route('admin.halls.shows.index', $hall->id) }}">Shows bekijken</a>
                                    <form action="{{ route('admin.halls.destroy', $hall->id) }}" method="POST">
                                        @method('DELETE')

                                        @csrf
                                        <button class="btn btn-danger delete">Verwijder bioscoop</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {!! $halls->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

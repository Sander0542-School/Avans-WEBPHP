<?php

namespace App\Http\Controllers;

use App\Http\Requests\HallStoreRequest;
use App\Models\Cinema;
use App\Models\CinemaHall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cinemaId)
    {
        $cinema = Cinema::findOrFail($cinemaId);
        $halls = $cinema->halls()->paginate(5);
        return view('Cinema.Halls.index', compact('cinema', 'halls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cinemaId)
    {
        return view('Cinema.Halls.create', compact('cinemaId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HallStoreRequest $request)
    {
        $hall = new CinemaHall(
            [
                'chair_rows' => $request->input('chair_rows'),
                'chair_row_seats' => $request->input('chair_row_seats')
            ]);

        $cinema = Cinema::findOrFail($request->input('cinema'));
        $cinema->halls()->save($hall);

        return redirect()->route('cinemas.halls.index', $cinema->id)->with('message', 'success:Zaal succesvol toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hall = CinemaHall::findOrFail($id);

        return view('Cinema.Halls.edit', compact('hall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hall = CinemaHall::findOrFail($id);
        $hall->delete();
        return redirect()->route('cinemas.halls.index', $hall->cinema_id);
    }
}

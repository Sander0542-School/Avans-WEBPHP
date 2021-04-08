<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\CinemaShow;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($hallId)
    {
        //$shows = CinemaShow::with('movie')->with('cinema')->with('hall')->where('cinema_hall_id',$hallId)->get();

        $hall = CinemaHall::where('id', $hallId)->with('shows.movie')->with('cinema')->first();
//dd($hall);
        return view('Cinema.Shows.index', compact( 'hall'));
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cinema' => 'required|exists:cinemas,id',
            'chair_rows' => 'required|integer|max:50',
            'chair_row_seats' => 'required|integer|max:50'
        ]);



        $hall = new CinemaHall(
            [
                'chair_rows' => $request->input('chair_rows'),
                'chair_row_seats' => $request->input('chair_row_seats')
            ]);

        $cinema = Cinema::findOrFail($request->input('cinema'));
        $cinema->halls()->save($hall);


        return redirect()->route('cinemas.halls.index', $cinema->id);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

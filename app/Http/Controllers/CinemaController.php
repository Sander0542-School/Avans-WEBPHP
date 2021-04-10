<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\CinemaReservation;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cinemas = Cinema::paginate(5);
        return view('Cinema.list', compact('cinemas'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $reservation = CinemaReservation::findOrFail($id);
        return view('Cinema.confirm', compact('reservation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cinema.create');
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
            'name' => 'required|unique:cinemas|max:255',
            'location' => 'required',
        ]);

        $cinema = new Cinema($request->only('name', 'location'));
        $cinema->save();

        return redirect()->route('cinemas.index')->with('message', 'success:Bioscoop succesvol toegevoegd');
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
        $cinema = Cinema::findOrFail($id);
        return view('Cinema.edit', compact('cinema'));
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
        $validated = $request->validate([
            'name' => 'required|unique:cinemas,name,'.$id,
            'location' => 'required',
        ]);

        $cinema = Cinema::findOrFail($id);
        $cinema->name = $request->input('name');
        $cinema->location = $request->input('location');
        $cinema->save();

        return redirect()->route('cinemas.index')->with('message', 'success:Bioscoop succesvol aangepast');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cinema = Cinema::findOrFail($id);
        $cinema->delete();
        return redirect()->route('cinemas.index');
    }
}

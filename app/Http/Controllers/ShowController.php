<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShowRequest;
use App\Models\CinemaHall;
use App\Models\CinemaMovie;
use App\Models\CinemaShow;
use Carbon\Carbon;
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
        $hall = CinemaHall::where('id', $hallId)->with('shows.movie')->with('cinema')->first();

        return view('Cinema.Shows.index', compact( 'hall'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($hallId)
    {
        $movies = CinemaMovie::all();
        $hall = CinemaHall::findOrFail($hallId);
        return view('Cinema.Shows.create', compact('hall', 'movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShowRequest $request)
    {
        $hall = CinemaHall::findOrFail($request->input('cinema_hall_id'));

        $show = new CinemaShow(
            [
                'movie_id' => $request->input('movie_id'),
                'start_datetime' => $request->input('start_datetime'),
                'end_datetime' => $request->input('end_datetime'),
            ]);

        $hall->shows()->save($show);


        return redirect()->route('halls.shows.index', $hall->id);
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
        $show = CinemaShow::findOrFail($id);
        $movies = CinemaMovie::all();

        return view('Cinema.Shows.edit', compact('show', 'movies'));

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
            'cinema_hall_id' => ['required','exists:cinema_halls,id', function($attribute, $value, $fail) use ($id, $request){
                $start = Carbon::parse($request->input('start_datetime'));
                $countShow = CinemaShow::where('cinema_hall_id', $value)->where('id', '!=' , $id)->whereDate('start_datetime', $start->format('Y.m.d'))->count();

                if($countShow >= 3)
                {
                    $fail('Op deze dag draaien er al 3 films in deze zaal.');
                }
            }],
            'movie_id' => 'required|exists:cinema_movies,id',
            'start_datetime' => 'required|date|before:end_datetime',
            'end_datetime' => 'required|date|after:start_date'
        ]);

        $show = CinemaShow::findOrFail($id);

        $show->movie_id= $request->input('movie_id');
        $show->start_datetime = $request->input('start_datetime');
        $show->end_datetime = $request->input('end_datetime');
        $show->save();


        return redirect()->route('halls.shows.index', $show->cinema_hall_id);
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

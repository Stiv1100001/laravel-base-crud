<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;
use DateTime;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $comics = Comic::all();

        return view('comic.index', ["comics" => $comics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('comic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newComic = new Comic();
        $newComic->title = $data["title"];
        $newComic->description = $data[ "description"];
        $newComic->thumb = $data["thumb"];
        $newComic->price = floatval($data[ "price"]);
        $newComic->series = $data["series"];
        $newComic->sale_date = DateTime::createFromFormat("Y-m-d", $data["series"]);
        $newComic->type = $data["type"];

        $newComic->save();

        return redirect()->route('comic.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comic  $comic
     *
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        return view('comic.show', ["comic" => $comic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        //
    }
}

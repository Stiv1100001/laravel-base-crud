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

        $request->validate([
            "title" => "required|max:250",
            "thumb" => "required|max:250|url",
            "price" => "required|numeric",
            "series" => "required|max:250",
            "type" => "required|max:250",
            "sale_date" => "required|date",
        ], [
            "required" => "Il campo :attribute è obbligatorio'.",
            "max" => "Il campo :attribute deve essere lungo al massimo 250 caratteri",
            "price.numeric" => "IL prezzo deve essere un numero",
            "thumb.url" => "Thumb deve essere un url",
            "sale_date.date" => ""
        ]);

        $newComic = new Comic();
        $newComic->title = $data["title"];
        $newComic->description = $data[ "description"];
        $newComic->thumb = $data["thumb"];
        $newComic->price = floatval($data["price"]);
        $newComic->series = $data["series"];
        $newComic->sale_date = DateTime::createFromFormat("Y-m-d", $data["sale_date"]);
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
    public function show(Comic $comic)
    {
        return view('comic.show', ["comic" => $comic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comic  $comic
    //  * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comic.edit', ["comic" => $comic]);
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
        $data = $request->all();

        $comic->title = $data["title"];
        $comic->description = $data[ "description"];
        $comic->thumb = $data["thumb"];
        $comic->price = floatval($data["price"]);
        $comic->series = $data["series"];
        $comic->sale_date = DateTime::createFromFormat("Y-m-d", $data["sale_date"]);
        $comic->type = $data["type"];

        $comic->save();

        return redirect()->route('comic.show', ['comic' => $comic]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comic.index');
    }
}

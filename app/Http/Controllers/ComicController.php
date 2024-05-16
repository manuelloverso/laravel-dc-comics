<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::orderByDesc('id')->paginate(8);
        return view('comics.home', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        //Comic::create($request->all());

        $val_data = $request->validate([
            'title' => 'required|min:2|max:100',
            'description' => 'nullable|max:1000',
            'thumb' => 'nullable|max:255',
            'price' => 'nullable|max:15',
            'series' => 'nullable|max:100',
            'sale_date' => 'nullable|date',
            'type' => 'nullable|max:50',
        ]);

        Comic::create($val_data);

        //redirect

        return to_route('comics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        //dd($request->all());
        $val_data = $request->validate([
            'title' => 'required|min:2|max:100',
            'description' => 'nullable|max:1000',
            'thumb' => 'nullable|max:255',
            'price' => 'nullable|max:15',
            'series' => 'nullable|max:100',
            'sale_date' => 'nullable|date',
            'type' => 'nullable|max:50',
        ]);
        $comic->update($val_data);
        return to_route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return to_route('comics.index');
    }
}

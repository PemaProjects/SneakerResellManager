<?php

namespace App\Http\Controllers;

use App\Models\Sneaker;
use Illuminate\Http\Request;

class SneakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sneaker $sneaker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sneaker $sneaker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sneaker $sneaker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sneaker $sneaker)
    {
        //
    }

    public function getSneakersByName(Request $request){
        $sneakers = Sneaker::where('name', 'like', '%' . $request->name . '%')->paginate(10);
        return $sneakers;
    }
}

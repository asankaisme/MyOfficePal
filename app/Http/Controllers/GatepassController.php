<?php

namespace App\Http\Controllers;

use App\Models\Gatepass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GatepassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //load a list of gatepasses
        $gatepasses = Gatepass::all();
        return view('gatepasses.index', compact('gatepasses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //load basic create view
        return view('gatepasses.create');
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
    public function show(Gatepass $gatepass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gatepass $gatepass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gatepass $gatepass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gatepass $gatepass)
    {
        //
    }
}

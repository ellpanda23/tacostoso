<?php

namespace App\Http\Controllers;

use App\Models\Command;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('commands.index');
    }

    public function summary(Command $command)
    {
        return view('commands.summary', compact('command'));
    }


    function checkout(Command $command)
    {
        return view('commands.checkout', compact('command'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('commands.create');
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
    public function show(Command $command)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

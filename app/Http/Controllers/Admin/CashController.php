<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cashes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cashes.create');
    }

    public function summary()
    {
        $cash = Cash::latest()->first();
        return view('admin.cashes.summary', compact('cash'));
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
    public function show(Cash $cash)
    {
        return view('admin.cashes.show', compact('cash'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cash $cash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cash $cash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cash $cash)
    {
        //
    }
}

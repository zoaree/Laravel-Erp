<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function eisenhower()
    {
        $user = Auth::user();
        return view('pagination.eisenhower.eisenhower', compact('user'));
    }

    /**
     * Store the newly created resource in storage.
     */
    public function suIzleme()
    {

    }

    /**
     * Display the resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}

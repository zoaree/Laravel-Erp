<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Routing\Controller;

class UserProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pagination.user.profile');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit() {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();


        $request->validate([
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('user_image')) {

                $currentImage = 'public/' . $user->user_image;
                if ($user->user_image && Storage::exists($currentImage)) {
                    Storage::delete($currentImage);
                }


                $file = $request->file('user_image');
                $extension = $file->getClientOriginalExtension();
                $uniqueId = time();
                $filename = $user->name . '_' . $uniqueId . '.' . $extension;
                $destinationPath = 'public/images/users';


                $file->storeAs($destinationPath, $filename);


                $user->user_image = 'images/users/' . $filename;
            }


            $user->save();


            return redirect()->back()->with('success', 'Profil resminiz başarıyla güncellendi.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

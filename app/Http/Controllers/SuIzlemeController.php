<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\water;
use App\Models\waterCompany;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuIzlemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $results = Water::with('company')
            ->select('company_id', 'extent')
            ->orderBy('created_at', 'desc')
            ->get();

        $data = [];
        $index = 1;

        foreach ($results as $result) {
            $data[] = [
                sprintf('%02d', $index),
                $result->company ? $result->company->companyName : 'Bilinmiyor',
                $result->extent,
            ];
            $index++;
        }

        return view('pagination.suIzleme.suIzleme', compact('user', 'data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
{

        $userId = Auth::id();

        $validatedData = $request->validate([
            'image_upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_id' => 'required|exists:water_companies,id',
            'extent' => 'nullable|string',
            'alinis_sekli' => 'nullable',
            'tip' => 'nullable|string',
            'ph' => 'nullable|numeric|between:-999.99,999.99',
            'head' => 'nullable|numeric|between:-999.99,999.99',
            'eh' => 'nullable|numeric|between:-999.99,999.99',
            'ec' => 'nullable|numeric|between:-999.99,999.99',
            'tds' => 'nullable|numeric|between:-999.99,999.99',
            'salt' => 'nullable|numeric|between:-999.99,999.99',
            'resistance' => 'nullable|numeric|between:-999.99,999.99',
            'oxygen' => 'nullable|numeric|between:-999.99,999.99',
            'oxygenS' => 'nullable|numeric|between:-999.99,999.99',
            'flow' => 'nullable|numeric|between:-999.99,999.99',
            'water' => 'nullable|numeric|between:-999.99,999.99',
            'fountain' => 'nullable|numeric|between:-999.99,999.99',
            'notes' => 'nullable|string',
            'image_path' => 'nullable|string',
        ]);

        if ($request->hasFile('image_upload')) {
            $file = $request->file('image_upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('/su_izleme');
            $file->move($destinationPath, $filename);
            $request->merge(['image_path' => 'su_izleme/' . $filename]);
        }

        $veri = $request->except('image_upload');
        $veri['user_id'] = $userId;

        $water = new Water($veri);
        $water->save();

        return redirect()->back()->with('success', 'Kaydınız başarıyla oluşturuldu.');

}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $company = waterCompany::all();
        return view('pagination.suIzleme.suIzlemeCreate', compact('company','user'));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('pagination.suIzleme.suIzlemeShow');
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

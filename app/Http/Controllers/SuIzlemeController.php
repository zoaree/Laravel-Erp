<?php

namespace App\Http\Controllers;

use App\Models\water;
use App\Models\waterCompany;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SuIzlemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $results = Water::with('company')
            ->select('company_id', 'extent', 'specimen', 'created_at', 'id')
            ->orderBy('created_at', 'desc')
            ->get();

        $company = waterCompany::orderBy('id', 'desc')->get();

        $data = [];

        foreach ($results as $result) {
            $formattedDate = Carbon::parse($result->created_at)
                ->setTimezone('Europe/Istanbul')
                ->translatedFormat('d F Y H:i');

            $data[] = [
                $result->specimen,
                $result->company ? $result->company->companyName : 'Bilinmiyor',
                $result->extent,
                $formattedDate,
                $result->id,
            ];
        }

        return view('pagination.suIzleme.suIzleme', compact('user', 'data', 'company'));
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
            'ph' => 'nullable|numeric|between:-9999.99,9999.99',
            'head' => 'nullable|numeric|between:-9999.99,9999.99',
            'eh' => 'nullable|numeric|between:-9999.99,9999.99',
            'ec' => 'nullable|numeric|between:-9999.99,9999.99',
            'tds' => 'nullable|numeric|between:-9999.99,9999.99',
            'salt' => 'nullable|numeric|between:-9999.99,9999.99',
            'resistance' => 'nullable|numeric|between:-9999.99,9999.99',
            'oxygen' => 'nullable|numeric|between:-9999.99,9999.99',
            'oxygenS' => 'nullable|numeric|between:-9999.99,9999.99',
            'flow' => 'nullable|numeric|between:-9999.99,9999.99',
            'water' => 'nullable|numeric|between:-9999.99,9999.99',
            'fountain' => 'nullable|numeric|between:-9999.99,9999.99',
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
        $veri['coord_x'] = round($request->input('coord_x'), 2);
        $veri['coord_y'] = round($request->input('coord_y'), 2);


        $veri = $request->except('image_upload');
        $veri['user_id'] = $userId;

        $water = new Water($veri);
        $water->save();

        return redirect()->route('pagination.suIzleme.show', ['id' => $water->id])
            ->with('success', 'Kaydınız başarıyla oluşturuldu.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $company = waterCompany::all();
        return view('pagination.suIzleme.suIzlemeCreate', compact('company', 'user'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $suIzleme = Water::with('company')->with('user')->find($id);
        if (!$suIzleme) {
            abort(404);
        }
        return view('pagination.suIzleme.suIzlemeShow', compact('suIzleme'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function companyCreate(Request $request)
    {
        $userId = Auth::id();
        $validatedData = $request->validate([
            'companyName' => 'required'

        ]);
        $veri = $request->all();
        $veri['user_id'] = $userId;
        $company = new waterCompany($veri);
        $company->save();

        return redirect()->back()->with('success', 'Kaydınız başarıyla oluşturuldu.');
    }

    public function companyDelete(Request $request)
    {
        $company = waterCompany::find($request->input('id'));

        if ($company) {
            $company->delete();
            return redirect()->back()->with('success', 'Firma başarıyla silindi.');
        }

        return redirect()->back()->with('error', 'Firma bulunamadı.');
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

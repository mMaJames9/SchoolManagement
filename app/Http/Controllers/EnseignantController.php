<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnseignantStoreRequest;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('enseignant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enseignants = Enseignant::all()->sortByDesc("created_at");
        $data = Enseignant::all()->count();

        return view('admin.enseignants.index', compact('enseignants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnseignantStoreRequest $request)
    {

        if ($request->hasFile('photo_profil_enseignant'))
        {
            $profilePath =  $request->photo_profil_enseignant;
            $nameProfile = $profilePath->hashName();
            $picPath = public_path('storage/uploads/profiles/enseignants');
            $profilePath->move($picPath, $nameProfile);
        }

        if ($request->hasFile('experience_enseignant'))
        {
            $experiencePath =  $request->experience_enseignant;
            $nameCV = $experiencePath->hashName();
            $cvPath = public_path('storage/uploads/cvs');
            $experiencePath->move($cvPath, $nameCV);
        }

        $enseignant = Enseignant::create([
            'matricule_enseignant' => $request['matricule_enseignant'],
            'nom_enseignant' => $request['nom_enseignant'],
            'prenom_enseignant' => $request['prenom_enseignant'],
            'age_enseignant' => $request['age_enseignant'],
            'photo_profil_enseignant' => $nameProfile,
            'experience_enseignant' => $nameCV,
        ]);

        $status = 'Création de l\'enseignant réussie.';

        return redirect()->route('enseignants.index')->with([
            'status' => $status,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('enseignant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enseignant = Enseignant::FindOrFail($id);
        $enseignant->delete();

        $status = 'Suppression de l\'enseignant réussie.';

        return redirect()->route('enseignants.index')->with([
            'status' => $status,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnseignantStoreRequest;
use App\Http\Requests\EnseignantUpdateRequest;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response as FacadesResponse;

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
            $profilePath->store('public/uploads/profiles/enseignants');
        }

        if ($request->hasFile('cv_enseignant'))
        {
            $experiencePath =  $request->cv_enseignant;
            $nameCV = $experiencePath->hashName();
            $experiencePath->store('public/uploads/cvs/enseignants');
        }

        $enseignant = Enseignant::create([
            'matricule_enseignant' => $request['matricule_enseignant'],
            'nom_enseignant' => $request['nom_enseignant'],
            'prenom_enseignant' => $request['prenom_enseignant'],
            'birthday_enseignant' => $request['birthday_enseignant'],
            'num_tel_enseignant' => $request['num_tel_enseignant'],
            'experience_enseignant' => $request['experience_enseignant']."-01",
            'cv_enseignant' => $nameCV ?? null,
            'photo_profil_enseignant' => $nameProfile ?? null,
            'debut_contrat' => $request['debut_contrat'] ?? null,
            'fin_contrat' => $request['fin_contrat'] ?? null,
            'salaire' => $request['salaire'] ?? null,
        ]);

        $status = 'Création de l\'enseignant réussie.';

        return redirect()->route('enseignants.index')->with([
            'status' => $status,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Enseignant $enseignant
     * @return \Illuminate\Http\Response
     */
    public function show(Enseignant $enseignant)
    {
        abort_if(Gate::denies('enseignant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.enseignants.show', compact('enseignant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Enseignant $enseignant
     * @return \Illuminate\Http\Response
     */
    public function edit(Enseignant $enseignant)
    {
        abort_if(Gate::denies('enseignant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.enseignants.edit', compact('enseignant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Enseignant $enseignant
     * @return \Illuminate\Http\Response
     */
    public function update(EnseignantUpdateRequest $request, Enseignant $enseignant)
    {
        if ($request->hasFile('photo_profil_enseignant'))
        {
            $request->validate([
                'photo_profil_enseignant' => ['required', 'image', 'max:3072'],
            ]);

            if ($oldProfilePath = $enseignant->photo_profil_enseignant)
            {
                unlink(public_path('storage/uploads/profiles/enseignants/') . $oldProfilePath);
            }

            $profilePath =  $request->photo_profil_enseignant;
            $nameProfile = $profilePath->hashName();
            $profilePath->store('public/uploads/profiles/enseignants');

            $enseignant->photo_profil_enseignant = $nameProfile;
        }

        if ($request->hasFile('cv_enseignant'))
        {
            $request->validate([
                'cv_enseignant' => ['required', 'file', 'mimes:doc,docx,pdf', 'max:5120'],
            ]);

            if ($oldCVPath = $enseignant->cv_enseignant)
            {
                unlink(public_path('storage/uploads/cvs/enseignants') . $oldCVPath);
            }

            $experiencePath =  $request->cv_enseignant;
            $nameCV = $experiencePath->hashName();
            $experiencePath->store('public/uploads/cvs/enseignants');

            $enseignant->cv_enseignant = $nameCV;
        }

        $enseignant->nom_enseignant = $request['nom_enseignant'];
        $enseignant->prenom_enseignant = $request['prenom_enseignant'];
        $enseignant->birthday_enseignant = $request['birthday_enseignant'];
        $enseignant->num_tel_enseignant = $request['num_tel_enseignant'];
        $enseignant->experience_enseignant = $request['experience_enseignant'];
        $enseignant->debut_contrat = $request['debut_contrat'] ?? null;
        $enseignant->fin_contrat = $request['fin_contrat'] ?? null;
        $enseignant->salaire = $request['salaire'];

        $enseignant->save();

        $status = 'Mise à jour de l\'enseignant réussie.';

        return redirect()->route('enseignants.index')->with([
            'status' => $status,
        ]);
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

        // $ProfilePath = public_path('storage/uploads/profiles/enseignants/{$enseignant->photo_profil_enseignant}");
        // $CVPath = public_path('storage/uploads/cvs/enseignants/{$enseignant->cv_enseignant}");

        // if(File::exists($ProfilePath))
        // {
        //     File::delete($ProfilePath);
        // }

        // if(File::exists($CVPath))
        // {
        //     File::delete($CVPath);
        // }

        $enseignant->delete();

        $status = 'Suppression de l\'enseignant réussie.';

        return redirect()->route('enseignants.index')->with([
            'status' => $status,
        ]);
    }

    public function previewEnseignantCV(Enseignant $enseignant)
    {
        $enseignantPath = $enseignant->cv_enseignant;
        $enseignant = public_path('storage/uploads/cvs/enseignants') . $enseignantPath;

        if (file_exists($enseignant)) {
            return FacadesResponse::make(file_get_contents($enseignant), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename = "'.$enseignantPath.'"',
            ]);
        }
    }
}

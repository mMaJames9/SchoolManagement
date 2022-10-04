<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonnelStoreRequest;
use App\Http\Requests\PersonnelUpdateRequest;
use App\Models\Personnel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response as FacadesResponse;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('personnel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $personnels = Personnel::all()->except(auth()->id())->sortByDesc("created_at");

        return view('admin.personnels.index', compact('personnels'));
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
    public function store(PersonnelStoreRequest $request)
    {

        if ($request->hasFile('photo_profil_personnel'))
        {
            $profilePath =  $request->photo_profil_personnel;
            $nameProfile = $profilePath->hashName();
            $profilePath->store('public/uploads/profiles/personnels');
        }

        if ($request->hasFile('cv_personnel'))
        {
            $experiencePath =  $request->cv_personnel;
            $nameCV = $experiencePath->hashName();
            $experiencePath->store('public/uploads/cvs/personnels');
        }

        $personnel = Personnel::create([
            'nom_personnel' => $request['nom_personnel'],
            'prenom_personnel' => $request['prenom_personnel'],
            'birthday_personnel' => $request['birthday_personnel'],
            'phone_number' => $request['phone_number'],
            'experience_personnel' => $request['experience_personnel'],
            'cv_personnel' => $nameCV ?? null,
            'photo_profil_personnel' => $nameProfile ?? null,
            'debut_contrat' => $request['debut_contrat'] ?? null,
            'fin_contrat' => $request['fin_contrat'] ?? null,
            'salaire' => $request['salaire'] ?? null,
        ]);

        $status = 'Création d\'un nouvel employé réussie.';

        return redirect()->route('personnels.index')->with([
            'status' => $status,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Personnel $personnel
     * @return \Illuminate\Http\Response
     */
    public function show(Personnel $personnel)
    {
        abort_if(Gate::denies('personnel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.personnels.show', compact('personnel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Personnel $personnel
     * @return \Illuminate\Http\Response
     */
    public function edit(Personnel $personnel)
    {
        abort_if(Gate::denies('personnel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.personnels.edit', compact('personnel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Personnel $personnel
     * @return \Illuminate\Http\Response
     */
    public function update(PersonnelUpdateRequest $request, Personnel $personnel)
    {
        if ($request->hasFile('photo_profil_personnel'))
        {
            $request->validate([
                'photo_profil_personnel' => ['required', 'image', 'max:3072'],
            ]);

            if ($oldProfilePath = $personnel->photo_profil_personnel)
            {
                unlink(public_path('storage/uploads/profiles/personnels/') . $oldProfilePath);
            }

            $profilePath =  $request->photo_profil_personnel;
            $nameProfile = $profilePath->hashName();
            $profilePath->store('public/uploads/profiles/personnels');

            $personnel->photo_profil_personnel = $nameProfile;
        }

        if ($request->hasFile('cv_personnel'))
        {
            $request->validate([
                'cv_personnel' => ['required', 'file', 'mimes:doc,docx,pdf', 'max:5120'],
            ]);

            if ($oldCVPath = $personnel->cv_personnel)
            {
                unlink(public_path('storage/uploads/cvs/personnels') . $oldCVPath);
            }

            $experiencePath =  $request->cv_personnel;
            $nameCV = $experiencePath->hashName();
            $experiencePath->store('public/uploads/cvs/personnels');

            $personnel->cv_personnel = $nameCV;
        }

        $personnel->nom_personnel = $request['nom_personnel'];
        $personnel->prenom_personnel = $request['prenom_personnel'];
        $personnel->birthday_personnel = $request['birthday_personnel'];
        $personnel->phone_number = $request['phone_number'];
        $personnel->experience_personnel = $request['experience_personnel'];
        $personnel->debut_contrat = $request['debut_contrat'] ?? null;
        $personnel->fin_contrat = $request['fin_contrat'] ?? null;
        $personnel->salaire = $request['salire'];

        $personnel->save();

        $status = 'Mise à jour de l\'employé réussie.';

        return redirect()->route('personnels.index')->with([
            'status' => $status,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Personnel $personnel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('personnel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $personnel = Personnel::FindOrFail($id);

        // $ProfilePath = public_path('storage/uploads/profiles/personnels/{$personnel->photo_profil_personnel}");
        // $CVPath = public_path('storage/uploads/cvs/personnels/{$personnel->cv_personnel}");

        // if(File::exists($ProfilePath))
        // {
        //     File::delete($ProfilePath);
        // }

        // if(File::exists($CVPath))
        // {
        //     File::delete($CVPath);
        // }

        $personnel->delete();

        $user = User::where('personnel_id', $id);
        $user->delete();

        $status = 'Suppression de l\'employé réussie.';

        return redirect()->route('personnels.index')->with([
            'status' => $status,
        ]);
    }

    public function previewPersonnelCV(Personnel $personnel)
    {
        $personnelPath = $personnel->cv_personnel;
        $personnel = public_path('storage/uploads/cvs/personnels') . $personnelPath;

        if (file_exists($personnel)) {
            return FacadesResponse::make(file_get_contents($personnel), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename = "'.$personnelPath.'"',
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use App\Models\Enseignant;
use App\Models\Personnel;
use App\Models\Salaire;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class SalaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('salaire_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employes = Personnel::with('salaireMensuel')->get();

        if ($request['type_salaries'] == 'enseignant')
        {
            $employes = Enseignant::with('salaireMensuel')->get();
        }
        else
        {
            $employes = Personnel::with('salaireMensuel')->get();
        }

        return view('admin.salaires.index', compact('employes'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePersonnel(Request $request, Personnel $employe)
    {
        $salaire = Salaire::create([
            'montant_salaire' => $request['montant_salaire'] ,
            'date_paiement_salaire' => Carbon::now(),
            'personnel_id' => $employe->id,
        ]);

        $status = 'Le paiement de l\'employé à bien été enregistré.';

        return redirect()->route('salaires.index')->with([
            'status' => $status,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEnseignant(Request $request, Enseignant $employe)
    {
        $salaire = Salaire::create([
            'montant_salaire' => $request['montant_salaire'] ,
            'date_paiement_salaire' => Carbon::now(),
            'enseignant_id' => $employe->id,
        ]);

        $status = 'Le paiement de l\'employé à bien été enregistré.';

        return redirect()->back()->with([
            'status' => $status,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Salaire $salaire
     * @return \Illuminate\Http\Response
     */
    public function show(Salaire $salaire)
    {
        abort_if(Gate::denies('salaire_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if(Carbon::now()->month >= 8 && Carbon::now()->month <= 12)
        {
            $current_year = Annee::where('year_from', Carbon::now()->year)->get();
            $anne_academique = $current_year->value('annee_academique');
        }
        else
        {
            $previous_year = Carbon::now()->subYear(1)->year;

            $current_year = Annee::where('year_from', $previous_year)->get();
            $anne_academique = $current_year->value('annee_academique');
        }

        $salaires = Salaire::all();

        return view('admin.salaires.show', compact('salaire', 'salaires', 'anne_academique'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Salaire $salaire
     * @return \Illuminate\Http\Response
     */
    public function printSalaire(Salaire $salaire)
    {
        abort_if(Gate::denies('salaire_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if(Carbon::now()->month >= 8 && Carbon::now()->month <= 12)
        {
            $current_year = Annee::where('year_from', Carbon::now()->year)->get();
            $anne_academique = $current_year->value('annee_academique');
        }
        else
        {
            $previous_year = Carbon::now()->subYear(1)->year;

            $current_year = Annee::where('year_from', $previous_year)->get();
            $anne_academique = $current_year->value('annee_academique');
        }


        $salaires = Salaire::all();

        return view('admin.salaires.print', compact('salaire', 'salaires', 'anne_academique'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Salaire $salaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Salaire $salaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Salaire $salaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salaire $salaire)
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
        //
    }
}

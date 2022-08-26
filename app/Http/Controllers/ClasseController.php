<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClasseUpdateRequest;
use App\Models\Annee;
use App\Models\Classe;
use App\Models\Enseignant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('classe_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classes = Classe::all()->sortByDesc("created_at");
        $data = Classe::all()->count();

        $enseignants = Enseignant::all()->pluck('nom_enseignant', 'id');

        return view('admin.classes.index', compact('classes', 'enseignants'));
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
     * Display the specified resource.
     *
     * @param  int  Classe $classe
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {
        abort_if(Gate::denies('classe_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

        $classe = Classe::find($classe->id);    

        return view('admin.classes.show', compact( 'anne_academique'), ['classe' => $classe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Classe $classe
     * @return \Illuminate\Http\Response
     */
    public function edit(Classe $classe)
    {
        $enseignants = Enseignant::all()->pluck('nom_enseignant', 'id');

        return view('admin.classes.edit', compact('classe', 'enseignants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Classe $classe
     * @return \Illuminate\Http\Response
     */
    public function update(ClasseUpdateRequest $request, Classe $classe)
    {
        $classe->enseignant_id = $request->enseignant_id;

        $classe->save();

        $status = 'Affectation de l\'enseignant à la classe réussie.';

        return redirect()->route('classes.index')->with([
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
        //
    }
}

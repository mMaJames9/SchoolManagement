<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterielStoreRequest;
use App\Models\Materiel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;


class MaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('materiel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materiels = Materiel::all()->sortByDesc("created_at");
        $data = Materiel::all()->count();

        return view('admin.materiels.index', compact('materiels'));
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
    public function store(MaterielStoreRequest $request)
    {

        $materiel = Materiel::create([
            'nom_materiel' => $request['nom_materiel'] ,
            'date_achat' => $request['date_achat'] ,
            'destination' => $request['destination'] ,
            'prix_materiel' => $request['prix_materiel'] ,
        ]);

        $status = 'Ajout du nouveau materiel réussie.';

        return redirect()->route('materiels.index')->with([
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
        abort_if(Gate::denies('materiel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materiel = Materiel::FindOrFail($id);
        $materiel->delete();

        $status = 'Suppression du matériel réussie.';

        return redirect()->route('materiels.index')->with([
            'status' => $status,
        ]);
    }
}

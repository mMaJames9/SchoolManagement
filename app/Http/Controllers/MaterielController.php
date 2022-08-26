<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterielStoreRequest;
use App\Http\Requests\MaterielUpdateRequest;
use App\Models\Materiel;
use App\Models\Stock;
use App\Models\Transaction;
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
            'quantite_achat' => $request['quantite_achat'] ,
            'destination' => $request['destination'] ,
            'prix_materiel' => $request['prix_materiel'] ,
            'date_prochain_achat' => $request['date_prochain_achat'] ,
        ]);

        $status = 'Ajout du nouveau materiel réussie.';

        return redirect()->route('materiels.index')->with([
            'status' => $status,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Materiel $materiel
     * @return \Illuminate\Http\Response
     */
    public function show(Materiel $materiel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Materiel $materiel
     * @return \Illuminate\Http\Response
     */
    public function edit(Materiel $materiel)
    {
        abort_if(Gate::denies('materiel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.materiels.edit', compact('materiel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Materiel $materiel
     * @return \Illuminate\Http\Response
     */
    public function update(MaterielUpdateRequest $request, Materiel $materiel)
    {
        $materiel->nom_materiel = $request['nom_materiel'];
        $materiel->date_achat = $request['date_achat'];
        $materiel->destination = $request['destination'];
        $materiel->prix_materiel = $request['prix_materiel'];
        $materiel->date_prochain_achat = $request['date_prochain_achat'];

        $materiel->save();

        $status = 'Mise à jour du matériel réussie.';

        return redirect()->route('materiels.index')->with([
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
        abort_if(Gate::denies('materiel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materiel = Materiel::FindOrFail($id);
        $materiel->delete();

        $stock = Stock::where('materiel_id', $id);
        $stock->delete();

        $transaction = Transaction::where('materiel_id', $id);
        $transaction->delete();

        $status = 'Suppression du matériel réussie.';

        return redirect()->route('materiels.index')->with([
            'status' => $status,
        ]);
    }
}

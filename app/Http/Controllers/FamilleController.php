<?php

namespace App\Http\Controllers;

use App\Http\Requests\FamilleUpdateRequest;
use App\Models\Famille;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class FamilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('famille_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $familles = Famille::all()->sortByDesc("created_at");
        $data = Famille::all()->count();

        return view('admin.familles.index', compact('familles'));
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
     * @param  int  Famille $famille
     * @return \Illuminate\Http\Response
     */
    public function show(Famille $famille)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Famille $famille
     * @return \Illuminate\Http\Response
     */
    public function edit(Famille $famille)
    {
        abort_if(Gate::denies('famille_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.familles.edit', compact('famille'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Famille $famille
     * @return \Illuminate\Http\Response
     */
    public function update(FamilleUpdateRequest $request, Famille $famille)
    {
        if ($request->filled('checkPere'))
        {
            $this->validate($request, [
                'nom_pere' => ['required', 'string', 'max:255'],
                'num_tel_pere' => ['required', 'string', 'max:255'],
            ]);

            $famille->nom_pere = $request['nom_pere'];
            $famille->num_tel_pere = $request['num_tel_pere'];
        }

        if ($request->filled('checkMere'))
        {
            $this->validate($request, [
                'nom_mere' => ['required', 'string', 'max:255'],
                'num_tel_mere' => ['required', 'string', 'max:255'],
            ]);

            $famille->nom_mere = $request['nom_mere'];
            $famille->num_tel_mere = $request['num_tel_mere'];
        }

        $famille->domicile_famille = $request['domicile_famille'];

        $famille->save();

        $status = 'Mise à jour de la famille réussie.';

        return redirect()->route('familles.index')->with([
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

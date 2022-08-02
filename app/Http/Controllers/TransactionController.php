<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transactions = Transaction::all();

        return view('transactions.index', compact('transactions'));
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
        //
    }

    public function storeStock(Stock $stock)
    {
        $action      = request()->input('action', 'add') == 'add' ? 'add' : 'remove';
        $stockAmount = request()->input('stock', 1);
        $sign        = $action == 'add' ? '+' : '-';

        if ($stockAmount < 1) {
            return redirect()->route('stocks.index')->with([
                'error' => 'Aucun élément n\'a été ajouté/supprimé. La valeur doit être supérieur à 1.',
            ]);
        }

        Transaction::create([
            'stock'    => $sign . $stockAmount,
            'materiel_id' => $stock->materiel->id,
        ]);

        if ($action == 'add') {
            $stock->increment('stock_courant', $stockAmount);
            $status = $stockAmount . ' article(s) a été ajouté(s) au stock.';
        }

        if ($action == 'remove') {
            if ($stock->stock_courant - $stockAmount < 0) {
                return redirect()->route('stocks.index')->with([
                    'error' => 'Pas assez d\'articles en stock.',
                ]);
            }

            $stock->decrement('stock_courant', $stockAmount);
            $status = $stockAmount . ' article(s) a été retiré du stock.';
        }

        return redirect()->route('stocks.index')->with([
            'status' => $status,
        ]);
    }
}

<x-app-layout>


    <div class="page-title">
        <div class="row mb-3">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Liste du Stock</h3>
                <p class="text-subtitle text-muted">Liste du matériel ainsi que leur quantité en stock</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                {{-- @role('Fondateur')
                <div class="float-start float-lg-end">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createStock" data-bs-backdrop="true">
                        <i class="bi bi-plus bi-middle"></i>
                        <span>Ajouter un nouveau stock</span>
                    </a>
                </div>

                @include('admin.stocks.create')

                @endrole --}}
            </div>
        </div>
    </div>

    <section class="section">

        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="tableStock">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Materiel</th>
                            <th>Stock Actuel</th>
                            <th class="text-center">Ajouter</th>
                            <th class="text-center">Supprimer</th>
                            <th>Créé le</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($stocks as $key => $stock)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>

                            <td>
                                {{ $stock->materiel->nom_materiel }}
                            </td>

                            <td>
                                {{ $stock->stock_courant }}
                            </td>

                            <td class="text-center" width="20%">
                                <form action="{{ route('transactions.storeStock', $stock->id) }}" method="POST" class="form form-horizontal">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="action" value="add">

                                            <div class="col-md-12 mb-1">
                                                <div class="input-group">
                                                    <input type="number" id="stock" class="form-control" name="stock" min="1">
                                                    <button type="submit" class="btn btn-sm btn-success"><i class="bi bi-plus"></i></button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>

                            </td>
                            <td class="text-center" width="20%">
                                <form action="{{ route('transactions.storeStock', $stock->id) }}" method="POST" class="form form-horizontal">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="action" value="remove">

                                            <div class="col-md-12 mb-1">
                                                <div class="input-group">
                                                    <input type="number" id="stock" class="form-control" name="stock" min="1">
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-dash"></i></button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>

                            </td>

                            <td width="15%">
                                {{ $stock->created_at }}
                            </td>

                            <td class="text-center">
                                @role('Fondateur')
                                <div class="modal-danger me-1 mb-1 d-inline-block">
                                    <a type="button" class="btn icon icon-left btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteStock{{ $stock->id }}">
                                        <i class="bi bi-trash bi-middle"></i>
                                    </a>

                                    <!--Danger theme Modal -->
                                    <div class="modal fade text-left" id="DeleteStock{{ $stock->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalDelteStock" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title white" id="myModalDelteStock">
                                                            Supprimer stock
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Êtes-vous sûr de vouloir supprimer <span class="fw-bold">{{ ucwords($stock->stock_courant) }}</span> ?
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Non</span>
                                                        </button>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="btn btn-danger ml-1">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Oui</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endrole
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </section>

    @section('custimize')


    <script>
        // Simple Datatable
        let tableStock = document.querySelector('#tableStock');
        let dataTable = new simpleDatatables.DataTable(tableStock);
    </script>
    @endsection

</x-app-layout>

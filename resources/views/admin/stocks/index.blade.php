<x-app-layout>

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item active">Stocks</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <h3>Stocks</h3>
                        <p>Gérer le stock en augmentant ou diminuant les quantité de stock. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" container-fluid container-fixed-lg">
        <!-- START card -->
        <div class="card card-transparent">
            <div class="card-header mb-4">

                <div class="pull-right">
                    <div class="col-xs-12">
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Rechercher">
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <table class="table table-hover demo-table-search table-responsive-block dataTable no-footer" id="tableWithSearch">
                    <thead>
                        <tr>
                            <th>Materiel</th>
                            <th>Stock Actuel</th>
                            <th class="text-lg-center">Ajouter</th>
                            <th class="text-lg-center">Retirer</th>
                            <th>Dernière modification</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($stocks as $key => $stock)
                        <tr>

                            <td class="v-align-middle text-nowrap w-lg-25">
                                <p>{{ ucwords($stock->materiel->nom_materiel) }}</p>
                            </td>

                            <td class="v-align-middle">
                                <p>{{ $stock->stock_courant }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center w-lg-15">
                                <form action="{{ route('transactions.storeStock', $stock->id) }}" method="POST" class="form">
                                    @csrf

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="action" value="add">

                                            <div class="input-group">
                                                <input type="number" id="stock" class="form-control" name="stock" min="1">
                                                <div class="input-group-append">
                                                    <button class="input-group-text success" type="submit">
                                                        <i class="fa fa-plus" data-toogle="tooltip" data-placement="top" data-original-title="Ajouter des articles au stock"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center w-lg-15">
                                <form action="{{ route('transactions.storeStock', $stock->id) }}" method="POST" class="form">
                                    @csrf

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="action" value="remove">

                                            <div class="input-group">
                                                <input type="number" id="stock" class="form-control" name="stock" min="1">
                                                <div class="input-group-append">
                                                    <button class="input-group-text danger" type="submit">
                                                        <i class="fa fa-minus" data-toogle="tooltip" data-placement="top" data-original-title="Retirer des articles du stock"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-25">
                                <p>{{ $stock->updated_at }}</p>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>

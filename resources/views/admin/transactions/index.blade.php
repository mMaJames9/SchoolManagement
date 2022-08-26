<x-app-layout>

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item active">Transactions</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <h3>Transactions</h3>
                        <p>Relevé de toutes les transactions de stock. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" container-fluid container-fixed-lg">
        <!-- START card -->
        <div class="card card-transparent">
            <div class="card-header mb-4 mb-4 ">

                <div class="pull-right">
                    <div class="col-xs-12">
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Rechercher">
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                    <thead>
                        <tr>
                            <th>Materiel</th>
                            <th>Stock</th>
                            <th>Effectué par</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($transactions as $key => $transaction)
                        <tr>

                            <td class="v-align-middle text-nowrap" style="width: 50%">
                                <p>{{ ucwords($transaction->materiel->nom_materiel) }}</p>
                            </td>

                            <td class="v-align-middle">
                                <p>{{ $transaction->stock }} articles</p>
                            </td>

                            <td class="v-align-middle">
                                <p>{{ strtoupper($transaction->user->personnel->nom_personnel) }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 25%">
                                <p>{{ $transaction->created_at }}</p>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>

<x-app-layout>

    @include('admin.materiels.create')

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item active">Materiels</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <h3>Materiels</h3>
                        <p>Liste de tout le matériel utilisé dans l'école. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" container-fluid container-fixed-lg">
        <!-- START card -->
        <div class="card card-transparent">
            <div class="card-header mb-4">

                <div class="d-flex justify-content-between">
                    <div>
                        <div class="col-xs-12">
                            <button id="show-modal" class="btn btn-primary btn-cons" data-target="#addNewAsset" data-toggle="modal">
                                <span class="fa fa-plus mr-md-2"></span>
                                <span class="d-none d-md-inline">Ajouter un nouveau matériel</span>
                            </button>
                        </div>
                    </div>

                    <div>
                        <div class="col-xs-12">
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Rechercher">
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <table class="table table-hover demo-table-search table-responsive-block dataTable no-footer" id="tableWithSearch">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Date Achat</th>
                            <th>Prix</th>
                            <th>Destination</th>
                            <th>Date Prochain Achat</th>
                            <th class="text-lg-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($materiels as $key => $materiel)
                        <tr>
                            <td class="v-align-middle text-nowrap w-lg-25">
                                <p>{{ ucwords($materiel->nom_materiel) }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-15">
                                <p>{{ date('d F Y', strtotime($materiel->date_achat)) }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-10">
                                <p>{{ number_format($materiel->prix_materiel, 0, ",", " ") }} FCFA</p>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-20">
                                <p>{{ ucwords($materiel->destination) }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-15">
                                <p>{{ date('d F Y', strtotime($materiel->date_prochain_achat)) }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center w-lg-15">

                                <a href="{{ route('materiels.edit', $materiel->id) }}" class="btn btn-sm btn-info" data-target="#editMateriel{{ $materiel->id }}" data-toggle="modal">
                                    <span class="fa fa-paste" data-toggle="tooltip" data-placement="top" data-original-title="Modifier les informations de ce matériel"></span>
                                </a>

                                <button id="show-modal" class="btn btn-sm btn-danger" data-target="#deleteMateriel{{ $materiel->id }}" data-toggle="modal">
                                    <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Supprimer ce matériel"></span>
                                </button>

                            </td>
                        </tr>

                        <div class="modal fade slide-up disable-scroll" id="deleteMateriel{{ $materiel->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteMateriel{{ $materiel->id }}" aria-hidden="false">
                            <div class="modal-dialog ">
                                <div class="modal-content-wrapper">
                                    <div class="modal-content">
                                        <div class="modal-header clearfix text-left">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <i class="pg-close fs-14"></i>
                                            </button>
                                            <h5>Confirmer <span class="semi-bold">Suppression</span></h5>
                                            <p class="p-b-10">Etes-vous sûr que vous voulez supprimer {{ strtoupper($materiel->nom_materiel ?? '' ) }} ?</p>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form" action="{{ route('materiels.destroy', $materiel->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <div class="pull-right">
                                                    <button type="button" class="btn btn-secondary m-t-5" data-dismiss="modal">Annuler</button>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger m-t-5">Supprimer</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @include('admin.materiels.edit')

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>

<x-app-layout>

    @include('admin.matieres.create')

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item active">Matières</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <h3>Matières</h3>
                        <p>Liste de toutes les matières. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" container-fluid container-fixed-lg">
        <!-- START card -->
        <div class="card card-transparent">

            <div class="card-header mb-4 ">
                <div class="pull-left">
                    <div class="col-xs-12">
                        <button id="show-modal" class="btn btn-primary btn-cons" data-target="#addNewMatiere" data-toggle="modal">
                            <span class="fa fa-plus mr-2"></span>
                            <span>Ajouter une matière</span>
                        </button>
                    </div>
                </div>

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
                            <th>Intitule</th>
                            <th>Niveau</th>
                            <th>Coef.</th>
                            <th class="text-lg-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($matieres as $key => $matiere)
                        <tr>

                            <td class="v-align-middle text-nowrap" style="width: 55%">
                                <p>{{ ucwords($matiere->intitule_matiere) }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                <p>{{ $matiere->niveau_matiere }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                <p>{{ $matiere->coef_matiere }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center" style="width: 15%">

                                <a href="{{ route('matieres.edit', $matiere->id) }}" class="btn btn-sm btn-info" data-target="#editMatiere{{ $matiere->id }}" data-toggle="modal">
                                    <span class="fa fa-paste" data-toggle="tooltip" data-placement="top" data-original-title="Modifier les informations de cette matière"></span>
                                </a>

                                <button id="show-modal" class="btn btn-sm btn-danger" data-target="#deleteMatiere{{ $matiere->id }}" data-toggle="modal">
                                    <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Supprimer cette matière"></span>
                                </button>

                            </td>
                        </tr>

                        <div class="modal fade slide-up disable-scroll" id="deleteMatiere{{ $matiere->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteMatiere{{ $matiere->id }}" aria-hidden="false">
                            <div class="modal-dialog ">
                                <div class="modal-content-wrapper">
                                    <div class="modal-content">
                                        <div class="modal-header clearfix text-left">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <i class="pg-close fs-14"></i>
                                            </button>
                                            <h5>Confirmer <span class="semi-bold">Suppression</span></h5>
                                            <p class="p-b-10">Etes-vous sûr que vous voulez supprimer {{ strtoupper($matiere->intitule_matiere ?? '' ) }} ?</p>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form" action="{{ route('matieres.destroy', $matiere->id) }}" method="POST">
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

                        @include('admin.matieres.edit')

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>

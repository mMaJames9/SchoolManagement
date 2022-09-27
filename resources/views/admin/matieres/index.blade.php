<x-app-layout>

    @include('admin.matieres.create')

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    @if (!empty($selected))
                    <li class="breadcrumb-item"><a href="{{ route('matieres.index') }}">Matières</a></li>
                    <li class="breadcrumb-item active">Niveau {{ $selected }}</li>
                    @else
                    <li class="breadcrumb-item active">Matières</li>
                    @endif
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

            <div class="card-header mb-4">

                <div class="d-flex justify-content-between">
                    <div>
                        <div class="col-xs-12">
                            <button id="show-modal" class="btn btn-primary btn-cons mr-4" data-target="#addNewMatiere" data-toggle="modal">
                                <span class="fa fa-plus mr-md-2"></span>
                                <span class="d-none d-md-inline">Ajouter une matière</span>
                            </button>

                        </div>
                    </div>

                    <div>
                        <div class="col-xs-12">
                            <form class="d-flex" action="{{ URL::current() }}" method="GET">

                                <div class="mr-2">
                                    <select class="form-control" id="niveau" name="niveau">
                                        <option selected disabled hidden>Selectionner le niveau...</option>
                                        <option value="0" {{ $selected == 0  ? 'selected' : '' }}>Niveau 0</option>
                                        <option value="1" {{ $selected == 1  ? 'selected' : '' }}>Niveau 1</option>
                                        <option value="2" {{ $selected == 2  ? 'selected' : '' }}>Niveau 2</option>
                                        <option value="3" {{ $selected == 3  ? 'selected' : '' }}>Niveau 3</option>
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-info">
                                    <span>Filtrer</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-responsive-block no-footer">
                    <thead>
                        <tr>
                            <th class="v-align-middle text-nowrap text-lg-center">Compétences</th>
                            <th>Intitule</th>
                            <th>Coef.</th>
                            <th class="text-lg-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($competences as $key => $competence)
                        <tr>

                            <td class="v-align-middle text-nowrap text-lg-center" style="width: 40%" rowspan="{{ $competence->matieres->count() }}">
                                <p class="bold">Comptence {{ $loop->iteration}}</p>
                                <p>{{ ucwords(strtolower($competence->intitule_competence)) }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-30">
                                <p>{{ strtoupper($competence->matieres[0]->intitule_matiere) }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-15">
                                <p>{{ $competence->matieres[0]->coef_matiere }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center w-lg-15">

                                <a href="{{ route('matieres.edit', $competence->matieres[0]->id) }}" class="btn btn-sm btn-info" data-target="#editMatiere{{ $competence->matieres[0]->id }}" data-toggle="modal">
                                    <span class="fa fa-paste" data-toggle="tooltip" data-placement="top" data-original-title="Modifier les informations de cette matière"></span>
                                </a>

                                <button id="show-modal" class="btn btn-sm btn-danger" data-target="#deleteMatiere{{ $competence->matieres[0]->id }}" data-toggle="modal">
                                    <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Supprimer cette matière"></span>
                                </button>

                            </td>

                            <div class="modal fade slide-up disable-scroll" id="deleteMatiere{{ $competence->matieres[0]->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteMatiere{{ $competence->matieres[0]->id }}" aria-hidden="false">
                                <div class="modal-dialog ">
                                    <div class="modal-content-wrapper">
                                        <div class="modal-content">
                                            <div class="modal-header clearfix text-left">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    <i class="pg-close fs-14"></i>
                                                </button>
                                                <h5>Confirmer <span class="semi-bold">Suppression</span></h5>
                                                <p class="p-b-10">Etes-vous sûr que vous voulez supprimer {{ strtoupper($competence->matieres[0]->intitule_matiere ?? '' ) }} ?</p>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form" action="{{ route('matieres.destroy', $competence->matieres[0]->id) }}" method="POST">
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

                        </tr>

                        @for($i = 1; $i < $competence->matieres->count(); $i++)
                        <tr>

                            <td class="v-align-middle text-nowrap w-lg-30">
                                <p>{{ strtoupper($competence->matieres[$i]->intitule_matiere) }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-15">
                                <p>{{ $competence->matieres[$i]->coef_matiere }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center w-lg-15">

                                <a href="{{ route('matieres.edit', $competence->matieres[$i]->id) }}" class="btn btn-sm btn-info" data-target="#editMatiere{{ $competence->matieres[$i]->id }}" data-toggle="modal">
                                    <span class="fa fa-paste" data-toggle="tooltip" data-placement="top" data-original-title="Modifier les informations de cette matière"></span>
                                </a>

                                <button id="show-modal" class="btn btn-sm btn-danger" data-target="#deleteMatiere{{ $competence->matieres[$i]->id }}" data-toggle="modal">
                                    <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Supprimer cette matière"></span>
                                </button>

                            </td>

                            <div class="modal fade slide-up disable-scroll" id="deleteMatiere{{ $competence->matieres[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteMatiere{{ $competence->matieres[$i]->id }}" aria-hidden="false">
                                <div class="modal-dialog ">
                                    <div class="modal-content-wrapper">
                                        <div class="modal-content">
                                            <div class="modal-header clearfix text-left">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    <i class="pg-close fs-14"></i>
                                                </button>
                                                <h5>Confirmer <span class="semi-bold">Suppression</span></h5>
                                                <p class="p-b-10">Etes-vous sûr que vous voulez supprimer {{ strtoupper($competence->matieres[$i]->intitule_matiere ?? '' ) }} ?</p>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form" action="{{ route('matieres.destroy', $competence->matieres[$i]->id) }}" method="POST">
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

                            @include('admin.matieres.edit2')

                        </tr>
                        @endfor

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>

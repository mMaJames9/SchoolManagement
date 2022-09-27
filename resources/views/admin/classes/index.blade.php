<x-app-layout>

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item active">Classes</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <h3>Classes</h3>
                        <p>Liste de toutes les classes de la section francophone et anglophone. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" container-fluid container-fixed-lg">
        <!-- START card -->
        <div class="card card-transparent">

            <div class="card-header mb-4 ">
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
                            <th>Section</th>
                            <th>Cycle</th>
                            <th>Classe</th>
                            <th>Enseignant</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($classes as $key => $classe)
                        <tr>

                            <td class="v-align-middle text-nowrap w-lg-15">
                                <p>{{ $classe->nom_section }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-15">
                                <p>
                                    @if ($classe->nom_classe == 'Pre-Maternelle')
                                    {{ $classe->cycle->libelle_cycle ?? 'Maternelle' }}
                                    @elseif ($classe->nom_classe == 'Pre-Nursery')
                                    {{ $classe->cycle->libelle_cycle ?? 'Nursery' }}
                                    @elseif ($classe->nom_classe == 'CM2')
                                    {{ $classe->cycle->libelle_cycle ?? 'Primaire' }}
                                    @elseif ($classe->nom_classe == 'Class 6')
                                    {{ $classe->cycle->libelle_cycle ?? 'Primary' }}
                                    @else
                                    {{ $classe->cycle->libelle_cycle ?? '' }}
                                    @endif
                                </p>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-20">
                                <p>{{ $classe->nom_classe ?? '' }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-30">
                                <div class="item-header clearfix">
                                    @if(isset($classe->enseignant->photo_profil_enseignant))
                                    <div class="thumbnail-wrapper d32 circular">
                                        <img width="40" height="40" src="{{ asset("/storage/uploads/profiles/enseignants/" . $classe->enseignant->photo_profil_enseignant) }}" data-src="{{ asset("/storage/uploads/profiles/enseignants/" . $classe->enseignant->photo_profil_enseignant) }}">
                                    </div>
                                    @endif
                                    <div class="inline m-l-10">
                                        <p class="no-margin">
                                            <strong>{{ strtoupper($classe->enseignant->nom_enseignant ?? '') }}</strong>
                                        </p>
                                        <p class="no-margin hint-text">
                                            <span>{{ ucwords($classe->enseignant->prenom_enseignant ?? '') }}</span>
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center w-lg-15">

                                <a class="btn btn-sm btn-primary" href="{{ route('classes.show', $classe->id) }}">
                                    <span class="fa fa-eye" data-toggle="tooltip" data-placement="top" data-original-title="Afficher les informations de cette classe"></span>
                                </a>

                                <a href="{{ route('classes.edit', $classe->id) }}" class="btn btn-sm btn-info" data-target="#editClasse{{ $classe->id }}" data-toggle="modal">
                                    <span class="fa fa-paste" data-toggle="tooltip" data-placement="top" data-original-title="Affecter un enseignant à cette classe"></span>
                                </a>

                            </td>
                        </tr>

                        @include('admin.classes.edit')

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>

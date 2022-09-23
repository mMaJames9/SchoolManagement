<x-app-layout>

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    @if (!empty($selected))
                    <li class="breadcrumb-item"><a href="{{ route('bulletins.index') }}">Bulletins Scolaire</a></li>
                    <li class="breadcrumb-item active">{{ $classes->where('id', $selected)->first()->nom_classe }}</li>
                    @else
                    <li class="breadcrumb-item active">Bulletins Scolaire</li>
                    @endif

                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <h3>Bulletins Scolaires</h3>
                        <p>Selectionner la classe et la séquence pour pourvoir remplir le bulletin de l'élève. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" container-fluid container-fixed-lg">
        <!-- START card -->
        <div class="card card-transparent">
            <div class="card-header mb-4">

                <div class="pull-left">
                    <div class="col-xs-12">

                        <form class="d-flex" action="{{ URL::current() }}" method="GET">

                            <div class="mr-2">
                                <select class="form-control" id="classe" name="classe">
                                    <option selected disabled hidden>Selectionner la classe...</option>
                                    @foreach($sections as $key => $section)
                                    <optgroup label="{{ $section }}">
                                        @foreach($classes as $key => $classe)
                                        @if($section == $classe->nom_section)
                                        <option value="{{ $classe->id }}" {{ ($classe ? $classe->id : old('classe')) == $selected    ? 'selected' : '' }}>{{ ucwords($classe->nom_classe) }}</option>
                                        @endif

                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>


                            <button type="submit" class="btn btn-info">
                                <span>Filtrer</span>
                            </button>
                        </form>
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
                <table class="table table-hover demo-table-search table-responsive-block dataTable no-footer" id="tableWithSearch">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Matricule</th>
                            <th class="text-lg-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($eleves as $key => $eleve)

                        <tr>

                            <td class="v-align-middle text-nowrap" style="width: 25%">
                                <div class="item-header clearfix">
                                    <div class="thumbnail-wrapper d32 circular">
                                        <img width="40" height="40" src="{{ asset("/storage/uploads/profiles/eleves/$eleve->photo_profil_eleve") }}" data-src="{{ asset("/storage/uploads/profiles/eleves/$eleve->photo_profil_eleve") }}">
                                    </div>
                                    <div class="inline m-l-10">
                                        <p class="no-margin">
                                            <strong>{{ strtoupper($eleve->nom_eleve ?? '' ) }}</strong>
                                        </p>
                                        <p class="no-margin hint-text">
                                            <span>{{ ucwords($eleve->prenom_eleve ?? '' ) }}</span>
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                <p>{{ $eleve->matricule_eleve ?? '' }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center">

                                @if ($eleve->notes->count() <> 0)
                                <a class="btn btn-sm btn-primary" href="{{ route('bulletins.list', $eleve->id) }}">
                                    <span class="fa fa-eye" data-toggle="tooltip" data-placement="top" data-original-title="Afficher les bulletins de cet élève"></span>
                                </a>
                                @endif

                                @if ($eleve->notesMensuel->count() == 0)
                                <a href="{{ route('createBulletin', $eleve->id) }}" class="btn btn-sm btn-success">
                                    <span class="fa fa-plus" data-toggle="tooltip" data-placement="top" data-original-title="Remplir le bulletin"></span>
                                </a>
                                @else

                                @php
                                    $bulletin = $eleve->notesMensuel->first();
                                @endphp

                                <a class="btn btn-sm btn-info" href="{{ route('editBulletin', [$eleve->id, $bulletin->id]) }}">
                                    <span class="fa fa-paste" data-toggle="tooltip" data-placement="top" data-original-title="Modifier les notes de cet élève"></span>
                                </a>
                                @endif

                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>

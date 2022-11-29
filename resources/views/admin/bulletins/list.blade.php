<x-app-layout>

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('bulletins.index') }}">Bulletins Scolaire</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('bulletins.index') }}?classe={{ $eleve->classe_id }}">{{ $eleve->classe->nom_classe }}</a></li>
                    <li class="breadcrumb-item active">{{ strtoupper($eleve->nom_eleve ?? '' ) }}</li>

                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <h3>Bulletins Scolaires</h3>
                        <p>Liste des bulletins scolaire de {{ strtoupper($eleve->nom_eleve ?? '' ) }}.</p>
                        <p>Anée scolaire {{ strtoupper($eleve->annee->annee_academique ?? '' ) }}.</p>
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
                            <th>Trimestres</th>
                            <th class="text-lg-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">

                        @foreach ($eleve->notes->unique('evaluation.trimestre.num_trimestre') as $key => $note)
                        <tr>

                            <td class="v-align-middle text-nowrap">
                                <p>TRIMESTRE {{ $note->evaluation->trimestre->num_trimestre }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center w-lg-15">

                                <a class="btn btn-sm btn-primary" href="{{ route('bulletins.show', $note->id) }}">
                                    <span class="fa fa-eye" data-toggle="tooltip" data-placement="top" data-original-title="Afficher le bulletin de {{ date('F Y', strtotime($note->mois_bulletin)) }}"></span>
                                </a>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>

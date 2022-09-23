<x-app-layout>

    <nav class="navbar navbar-default bg-master-lighter sm-padding-10 full-width p-t-0 p-b-0 mt-4" role="navigation">
        <div class="container-fluid full-width">

            <div class="navbar-header text-center">
                <button type="button" class="navbar-toggle collapsed btn btn-link no-padding" data-toggle="collapse" data-target="#sub-nav">
                    <i class="pg pg-more v-align-middle"></i>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="sub-nav">
                <div class="row">
                    <div class="col-sm-6">

                        <ol class="breadcrumb mt-2">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('bulletins.index') }}">Bulletins Scolaire</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('bulletins.index') }}?classe={{ $notes->first()->eleve->classe_id }}">{{ $notes->first()->eleve->classe->nom_classe }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('bulletins.list', $notes->first()->eleve_id) }}">{{ strtoupper($notes->first()->eleve->nom_eleve ?? '' ) }}</a></li>
                    <li class="breadcrumb-item active">{{ date('F Y', strtotime($notes->first()->mois_bulletin)) }}</li>
                        </ol>

                    </div>
                    <div class="col-sm-6">
                        <ul class="navbar-nav d-flex flex-row justify-content-sm-end">
                            <li class="nav-item">
                                <a href="{{ route('printBulletin', $notes->first()->id) }}" class="p-r-10">
                                    <i class="fa fa-print" data-toggle="tooltip" data-placement="bottom" title="Imprimer le document"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="p-r-10" onclick="$.Pages.setFullScreen(document.querySelector('html'));">
                                    <i class="fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Passer en mode plein écran"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </nav>

    <div class=" container-fluid container-fixed-lg">
        <!-- START card -->
        <div class="card card-default m-t-20">
            <div class="card-body">

                @include('admin.bulletins.tableau')

            </div>
        </div>
    </div>


</x-app-layout>

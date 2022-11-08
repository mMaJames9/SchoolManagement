<x-app-layout>

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('eleves.index') }}">Eleves</a></li>
                    <li class="breadcrumb-item active">{{ strtoupper($eleve->nom_eleve ?? '' ) }}</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <div class="row-xs-height">
                            <div class="social-user-profile col-xs-height text-center col-top">
                                <div class="thumbnail-wrapper d48 circular bordered b-white">
                                    <img alt="Avatar" width="55" height="55" data-src-retina="{{ asset("/storage/uploads/profiles/eleves/$eleve->photo_profil_eleve") }}" data-src="{{ asset("/storage/uploads/profiles/eleves/$eleve->photo_profil_eleve") }}" src="{{ asset("/storage/uploads/profiles/eleves/$eleve->photo_profil_eleve") }}">
                                </div>
                            </div>
                            <div class="col-xs-height p-l-20">
                                <h3 class="no-margin p-b-5 bold">{{ strtoupper($eleve->nom_eleve ?? '' ) }}</h3>
                                <p class="no-margin fs-16">{{ ucwords($eleve->prenom_eleve ?? '' ) }}</p>
                                <p class="no-margin fs-15">Matricule : {{ $eleve->matricule_eleve }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="feed">
            <!-- START DAY -->
            <div class="day" data-social="day">
                <!-- START ITEM -->
                <div class="card no-border bg-transparent full-width" data-social="item">
                    <!-- START CONTAINER FLUID -->
                    <div class="container-fluid p-t-30 p-b-30 ">
                        <div class="row row-same-height">
                            <div class="col-lg">
                                <div class="card card-default">
                                    <div class="card-header separator mb-4">
                                        <div class="card-title">Informations Personnelles</div>
                                    </div>
                                    <div class="card-body">

                                        @if (isset($eleve->birthday_eleve) && isset($eleve->lieu_naissance))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Date et Lieu de naissance</span>
                                            <p>{{ date('d F Y', strtotime($eleve->birthday_eleve)) }} à {{ $eleve->lieu_naissance }}</p>
                                        </div>
                                        @endif

                                        @if (isset($eleve->sexe_eleve))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Sexe</span>
                                            <p>
                                                {{ $eleve->sexe_eleve == 0 ? 'Masculin' : 'Feminin' }}
                                            </p>
                                        </div>
                                        @endif

                                        @if (isset($eleve->classes))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Classes redoublées</span>
                                            <br>
                                            @foreach ($eleve->classes as $key => $classe)
                                            <span class="badge badge-primary">
                                                {{ $classe->nom_classe }}
                                            </span>
                                            @endforeach
                                        </div>
                                        @endif

                                        @if (isset($eleve->parcours))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Ancien établissement</span>
                                            <br>
                                            <span class="mr-2">{{ ucwords($eleve->parcours->nom_etablissement) }}</span>
                                            <a class="badge badge-success" target="_blank" href='{{ asset("storage/uploads/documents/bulletins/anciens/" . $eleve->parcours->bulletin_precedent) }}'>
                                                Voir ancien bulletin
                                            </a>

                                        </div>
                                        @endif

                                        @if (isset($eleve->classe))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Classe d'inscription</span>
                                            <br>
                                            <span class="badge badge-primary">
                                                {{ $eleve->classe->nom_classe }}
                                            </span>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            @if (isset($eleve->maladie_hereditaire) || isset($eleve->maladie_chronique) || isset($eleve->alergie_aliment) || isset($eleve->alergie_medicament) || isset($eleve->alergie_substance))
                            <div class="col-lg-4">
                                <div class="card card-default bg-secondary">
                                    <div class="card-header separator mb-4">
                                        <div class="card-title text-white">Maladies et Alergies</div>
                                    </div>
                                    <div class="card-body text-white">

                                        @if (isset($eleve->carnet_vaccination))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Carnet de vaccination</span>
                                            <br>
                                            <span class="fas fa-check mr-2"></span>
                                            <a class="badge badge-info" target="_blank" href='{{ asset("storage/uploads/documents/carnets/" . $eleve->carnet_vaccination) }}'>
                                                Voir carnet de vaccination
                                            </a>

                                        </div>
                                        @endif

                                        @if (isset($eleve->maladie_hereditaire))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Maladie héréditaire</span>
                                            <p>
                                                {!! $eleve->maladie_hereditaire  !!}
                                            </p>
                                        </div>
                                        @endif

                                        @if (isset($eleve->maladie_chronique))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Maladie chronique</span>
                                            <p>
                                                {!! $eleve->maladie_chronique  !!}
                                            </p>
                                        </div>
                                        @endif

                                        @if (isset($eleve->alergie_aliment))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Alergie aliments</span>
                                            <p>
                                                {!! $eleve->alergie_aliment  !!}
                                            </p>
                                        </div>
                                        @endif

                                        @if (isset($eleve->alergie_medicament))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Alergie Médicament</span>
                                            <p>
                                                {!! $eleve->alergie_medicament  !!}
                                            </p>
                                        </div>
                                        @endif

                                        @if (isset($eleve->alergie_substance))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Alergie Substance</span>
                                            <p>
                                                {!! $eleve->alergie_substance  !!}
                                            </p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="col-lg-4">
                                <div class="card card-default bg-primary">
                                    <div class="card-header separator mb-4">
                                        <div class="card-title text-white">Informations parents</div>
                                    </div>
                                    <div class="card-body text-white">
                                        @if (isset($eleve->famille->nom_pere))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Nom père</span>
                                            <p>
                                                {{ strtoupper($eleve->famille->nom_pere)  }}
                                            </p>
                                        </div>
                                        @endif

                                        @if (isset($eleve->famille->num_tel_pere))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Numéro Téléphone père</span>
                                            <p>
                                                {{ $eleve->famille->num_tel_pere  }}
                                            </p>
                                        </div>
                                        @endif

                                        @if (isset($eleve->famille->nom_mere))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Nom mère</span>
                                            <p>
                                                {{ strtoupper($eleve->famille->nom_mere)  }}
                                            </p>
                                        </div>
                                        @endif

                                        @if (isset($eleve->famille->num_tel_mere))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Numéro Téléphone mère</span>
                                            <p>
                                                {{ $eleve->famille->num_tel_mere  }}
                                            </p>
                                        </div>
                                        @endif

                                        @if (isset($eleve->famille->domicile_famille))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Lieu de Résidence</span>
                                            <p>
                                                {{ ucwords($eleve->famille->domicile_famille)  }}
                                            </p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>

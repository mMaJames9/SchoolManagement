<x-app-layout>

    @section('styles')
    <link rel="stylesheet" href="{{ asset('css/wizard.css') }}">
    @endsection

    @section('scripts')
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.steps.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    @endsection

    <div class="page-title">
        <div class="row mb-3">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Création d'un nouvel élève</h3>
                <p class="text-subtitle text-muted">Veillez remplir tous les champs puis validez l'enregistrement</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">

            </div>
        </div>
    </div>

    <section class="section">

        <div class="card">
            <form class="form form-horizontal" method="POST" action="{{ route('eleves.store') }}" enctype="multipart/form-data">
                @csrf
                <div id="wizard" class="col-12 col-md-9">
                    <!-- SECTION 1 -->
                    <h4></h4>
                    <section>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="matricule_eleve">Matricule</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('matricule_eleve') is-invalid @enderror" placeholder="Matricule de l'eleve" id="matricule_eleve" name="matricule_eleve" readonly value="{{ 'FFM-'.now()->format('y').'A-'.mt_rand(1, 999) }}" required>

                                        @error('matricule_eleve')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nom_eleve">Nom</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('nom_eleve') is-invalid @enderror" placeholder="Nom de l'eleve" id="nom_eleve" name="nom_eleve" required autofocus>

                                        @error('nom_eleve')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="prenom_eleve">Prénom</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('prenom_eleve') is-invalid @enderror" placeholder="Prénom de l'eleve" id="prenom_eleve" name="prenom_eleve" required autofocus>

                                        @error('prenom_eleve')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="age_eleve">Age</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" class="form-control @error('age_eleve') is-invalid @enderror" id="age_eleve" min="2" max="20" name="age_eleve" placeholder="Age de l'eleve" required autofocus>

                                        @error('age_eleve')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sexe_eleve">Sexe</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sexe_eleve" id="sexe_eleve" value="0">
                                            <label class="form-check-label" for="sexe_eleve">
                                                Masculin
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sexe_eleve" id="sexe_eleve" value="1">
                                            <label class="form-check-label" for="sexe_eleve">
                                                Feminin
                                            </label>
                                        </div>

                                        @error('sexe_eleve')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="checkMaladie">Maladies héréditaires ?</label>
                                </div>
                                <div class="col-md-8">
                                    <div class='form-check mb-3'>
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkMaladie" class='form-check-input' name="checkMaladie">
                                            <label for="checkMaladie">Cochez si oui</label>
                                        </div>
                                    </div>

                                    <div class="form-group with-title mb-3">
                                        <textarea class="form-control @error('maladie_hereditaire') is-invalid @enderror" id="maladie_hereditaire" rows="3"></textarea>
                                        <label>Enumerez les maladies</label>

                                        @error('maladie_hereditaire')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="acte_naissance">Acte de naissance</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">

                                        <div class="checkbox">
                                            <input type="checkbox" id="acte_naissance" class='form-check-input' name="acte_naissance" value="Oui">
                                            <label for="acte_naissance">Cochez si acte de naissance fourni</label>
                                        </div>

                                        @error('acte_naissance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="classe_id">Classe</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select class="choices form-select @error('classe_id') is-invalid @enderror" id="classe_id" name="classe_id" required autofocus>
                                            <optgroup label="">
                                            <option selected disabled hidden>-- Selectionner le nom de la classe --</option>
                                            </optgroup>
                                            @foreach($sections as $key => $section)
                                            <optgroup label="{{ $section }}">
                                                @foreach($classes as $key => $classe)
                                                @if($section == $classe->nom_section)
                                                <option value="{{ $classe->id }}">{{ ucwords($classe->nom_classe) }}</option>
                                                @endif
                                                @endforeach
                                            </optgroup>
                                            @endforeach

                                        </select>

                                        @error('classe_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="fiche_renseignement">Fiche de renseignement</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">

                                        <div class="checkbox">
                                            <input type="checkbox" id="fiche_renseignement" class='form-check-input' name="fiche_renseignement" value="Oui">
                                            <label for="fiche_renseignement">Cochez si fiche de renseignement remplie</label>
                                        </div>

                                        @error('fiche_renseignement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="carnet_vaccination">Carnet de vaccination</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">

                                        <input type="file" accept=".doc, .dox, .pdf" class="form-control @error('carnet_vaccination') is-invalid @enderror" name="carnet_vaccination" required autofocus>

                                        @error('carnet_vaccination')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="photo_profil_eleve">Photo de profil</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">

                                        <input type="file" accept="image/png, image/jpeg" class="form-control @error('photo_profil_eleve') is-invalid @enderror" name="photo_profil_eleve" required autofocus>

                                        @error('photo_profil_eleve')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- SECTION 2 -->
                    <h4></h4>
                    <section>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="checkEcole">Ancienne école ?</label>
                                </div>
                                <div class="col-md-8">
                                    <div class='form-check mb-3'>
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkEcole" class='form-check-input' name="checkEcole">
                                            <label for="checkEcole">Cochez si oui</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nom_etablissement">Nom de l'établissement'</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('nom_etablissement') is-invalid @enderror" placeholder="Nom de l'établissement" id="nom_etablissement" name="nom_etablissement" required autofocus>

                                        @error('nom_etablissement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="bulletin_precedent">Bulletin de l'année dernière</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">

                                        <input type="file" accept="image/png, image/jpeg" class="form-control @error('bulletin_precedent') is-invalid @enderror" name="bulletin_precedent" required autofocus>

                                        @error('bulletin_precedent')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>

                    <!-- SECTION 3 -->
                    <h4></h4>
                    <section>
                        <div class="col-12 mb-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="checkParent">Parent déjà enregistré ?</label>
                                </div>
                                <div class="col-md-8">
                                    <div class='form-check mb-3'>
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkParent" class='form-check-input' name="checkParent">
                                            <label for="checkParent">Cochez si oui</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <select class="choices form-select @error('famille_id') is-invalid @enderror" id="famille_id" name="famille_id[]" required autofocus>
                                            <option selected disabled hidden>-- Selectionner le nom du parent --</option>
                                            @foreach($familles as $key => $famille)
                                            <option value="{{ $id }}">{{ ucwords($famille->nom_pere ?? $famille->nom_mere) }}</option>
                                            @endforeach

                                        </select>

                                        @error('famille_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="col-12 my-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="checkPere"></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-check mb-5">
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkPere" class='form-check-input' name="checkPere">
                                            <label for="checkPere">Enregistrer père</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control @error('nom_pere') is-invalid @enderror" placeholder="Nom du père" id="nom_pere" name="nom_pere" required autofocus>

                                        @error('nom_pere')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control @error('num_tel_pere') is-invalid @enderror"id="num_tel_pere" name="num_tel_pere" required autofocus>

                                        @error('num_tel_pere')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="col-12 my-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="checkMere"></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-check mb-5">
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkMere" class='form-check-input' name="checkMere">
                                            <label for="checkMere">Enregistrer mère</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control @error('nom_mere') is-invalid @enderror" placeholder="Nom de la mère" id="nom_mere" name="nom_mere" required autofocus>

                                        @error('nom_mere')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control @error('num_tel_mere') is-invalid @enderror"id="num_tel_mere" name="num_tel_mere" required autofocus>

                                        @error('num_tel_mere')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="col-12 my-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="domicile_famille">Domicile</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('domicile_famille') is-invalid @enderror" placeholder="Adresse du domicile" id="domicile_famille" name="domicile_famille" required autofocus>

                                        @error('domicile_famille')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </form>
        </div>


    </section>
</x-app-layout>

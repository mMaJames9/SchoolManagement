<div class="modal fade slide-right" id="paySalaire{{ $employe->id }}" tabindex="-1" role="dialog" aria-labelledby="paySalaire{{ $employe->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix">
                <span class="close fas fa-xmark fs-14 mt-2" data-dismiss="modal" aria-hidden="true"></span>
                <h4 class="p-b-5"><span class="semi-bold">Paiement</span> Salaire</h4>
            </div>
            <form class="form" method="POST" action="{{ route(isset($employe->nom_enseignant) ? "storeEnseignant" : "storePersonnel", [$employe->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p class="small-text mb-4">
                        <span>Paiement du salaire mensuel de {{ strtoupper($employe->nom_personnel ?? '' ) }}</span>
                        <br>
                        <span class="bold">Mois de {{ date('F Y') }}</span>
                    </p>

                    @if (isset($employe->matricule_enseignant))
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default required">
                                <label for="matricule_enseignant">Matricule</label>
                                <input type="text" class="form-control @error('matricule_enseignant') is-invalid @enderror" placeholder="Matricule de l'employe" id="matricule_enseignant" name="matricule_enseignant" readonly value="{{ old('matricule_enseignant', $employe->matricule_enseignant) }}" required>

                                @error('matricule_enseignant')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default required">
                                <label for="nom_employe">Nom</label>
                                <input type="text" class="form-control @error('nom_employe') is-invalid @enderror" placeholder="Nom de l'employe" readonly value="{{ old('nom_employe', isset($employe->nom_enseignant) ? $employe->nom_enseignant : $employe->nom_personnel) }}" id="nom_employe" name="nom_employe" required>

                                @error('nom_employe')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default required">
                                <label for="prenom_employe">Prénom</label>
                                <input type="text" class="form-control @error('prenom_employe') is-invalid @enderror" placeholder="Prénom de l'employe" readonly value="{{ old('prenom_employe', isset($employe->prenom_enseignant) ? $employe->prenom_enseignant : $employe->prenom_personnel) }}" id="prenom_employe" name="prenom_employe" required>

                                @error('prenom_employe')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default required">
                                <label for="montant_salaire">Salaire</label>
                                <input type="number" min="25" step="25" class="form-control @error('montant_salaire') is-invalid @enderror" placeholder="Salaire de l'employe" readonly value="{{ old('montant_salaire', $employe->salaire) }}" id="montant_salaire" name="montant_salaire" required>

                                @error('montant_salaire')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5 d-flex justify-content-end">
                        <button class="btn btn-info btn-cons" type="submit">
                            <span class="fa fa-hand-holding-dollar mr-2"></span>
                            <span>Valider le paiement</span>
                        </button>
                        <button type="reset" class="btn btn-cons">Effacer</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>

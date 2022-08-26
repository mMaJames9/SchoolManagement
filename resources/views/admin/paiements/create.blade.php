<div class="modal fade slide-right" id="payFrais{{ $eleve->id }}" tabindex="-1" role="dialog" aria-labelledby="payFrais{{ $eleve->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix">
                <span class="close fas fa-xmark fs-14 mt-2" data-dismiss="modal" aria-hidden="true"></span>
                <h4 class="p-b-5"><span class="semi-bold">Paiement</span> Scolarité</h4>
            </div>
            <form class="form" method="POST" action="{{ route('storePaiement', $eleve->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p class="small-text mb-4">
                        <span class="text-info">Montant restant : <span class="bold"></span></span>
                    </p>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default required">
                                <label for="matricule_eleve">Matricule</label>
                                <input type="text" class="form-control @error('matricule_eleve') is-invalid @enderror" placeholder="Matricule de l'eleve" id="matricule_eleve" name="matricule_eleve" readonly value="{{ old('matricule_eleve', $eleve->matricule_eleve) }}" required>

                                @error('matricule_eleve')
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
                                <label for="nom_eleve">Nom</label>
                                <input type="text" class="form-control @error('nom_eleve') is-invalid @enderror" placeholder="Nom de l'eleve" readonly value="{{ old('nom_eleve', $eleve->nom_eleve) }}" id="nom_eleve" name="nom_eleve" required>

                                @error('nom_eleve')
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
                                <label for="prenom_eleve">Prénom</label>
                                <input type="text" class="form-control @error('prenom_eleve') is-invalid @enderror" placeholder="Prénom de l'eleve" readonly value="{{ old('prenom_eleve', $eleve->prenom_eleve) }}" id="prenom_eleve" name="prenom_eleve" required>

                                @error('prenom_eleve')
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
                                <label for="montant_paiement">Montant versé</label>
                                <input type="number" min="25" step="25" class="form-control @error('montant_paiement') is-invalid @enderror" placeholder="Montant de la pension versé" id="montant_paiement" name="montant_paiement" required>

                                @error('montant_paiement')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer fixed-bottom">
                    <button class="btn btn-info btn-cons" type="submit">
                        <span class="fa fa-hand-holding-dollar mr-2"></span>
                        <span>Valider le paiement</span>
                    </button>
                    <button type="reset" class="btn btn-cons">Effacer</button>
                </div>
            </form>
            </div>
    </div>
</div>

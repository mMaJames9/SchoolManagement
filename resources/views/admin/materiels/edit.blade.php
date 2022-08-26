<div class="modal fade slide-right" id="editMateriel{{ $materiel->id }}" tabindex="-1" role="dialog" aria-labelledby="editMateriel{{ $materiel->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix">
                <span class="close fas fa-xmark fs-14 mt-2" data-dismiss="modal" aria-hidden="true"></span>
                <h4 class="p-b-5"><span class="semi-bold">Mise à jour</h4>
            </div>
            <form class="form" method="POST" action="{{ route("materiels.update", [$materiel->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <p class="small-text">Mettez à jour les informations de cette matière en modifiant les informations correspondantes dans le formulaire ci-dessous.</p>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default required">
                                <label for="nom_materiel">Nom du matériel</label>
                                <input type="text" class="form-control @error('nom_materiel') is-invalid @enderror" placeholder="Nom du matériel" value="{{ old('nom_materiel', $materiel->nom_materiel) }}" id="nom_materiel" name="nom_materiel" required>

                                @error('nom_materiel')
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
                                <label for="date_achat">Date d'achat</label>
                                <input type="date" class="form-control @error('date_achat') is-invalid @enderror" placeholder="Date d'achat du matériel" value="{{ old('date_achat', $materiel->date_achat) }}" id="date_achat" name="date_achat" required>

                                @error('date_achat')
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
                                <label for="prix_materiel">Prix</label>
                                <input type="number" min="25" step="25" class="form-control @error('prix_materiel') is-invalid @enderror" placeholder="Prix du matériel" value="{{ old('prix_materiel', $materiel->prix_materiel) }}" id="prix_materiel" name="prix_materiel" required>

                                @error('prix_materiel')
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
                                <label for="destination">Destination</label>
                                <input type="text" class="form-control @error('destination') is-invalid @enderror" placeholder="Destination du matériel" value="{{ old('destination', $materiel->destination) }}" id="destination" name="destination" required>

                                @error('destination')
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
                                <label for="date_prochain_achat">Date du prochain achat</label>
                                <input type="date" class="form-control @error('date_prochain_achat') is-invalid @enderror" placeholder="Date du prichain achat du matériel" id="date_prochain_achat" name="date_prochain_achat" value="{{ old('date_prochain_achat', $materiel->date_prochain_achat) }}" required>

                                @error('date_prochain_achat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer fixed-bottom">
                    <button type="submit" class="btn btn-primary btn-cons">Valider</button>
                    <button type="reset" class="btn btn-cons">Effacer</button>
                </div>
            </form>
        </div>
    </div>
</div>

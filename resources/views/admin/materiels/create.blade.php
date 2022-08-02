<div class="modal fade text-left" id="createEnseignant" tabindex="-1" role="dialog" aria-labelledby="myModalCreateEnseignant" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalCreateEnseignant">Formulaire de création</h4>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x"></i>
                </button>
            </div>
            <form class="form form-horizontal" method="POST" action="{{ route('materiels.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nom_materiel">Nom du matériel</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('nom_materiel') is-invalid @enderror" placeholder="Nom du materiel" id="nom_materiel" name="nom_materiel" required autofocus>

                                        @error('nom_materiel')
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
                                    <label for="date_achat">Date d'achat</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="date" class="form-control @error('date_achat') is-invalid @enderror" placeholder="Date d'achat du materiel" id="date_achat" name="date_achat" required autofocus>

                                        @error('date_achat')
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
                                    <label for="prix_materiel">Prix du matériel</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" class="form-control @error('prix_materiel') is-invalid @enderror" id="prix_materiel" name="prix_materiel" placeholder="prix du materiel" required autofocus>

                                        @error('prix_materiel')
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
                                    <label for="destination">Destination</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('destination') is-invalid @enderror" placeholder="Destination du materiel" id="destination" name="destination" required autofocus>

                                        @error('destination')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-secondary">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Annuler</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Valider l'ajout</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

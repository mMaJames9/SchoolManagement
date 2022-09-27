<div class="modal fade slide-right" id="editFamille{{ $famille->id }}" tabindex="-1" role="dialog" aria-labelledby="editFamille{{ $famille->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix">
                <span class="close fas fa-xmark fs-14 mt-2" data-dismiss="modal" aria-hidden="true"></span>
                <h4 class="p-b-5"><span class="semi-bold">Mise à jour</h4>
            </div>
            <form class="form" method="POST" action="{{ route("familles.update", [$famille->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <p class="small-text">Mettez à jour les informations de cette famille en modifiant les informations correspondantes dans le formulaire ci-dessous.</p>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="checkbox check-primary">
                                    <input type="checkbox" value="1" {{ $famille->nom_pere == null ? '' : 'checked' }} id="checkPere" name="checkPere" class="@error('checkPere') is-invalid @enderror">
                                    <label for="checkPere">Mettre à jour père</label>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="nom_pere">Nom du père</label>
                                <input type="text" class="form-control @error('nom_pere') is-invalid @enderror" placeholder="Nom du père" value="{{ old('nom_pere', $famille->nom_pere) }}" id="nom_pere" name="nom_pere" {{ $famille->nom_pere == null ? 'disabled' : '' }} >

                                @error('nom_pere')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="num_tel_pere">Numéro téléphone du père</label>
                                <input type="text" class="form-control @error('num_tel_pere') is-invalid @enderror" placeholder="Numéro de téléphone du père" value="{{ old('num_tel_pere', $famille->num_tel_pere) }}" id="num_tel_pere" name="num_tel_pere" data-inputmask-alias="+237 699 999 999" {{ $famille->num_tel_pere == null ? 'disabled' : '' }}>

                                @error('num_tel_pere')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="checkbox check-primary">
                                    <input type="checkbox" value="1" {{ $famille->nom_mere == null ? '' : 'checked' }}  id="checkMere" name="checkMere" class="@error('checkMere') is-invalid @enderror">
                                    <label for="checkMere">Mettre à jour mère</label>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="nom_mere">Nom de la mère</label>
                                <input type="text" class="form-control @error('nom_mere') is-invalid @enderror" placeholder="Nom de la mère" value="{{ old('nom_mere', $famille->nom_mere) }}" id="nom_mere" name="nom_mere" {{ $famille->nom_mere == null ? 'disabled' : '' }}>

                                @error('nom_mere')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="num_tel_mere">Numéro téléphone de la mère</label>
                                <input type="text" class="form-control @error('num_tel_mere') is-invalid @enderror" placeholder="Numéro de téléphone de la mère" value="{{ old('num_tel_mere', $famille->num_tel_mere) }}" id="num_tel_mere" name="num_tel_mere" data-inputmask-alias="+237 699 999 999" {{ $famille->num_tel_mere == null ? 'disabled' : '' }}>

                                @error('num_tel_mere')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default required">
                                <label for="domicile_famille">Lieu de Résidence</label>
                                <input type="text" class="form-control @error('domicile_famille') is-invalid @enderror" placeholder="Lieu de résidence de l'élève" value="{{ old('domicile_famille', $famille->domicile_famille) }}" id="domicile_famille" name="domicile_famille" required>

                                @error('domicile_famille')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row mt-5">
                    <button type="submit" class="btn btn-primary btn-cons">Valider</button>
                    <button type="reset" class="btn btn-cons">Effacer</button>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade stick-up" id="editClasse{{ $classe->id }}" tabindex="-1" role="dialog" aria-labelledby="editClasse{{ $classe->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix">
                <span class="close fas fa-xmark fs-14 mt-2" data-dismiss="modal" aria-hidden="true"></span>
                <h4 class="p-b-5"><span class="semi-bold">Mise à jour</h4>
            </div>
            <form class="form" method="POST" action="{{ route("classes.update", [$classe->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <p class="small-text">Affecter un enseignant à la classe {{ strtoupper($classe->nom_classe ?? '' ) }}.</p>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default form-group-default-select2 required">
                                <label for="enseignant_id">Enseignant</label>
                                <select class="full-width @error('enseignant_id') is-invalid @enderror" data-placeholder="Selectionner le nom de l'enseignant" data-init-plugin="select2" name="enseignant_id" required>
                                    <option disabled selected hidden>Selectionner le nom de l'enseignant</option>
                                    @foreach($enseignants as $id => $enseignant)
                                    <option value="{{ $id }}" {{ ($classe->enseignant ? $classe->enseignant->id : old('enseignant_id')) == $id ? 'selected' : '' }}>{{ ucwords($enseignant) }}</option>
                                    @endforeach
                                </select>
                                @error('enseignant_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-cons">Valider</button>
                    <button type="reset" class="btn btn-cons">Effacer</button>
                </div>
            </form>
            </div>
    </div>
</div>

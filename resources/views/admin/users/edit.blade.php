<div class="modal fade stick-up" id="editUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editUser{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix">
                <span class="close fas fa-xmark fs-14 mt-2" data-dismiss="modal" aria-hidden="true"></span>
                <h4 class="p-b-5"><span class="semi-bold">Mise à jour</h4>
            </div>
            <form class="form" method="POST" action="{{ route("users.update", [$user->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <p class="small-text">Mise à jour du rôle de {{ strtoupper($user->personnel->nom_personnel ?? '' ) }}.</p>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default form-group-default-select2 required">
                                <label for="roles">Rôle</label>
                                <select class="full-width" data-placeholder="Selectionner le rôle de cet utilisateur" data-init-plugin="select2" name="roles[]" required>
                                    <option disabled selected hidden>Selectionner le rôle de cet utilisateur</option>
                                    @foreach($roles as $id => $role)
                                    @if ($role !== 'Fondateur')
                                    <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $role }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-cons">Valider</button>
                        <button type="reset" class="btn btn-cons">Effacer</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

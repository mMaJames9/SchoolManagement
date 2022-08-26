<div class="modal fade slide-right" id="addNewUser" tabindex="-1" role="dialog" aria-labelledby="addNewUser" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix">
                <span class="close fas fa-xmark fs-14 mt-2" data-dismiss="modal" aria-hidden="true"></span>
                <h4 class="p-b-5"><span class="semi-bold">Nouvel</span> Utilisateur</h4>
            </div>
            <form class="form" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p class="small-text">Créer un nouvel utilisateur en remplissant tous les champs de ce formulaire</p>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default form-group-default-select2 required">
                                <label for="personnel_id">Personnel</label>
                                <select class="full-width" data-placeholder="Selectionner le nom du personnel" data-init-plugin="select2" name="personnel_id" required autofocus>
                                    <option disabled selected hidden>Selectionner le nom du personnel</option>
                                    @foreach($personnels as $id => $personnel)
                                    <option value="{{ $id }}">{{ strtoupper($personnel) }}</option>
                                    @endforeach
                                </select>
                                @error('personnel_id')
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
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email de l'utilisateur" id="email" name="email" required>

                                @error('email')
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
                                <label for="password">Mot de Passe</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Mot de passe de l'utilisateur" required>

                                @error('password')
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
                                <label for="password_confirmation">Confirmer Mot de Passe</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Mot de passe de l'utilisateur" required>

                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default form-group-default-select2 required">
                                <label for="roles">Rôle</label>
                                <select class="full-width" data-placeholder="Selectionner le rôle de cet utilisateur" data-init-plugin="select2" name="roles[]" required>
                                    <option disabled selected hidden>Selectionner le rôle de cet utilisateur</option>
                                    @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
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

                </div>

                <div class="modal-footer fixed-bottom">
                    <button type="submit" class="btn btn-primary btn-cons">Valider</button>
                    <button type="reset" class="btn btn-cons">Effacer</button>
                </div>
            </form>
            </div>
    </div>
</div>

<div class="modal fade text-left" id="createUser" tabindex="-1" role="dialog" aria-labelledby="myModalCreateUser" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalCreateUser">Formulaire de création</h4>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x"></i>
                </button>
            </div>
            <form class="form form-horizontal" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name">Nom</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nom de l'utilisateur" id="name" name="name" required autofocus>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person bi-middle"></i>
                                            </div>
                                        </div>

                                        @error('name')
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
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email de l'utilisateur" id="email" name="email" required autofocus>
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope bi-middle"></i>
                                            </div>
                                        </div>

                                        @error('email')
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
                                    <label for="password">Mot de Passe</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Mot de passe de l'utilisateur" required autofocus>
                                            <div class="form-control-icon">
                                                <i class="bi bi-lock bi-middle"></i>
                                            </div>
                                        </div>

                                        @error('password')
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
                                    <label for="password_confirmation">Confirmer Mot de Passe</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirmer votre Mot de Passe" required autofocus>
                                            <div class="form-control-icon">
                                                <i class="bi bi-lock bi-middle"></i>
                                            </div>
                                        </div>

                                        @error('password_confirmation')
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
                                    <label for="roles">Rôle de l'utilisateur</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select class="form-select @error('roles') is-invalid @enderror" id="roles" name="roles[]" required autofocus>
                                            <div class="form-control-icon">
                                                <i class="bi bi-lock bi-middle"></i>
                                            </div>
                                            <option selected disabled hidden>-- Selectionner le rôle de cet utilisateur --</option>
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

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-secondary">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Annuler</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Valider la création</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

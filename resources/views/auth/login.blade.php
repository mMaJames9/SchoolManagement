<x-guest-layout>
    <div class="login-wrapper ">

        <div class="bg-pic">

            <img src="{{ asset('assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg') }}" data-src="{{ asset('assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg') }}" data-src-retina="{{ asset('assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg') }}" alt="" class="lazy">
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="login-container bg-white">
            <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
                <img src="{{ asset('assets/img/logo.png') }}" alt="logo" width="70%">
                <p class="p-t-35">Connectez-vous à votre compte pour pouvoir utiliser l'application</p>

                <form id="form-login" class="p-t-15" role="form" method="POST" action="{{ route('login') }}">
                @csrf

                    <div class="form-group form-group-default">
                        <label for="email">Email</label>
                        <div class="controls">
                            <input id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="Email de l'utilisateur" class="form-control @error('email') is-invalid @enderror">

                            @error('matricule_eleve')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group form-group-default">
                        <label for="password">Mot de passe</label>
                        <div class="controls">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" placeholder="Sasir votre mot de passe">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 no-padding sm-p-l-10">
                            <div class="checkbox ">
                                <input id="remember_me" type="checkbox" name="remember" class="@error('remember') is-invalid @enderror">
                                <label for="remember_me">Me garder connecté</label>

                                @error('remember')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-end">
                            <a href="mailto:anthonymisse85@gmail.com" class="text-info small">Besoin d'aide? Contacter le service maintenance</a>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-cons m-t-10" type="submit">Se connecter</button>
                </form>
            </div>
        </div>
    </div>

    <div class="overlay hide" data-pages="search">

        <div class="overlay-content has-results m-t-20">

            <div class="container-fluid">

                <img class="overlay-brand" src="{{ asset('assets/img/logo.png') }}" alt="logo" data-src="{{ asset('assets/img/logo.png" data-src-retina="assets/img/logo_2x.png') }}" width="78" height="22">

                <a href="#" class="close-icon-light overlay-close text-black fs-16">
                    <i class="pg-close"></i>
                </a>

            </div>

            <div class="container-fluid">

                <input id="overlay-search" class="no-border overlay-search bg-transparent" placeholder="Search..." autocomplete="off" spellcheck="false">
                <br>
                <div class="inline-block">
                    <div class="checkbox right">
                        <input id="checkboxn" type="checkbox" value="1" checked="checked">
                        <label for="checkboxn"><i class="fa fa-search"></i> Search within page</label>
                    </div>
                </div>
                <div class="inline-block m-l-10">
                    <p class="fs-13">Press enter to search</p>
                </div>

            </div>

            <div class="container-fluid">
                <span>
                    <strong>suggestions :</strong>
                </span>
                <span id="overlay-suggestions"></span>
                <br>
                <div class="search-results m-t-40">
                    <p class="bold">Pages Search Results</p>
                    <div class="row">
                        <div class="col-md-6">

                            <div class="">

                                <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                    <div>
                                        <img width="50" height="50" src="{{ asset('assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg') }}" data-src-retina="{{ asset('assets/img/profiles/avatar2x.jpg') }}" alt="">
                                    </div>
                                </div>

                                <div class="p-l-10 inline p-t-5">
                                    <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on pages</h5>
                                    <p class="hint-text">via john smith</p>
                                </div>
                            </div>

                            <div class="">

                                <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                    <div>T</div>
                                </div>

                                <div class="p-l-10 inline p-t-5">
                                    <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> related topics</h5>
                                    <p class="hint-text">via pages</p>
                                </div>
                            </div>

                            <div class="">

                                <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                    <div><i class="fa fa-headphones large-text "></i>
                                    </div>
                                </div>

                                <div class="p-l-10 inline p-t-5">
                                    <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> music</h5>
                                    <p class="hint-text">via pagesmix</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="">

                                <div class="thumbnail-wrapper d48 circular bg-info text-white inline m-t-10">
                                    <div><i class="fa fa-facebook large-text "></i>
                                    </div>
                                </div>

                                <div class="p-l-10 inline p-t-5">
                                    <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on facebook</h5>
                                    <p class="hint-text">via facebook</p>
                                </div>
                            </div>

                            <div class="">

                                <div class="thumbnail-wrapper d48 circular bg-complete text-white inline m-t-10">
                                    <div><i class="fa fa-twitter large-text "></i>
                                    </div>
                                </div>

                                <div class="p-l-10 inline p-t-5">
                                    <h5 class="m-b-5">Tweats on<span class="semi-bold result-name"> ice cream</span></h5>
                                    <p class="hint-text">via twitter</p>
                                </div>
                            </div>

                            <div class="">

                                <div class="thumbnail-wrapper d48 circular text-white bg-danger inline m-t-10">
                                    <div><i class="fa fa-google-plus large-text "></i>
                                    </div>
                                </div>

                                <div class="p-l-10 inline p-t-5">
                                    <h5 class="m-b-5">Circles on<span class="semi-bold result-name"> ice cream</span></h5>
                                    <p class="hint-text">via google plus</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-guest-layout>

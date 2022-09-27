<div class="header ">
    <a href="#" class="btn-link toggle-sidebar d-lg-none pg pg-menu" data-toggle="sidebar">
    </a>

    <div class="w-40">
        <div class="brand inline m-l-10 ">
            <img class="w-100 mw-100" src="{{ asset('assets/img/logo.png') }}" alt="logo" data-src="{{ asset('assets/img/logo.png') }}">
        </div>
    </div>

    <div class="d-flex align-items-center">

        <div class="pull-left p-r-10 fs-14 font-heading d-lg-block d-none text-right">
            <span class="semi-bold">{{ ucwords(Auth::user()->personnel->nom_personnel) }}</span>
        </div>
        <div class="dropdown pull-right d-lg-block d-none">
            <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline">
                    <img src="{{ asset('storage/uploads/profiles/personnels/'.Auth::user()->personnel->photo_profil_personnel) }}" alt="" data-src="{{ asset('storage/uploads/profiles/personnels/'.Auth::user()->personnel->photo_profil_personnel) }}" width="40" height="40">
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="clearfix dropdown-item mb-2">
                    <span class="fas fa-power-off mr-2"></span>
                    <span>Déconnexion</span>
                </a>

                <form class="form d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </div>

    </div>
</div>

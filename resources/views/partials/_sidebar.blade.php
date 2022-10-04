<nav class="page-sidebar" data-pages="sidebar">

    <div class="sidebar-header">
        <img src="{{ asset('assets/img/logo_white.png') }}" alt="logo" class="brand" data-src="{{ asset('assets/img/logo_white.png') }}" data-src-retina="{{ asset('assets/img/logo_white_2x.png') }}" width="50%">
        <div class="sidebar-header-controls">
            <button type="button" class="btn btn-link d-lg-inline-block d-xlg-inline-block d-md-inline-block d-sm-none d-none" data-toggle-pin="sidebar">
                <i class="fa fs-12"></i>
            </button>
        </div>
    </div>

    <div class="sidebar-menu">
        <ul class="menu-items">
            <li class="m-t-30 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <span class="fas fa-home mr-2"></span>
                    <span>Accueil</span>
                </a>
            </li>

            @can('personnel_access')
            <li class="pl-4 my-3">
                <span class="title text-uppercase">Gestion du Personnel</span>
            </li>
            @endcan

            @can('user_access')
            <li class="{{ request()->routeIs('users*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}">
                    <span class="fas fa-user mr-2"></span>
                    <span>Utilisateurs</span>
                </a>
            </li>
            @endcan

            @can('personnel_access')
            <li class="{{ request()->routeIs('personnels*') ? 'active' : '' }}">
                <a href="{{ route('personnels.index') }}">
                    <span class="fas fa-user-cog mr-2"></span>
                    <span>Personnel</span>
                </a>
            </li>
            @endcan

            @can('enseignant_access')
            <li class="{{ request()->routeIs('enseignants*') ? 'active' : '' }}">
                <a href="{{ route('enseignants.index') }}">
                    <span class="fas fa-chalkboard-teacher mr-2"></span>
                    <span>Enseignants</span>
                </a>
            </li>
            @endcan


            <li class="pl-4 my-3">
                <span class="title text-uppercase">Gestion des élèves</span>
            </li>

            @can('eleve_access')
            <li class="{{ request()->routeIs('eleves*') ? 'active' : '' }}">
                <a href="{{ route('eleves.index') }}">
                    <span class="fas fa-user-graduate mr-2"></span>
                    <span>Eleves</span>
                </a>
            </li>
            @endcan

            @can('famille_access')
            <li class="{{ request()->routeIs('familles*') ? 'active' : '' }}">
                <a href="{{ route('familles.index') }}">
                    <span class="fas fa-people-group mr-2"></span>
                    <span>Parents</span>
                </a>
            </li>
            @endcan

            @can('classe_access')
            <li class="pl-4 my-3">
                <span class="title text-uppercase">Gestion de l'école</span>
            </li>

            <li class="{{ request()->routeIs('classes*') ? 'active' : '' }}">
                <a href="{{ route('classes.index') }}">
                    <span class="fas fa-th mr-2"></span>
                    <span>Classes</span>
                </a>
            </li>
            @endcan

            @can('matiere_access')
            <li class="{{ request()->routeIs('matieres*') ? 'active' : '' }}">
                <a href="{{ route('matieres.index') }}">
                    <span class="fas fa-bookmark mr-2"></span>
                    <span>Matieres</span>
                </a>
            </li>
            @endcan

            @can('bulletin_access')
            <li class="{{ request()->routeIs('bulletins*') ? 'active' : '' }}">
                <a href="{{ route('bulletins.index') }}">
                    <span class="fas fa-file-invoice mr-2"></span>
                    <span>Bulletins</span>
                </a>
            </li>
            @endcan

            @can('paiement_access')
            <li class="pl-4 my-3">
                <span class="title text-uppercase">Gestion des Finances</span>
            </li>

            <li class="{{ request()->routeIs('paiements*') ? 'active' : '' }}">
                <a href="{{ route('paiements.index') }}">
                    <span class="fas fa-piggy-bank mr-2"></span>
                    <span>Scolarité</span>
                </a>
            </li>
            @endcan

            @can('salaire_access')
            <li class="{{ request()->routeIs('salaires*') ? 'active' : '' }}">
                <a href="{{ route('salaires.index') }}">
                    <span class="fas fa-wallet mr-2"></span>
                    <span>Salaires</span>
                </a>
            </li>
            @endcan

            @can('materiel_access')
            <li class="pl-4 my-3">
                <span class="title text-uppercase">Gestion du Stock</span>
            </li>

            <li class="{{ request()->routeIs('materiels*') ? 'active' : '' }}">
                <a href="{{ route('materiels.index') }}">
                    <span class="fas fa-pen-ruler mr-2"></span>
                    <span>Matériels</span>
                </a>
            </li>
            @endcan

            @can('stock_access')
            <li class="{{ request()->routeIs('stocks*') ? 'active' : '' }}">
                <a href="{{ route('stocks.index') }}">
                    <span class="fas fa-cubes mr-2"></span>
                    <span>Stocks</span>
                </a>
            </li>
            @endcan

            @can('transaction_access')
            <li class="{{ request()->routeIs('transactions*') ? 'active' : '' }}">
                <a href="{{ route('transactions.index') }}">
                    <span class="fas fa-arrow-right-arrow-left mr-2"></span>
                    <span>Transactions</span>
                </a>
            </li>
            @endcan

        </ul>
        <div class="clearfix"></div>
    </div>

</nav>

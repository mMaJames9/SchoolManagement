<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }} ">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Accueil</span>
                    </a>
                </li>

                <li class="sidebar-title text-uppercase fw-light">Gestion du personnel</li>

                <li class="sidebar-item {{ request()->is('admin/staffmanagement/users') || request()->is('admin/staffmanagement/users/*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Utilisateurs</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('admin/staffmanagement/enseignants') || request()->is('admin/staffmanagement/enseignants/*') ? 'active' : '' }}">
                    <a href="{{ route('enseignants.index') }}" class='sidebar-link'>
                        <i class="bi bi-microsoft-teams"></i>
                        <span>Enseignants</span>
                    </a>
                </li>

                <li class="sidebar-title text-uppercase fw-light">Gestion des élèves</li>

                <li class="sidebar-item {{ request()->is('admin/studentmanagement/eleves') || request()->is('admin/studentmanagement/eleves/*') ? 'active' : '' }}">
                    <a href="{{ route('eleves.index') }}" class='sidebar-link'>
                        <i class="bi bi-mortarboard-fill"></i>
                        <span>Elèves</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('admin/studentmanagement/familles') || request()->is('admin/studentmanagement/familles/*') ? 'active' : '' }}">
                    <a href="{{ route('familles.index') }}" class='sidebar-link'>
                        <i class="bi bi-universal-access"></i>
                        <span>Parents</span>
                    </a>
                </li>

                <li class="sidebar-title text-uppercase fw-light">Gestion de l'école</li>

                <li class="sidebar-item {{ request()->is('admin/schoolmanagement/classes') || request()->is('admin/schoolmanagement/classes/*') ? 'active' : '' }}">
                    <a href="{{ route('classes.index') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Classes</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('admin/schoolmanagement/matieres') || request()->is('admin/schoolmanagement/matieres/*') ? 'active' : '' }}">
                    <a href="{{ route('matieres.index') }}" class='sidebar-link'>
                        <i class="bi bi-book-fill"></i>
                        <span>Matières</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('admin/schoolmanagement/bulletins') || request()->is('admin/schoolmanagement/bulletins/*') ? 'active' : '' }}">
                    <a href="{{ route('bulletins.index') }}" class='sidebar-link'>
                        <i class="bi bi-receipt"></i>
                        <span>Bulletins</span>
                    </a>
                </li>

                <li class="sidebar-title text-uppercase fw-light">Gestion des finances</li>

                <li class="sidebar-item {{ request()->is('admin/financemanagement/frais') || request()->is('admin/financemanagement/frais/*') ? 'active' : '' }}">
                    <a href="{{ route('frais.index') }}" class='sidebar-link'>
                        <i class="bi bi-bank2"></i>
                        <span>Scolarité</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('admin/financemanagement/salaires') || request()->is('admin/financemanagement/salaires/*') ? 'active' : '' }}">
                    <a href="{{ route('salaires.index') }}" class='sidebar-link'>
                        <i class="bi bi-wallet2"></i>
                        <span>Salaires</span>
                    </a>
                </li>

                <li class="sidebar-title text-uppercase fw-light">Gestion des stocks</li>

                <li class="sidebar-item {{ request()->is('admin/stockmanagement/materiels') || request()->is('admin/stockmanagement/materiels/*') ? 'active' : '' }}">
                    <a href="{{ route('materiels.index') }}" class='sidebar-link'>
                        <i class="bi bi-pass-fill"></i>
                        <span>Matériels</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('admin/stockmanagement/stocks') || request()->is('admin/stockmanagement/stocks/*') ? 'active' : '' }}">
                    <a href="{{ route('stocks.index') }}" class='sidebar-link'>
                        <i class="bi bi-box-seam-fill"></i>
                        <span>Stocks</span>
                    </a>
                </li>


            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

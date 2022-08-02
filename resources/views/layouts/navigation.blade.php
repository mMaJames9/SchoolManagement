<nav class="navbar navbar-expand navbar-light ">
    <div class="container-fluid">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                
            </ul>
            <div class="dropdown">
                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-menu d-flex">
                        <div class="user-name text-end me-3">
                            <h6 class="mb-0 text-gray-600">{{ Auth::user()->name }}</h6>
                            <p class="mb-0 text-sm text-gray-600">
                                @foreach(Auth::user()->roles as $key => $item)
                                    {{ $item->name }}
                                @endforeach
                            </p>
                        </div>
                        <div class="user-img d-flex align-items-center">
                            <div class="avatar avatar-md">
                                @role('Fondateur')
                                <img src="{{ asset('assets/images/faces/1.jpg') }}">
                                @endrole
                                @role('Directeur')
                                <img src="{{ asset('assets/images/faces/2.jpg') }}">
                                @endrole
                                @role('Econome')
                                <img src="{{ asset('assets/images/faces/3.jpg') }}">
                                @endrole
                                @role('Secretaire')
                                <img src="{{ asset('assets/images/faces/4.jpg') }}">
                                @endrole
                            </div>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="icon-mid bi bi-box-arrow-left me-2"></i>Se Déconnecter</a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

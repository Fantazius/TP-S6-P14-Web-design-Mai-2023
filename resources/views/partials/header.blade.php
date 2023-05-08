<div class="header py-4">
    <div class="container">
        <div class="d-flex">
            <a class="header-brand" href="{{ route('articles.index') }}">
                <img src="{{ asset('assets/images/ia.png') }}" class="header-brand-img" alt="tabler logo">
                AI-nformation
            </a>
            @if (Auth::check())
                <div class="d-flex order-lg-2 ml-auto">
                    <div class="dropdown">
                        {{-- <div class="nav-link pr-0 leading-none" data-toggle="dropdown"> --}}
                            {{-- <span class="avatar" style="background-image: url({{ asset('assets/images/images-utilisateur.png') }})"></span> --}}
                            <a class="nav-link pr-0 leading-none" href="{{ route('user.articles') }}">
                                <img src="{{ asset('assets/images/images-utilisateur.png') }}" alt="photo de profil">
                                <span class="ml-2 d-none d-lg-block">
                                    <span class="text-default">{{ Auth::user()->prenoms . ' ' . Auth::user()->nom }}</span>
                                    <small class="text-muted d-block mt-1">{{ Auth::user()->pseudonyme }}</small>
                                </span>
                            </a>
                        {{-- </div> --}}
                    </div>
                </div>
            @endif
            <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse"
                data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
            </a>
        </div>
    </div>
</div>

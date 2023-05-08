@extends('backoffice.layout.layout')
@section('content')
    <div class="page-header">
        <h1 class="page-title">
            Tous mes articles
        </h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            {{ session('success') }}
        </div>
    @endif

    <div class="row row-cards row-deck">
        @foreach ($articles as $article)
            <div class="col-lg-4">
                <div class="card card-aside">
                    <div class="card-aside-column" style="background-image: url({{ $article->illustration }})"></div>
                    <div class="card-body d-flex flex-column">
                            <a href="{{ route('articles.show', ['article' => $article->idarticle]) }}">
                            <h4>{{ $article->titre }}</h4>
                            </a>
                            <div class="text-muted summary">
                                {{ $article->summary }}
                            </div>
                            <div class="d-flex align-items-center pt-5 mt-auto">
                                <div>
                                    <p class="text-default">{{ $auteur->getAuteurName() }}</p>
                                    <small class="d-block text-muted">{{ $article->datepublication }}</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('articles.edit', $article->idarticle) }}"><button
                                            class="btn btn-orange">Modifier ou supprimer</button> </a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        @endforeach
        <br>
    </div>
    {{ $articles->links('pagination::bootstrap-4') }}
@endsection

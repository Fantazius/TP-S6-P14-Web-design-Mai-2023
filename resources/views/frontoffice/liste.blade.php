@extends('layout.layout')
@section('content')
    <div class="page-header">
        <h1 class="page-title">
            Tous les articles
        </h1>
    </div>

    <div class="row row-cards row-deck">
        @foreach ($articles as $article)
            <div class="col-lg-4">
                <a href="{{ route('articles.seo',["slug"=>$article->getSlug(),"article"=>$article->idarticle]) }}">
                    <div class="card card-aside">
                        <div class="card-aside-column" style="background-image: url({{ $article->illustration }})"></div>
                        <div class="card-body d-flex flex-column">
                            <h4>{{ $article->titre }}</h4>
                            <div class="text-muted summary">
                                {{ $article->summary }}
                            </div>
                            <div class="d-flex align-items-center pt-5 mt-auto">
                                <div>
                                    <p class="text-default">{{ $article->categorie }}</p>
                                    <small class="d-block text-muted">{{ $article->getDatePublication() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    {{ $articles->appends(['keyword'=>request('keyword')])->links('pagination::bootstrap-4') }}
@endsection

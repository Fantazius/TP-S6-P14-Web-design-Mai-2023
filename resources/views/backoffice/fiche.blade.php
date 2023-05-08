@extends('backoffice.layout.layout')
@section('meta')
<meta name="description" content="{{ $article->titre }}"/>
@endsection
@section('title')
{{ $article->titre }}
@endsection
@section('content')
    <div class="row">
        <div class="offset-lg-1 col-lg-10">
            <div class="card">
                <div class="card-body">
                    <div class="text-wrap p-lg-6">
                        <h3 class="category-title">{{ $article->categorie }}</h3>
                        <h1 class="mt-0 mb-4">{{ $article->titre }}</h1>
                        <p class="summary">{{ $article->summary }}</p>

                        <p class="publish">Par {{ $article->getAuteurName() }}
                        <br>
                        Publié le {{ $article->getDatePublication() }}
                        </p>

                        <img src="{{ $article->illustration }}" alt="{{ $article->getAlt() }}" width="500">

                        <div id="content">
                            <?php echo $article->contenu ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

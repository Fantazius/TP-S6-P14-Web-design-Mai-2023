@extends('backoffice.layout.layout')

@section('assets')
    <script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <div class="page-header">
        <h1 class="page-title">
            Suppression d'un article
        </h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Supprimer l'article</h3>
                    <form action="{{ route('articles.destroy') }}" method="post" id="form_delete">
                        @csrf
                        <input type="hidden" name="idarticle" value="{{ $article->idarticle }}">
                        <button type="submit" class="btn btn-red">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="page-header">
        <h1 class="page-title">
            Modification d'un article
        </h1>
    </div>
    <div class="row row-cards row-deck">
        <div class="col-12">
            <form class="card" method="post" action="{{ route('articles.update') }}">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="hidden" name="idarticle" value="{{ $article->idarticle }}">
                <div class="card-body">
                    <h3 class="card-title">Modifier aricle</h3>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Titre</label>
                                <input type="text" class="form-control" placeholder="Titre..." name="titre"
                                    value="{{ $article->titre }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Catégorie</label>
                                <select class="form-control custom-select" name="idcategorie" required>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->idcategorie }}"
                                            @if ($article->idcategorie == $categorie->idcategorie) @selected(true) @endif>
                                            {{ $categorie->categorie }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Illustration</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imagefile" accept="image/*">
                                    <label class="custom-file-label">Choisissez une photo</label>
                                </div>
                                <div id="wrapper">
                                    <img src="{{ $article->illustration }}" alt="" srcset="">
                                </div>
                                <input type="hidden" name="illustration" id="visuel"
                                    value="{{ $article->illustration }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <label class="form-label">Résumé</label>
                                <textarea rows="5" class="form-control" placeholder="Résumé..." name="summary" required>{{ $article->summary }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <label class="form-label">Contenu</label>
                                <textarea name="contenu" id="contenu">{{ $article->contenu }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <input type="submit" class="btn btn-success" value="Modifier">
                </div>
            </form>
        </div>
    </div>
    <script>
        CKEDITOR.replace('contenu');
    </script>
    <script src="{{ asset('assets/js/base64.js') }}"></script>
    <script src="{{ asset('assets/js/delete.js') }}"></script>
@endsection

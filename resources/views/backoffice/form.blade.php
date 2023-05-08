@extends('backoffice.layout.layout')

@section('assets')
    <script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <div class="page-header">
        <h1 class="page-title">
            Ajout d'un article
        </h1>
    </div>

    <div class="row row-cards row-deck">
        <div class="col-12">
            <form class="card" method="POST" action="{{ route('articles.store') }}">
                @csrf
                <div class="card-body">
                    <h3 class="card-title">Nouvel article</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Titre</label>
                                <input type="text" class="form-control" placeholder="Titre..." name="titre" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Catégorie</label>
                                <select class="form-control custom-select" name="idcategorie" required>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->idcategorie }}">{{ $categorie->categorie }}</option>
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
                                </div>
                                <input type="hidden" name="illustration" id="visuel">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <label class="form-label">Résumé</label>
                                <textarea rows="5" class="form-control" placeholder="Résumé..." name="summary" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <label class="form-label">Contenu</label>
                                <textarea name="contenu" id="contenu"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        CKEDITOR.replace('contenu');
    </script>
    <script src="{{ asset('assets/js/base64.js') }}"></script>
@endsection

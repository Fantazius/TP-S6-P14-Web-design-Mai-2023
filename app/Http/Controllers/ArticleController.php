<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\VArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    public const PAGINATION = 6;
    public function index()
    {
        $keyword = request()->keyword;
        $articles = null;
        if (!empty($keyword)) {
            $articles = VArticle::search($keyword);
        } else {
            $articles = Cache::remember('listes', 120, function () {
                return VArticle::latest('datepublication')->paginate(ArticleController::PAGINATION);
            });
        }
        $response = response()->view('frontoffice.liste', ['articles' => $articles]);
        $response->header('Cache-Control', 'max-age=3600 , public ');
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.form', [
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            "titre" => 'required',
            "idcategorie" => 'required',
            "illustration" => '',
            "summary" => 'required',
            "contenu" => 'required',
        ]);
        $credentials["idauteur"] = Auth::user()->iduser;

        Article::create($credentials);

        return response()->redirectTo(route('user.articles'))->with('success', 'Ajout réussi');
    }

    /**
     * Display the specified resource.
     */
    public function show(VArticle $article)
    {
        return view('backoffice.fiche', [
            "article" => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        // dd($article);
        return view('backoffice.modification', [
            "categories" => Category::all(),
            "article" => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $credentials = $request->validate([
            "idarticle" => "required",
            "titre" => 'required',
            "idcategorie" => 'required',
            "illustration" => '',
            "summary" => 'required',
            "contenu" => 'required',
        ]);

        $article = Article::find($credentials['idarticle']);

        $article->titre = $credentials['titre'];
        $article->idcategorie = $credentials['idcategorie'];
        $article->illustration = $credentials['illustration'];
        $article->summary = $credentials['summary'];
        $article->contenu = $credentials['contenu'];
        $article->save();

        return redirect()->route('user.articles')->with('success', 'Modification réussie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $article = Article::findOrFail($request->idarticle);
        $article->delete();
        return redirect()->route('user.articles')->with('success', 'Supression réussie');
    }

    public function listMine()
    {
        $user = Auth::user();
        $articles = Article::where('idauteur', $user->iduser)->orderBy('datepublication', 'desc')->paginate(ArticleController::PAGINATION);
        return view("backoffice.liste", [
            "articles" => $articles,
            "auteur" => $user
        ]);
    }

    public function fiche(VArticle $article, $slug)
    {
        return view('frontoffice.fiche', [
            "article" => $article
        ]);
    }
}

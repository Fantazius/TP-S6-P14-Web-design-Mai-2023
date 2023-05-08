<?php

namespace App\Models;

use App\Http\Controllers\ArticleController;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VArticle extends Model
{
    use HasFactory;
    protected $table = "v_articles";
    protected $primaryKey = "idarticle";


    public function getSlug()
    {
        $slug = strtolower(trim($this->titre));
        $slug = preg_replace("/[^a-z0-9]+/", "-", $slug);
        $slug = trim($slug, "-");
        return $slug;
    }


    public function getAuteurName()
    {
        return $this->pseudonyme != null ? $this->pseudonyme : $this->prenoms . " " . $this->nom;
    }

    public function getDatePublication()
    {
        $datetime = new DateTime($this->datepublication);
        $formatted_date = $datetime->format('j F Y \à H:i');
        $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');

        return str_replace($english_months, $french_months, ucfirst($formatted_date)); // output: 8 Mai 2023 à 11:09

    }

    public function getAlt()
    {
        return "Photo de " . $this->getAuteurName() . " sur " . $this->titre;
    }

    public static function search($keyword)
    {
        $lc_keyword = '%' . strtolower($keyword) . '%';
        return VArticle::whereRaw('lower(categorie) like ?', [$lc_keyword])
            ->orWhereRaw('lower(titre) like ?', [$lc_keyword])
            ->orWhereRaw('lower(summary) like ?', [$lc_keyword])
            ->orWhereRaw('lower(contenu) like ?', [$lc_keyword])
            ->orderBy('datepublication', 'desc')
            ->paginate(ArticleController::PAGINATION);
    }
}

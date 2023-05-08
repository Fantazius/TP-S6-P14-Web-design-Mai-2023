<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * 
 * @property string $idarticle
 * @property string $idauteur
 * @property string $titre
 * @property string $idcategorie
 * @property string $summary
 * @property string $contenu
 * @property Carbon|null $datepublication
 * @property string|null $illustration
 * 
 * @property User $user
 * @property Category $category
 *
 * @package App\Models
 */
class Article extends Model
{
	protected $table = 'articles';
	protected $primaryKey = 'idarticle';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'datepublication' => 'datetime'
	];

	protected $fillable = [
		'idauteur',
		'titre',
		'idcategorie',
		'summary',
		'contenu',
		'datepublication',
		'illustration'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'idauteur');
	}

	public function category()
	{
		return $this->belongsTo(Category::class, 'idcategorie');
	}

	
	public function getSlug()
	{
		$slug=strtolower(trim($this->titre));
		$slug=preg_replace("/[^a-z0-9]+/","-",$slug);
		$slug=trim($slug,"-");
		return $slug;
	}	
}

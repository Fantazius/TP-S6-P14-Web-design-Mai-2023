<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property string $idcategorie
 * @property string $categorie
 * 
 * @property Collection|Article[] $articles
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'categories';
	protected $primaryKey = 'idcategorie';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'categorie'
	];

	public function articles()
	{
		return $this->hasMany(Article::class, 'idcategorie');
	}
}

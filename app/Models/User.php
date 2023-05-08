<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property string $iduser
 * @property string $nom
 * @property string $prenoms
 * @property string|null $pseudonyme
 * @property string $email
 * @property string $password
 * 
 * @property Collection|Article[] $articles
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	protected $table = 'users';
	protected $primaryKey = 'iduser';
	public $incrementing = false;
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nom',
		'prenoms',
		'pseudonyme',
		'email',
		'password'
	];

	public function articles()
	{
		return $this->hasMany(Article::class, 'idauteur');
	}

	public function getAuteurName(){
		return $this->pseudonyme!=null?$this->pseudonyme:$this->prenoms." ".$this->nom;
	}
}

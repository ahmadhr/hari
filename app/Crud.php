<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $table = 'crud';
    protected $primaryKey = 'id';
    protected $fillable = ['judul','isi','nim','nim1','username_id'];
    public $timestamps = false;

    public function mhs()
	{
		return $this->belongsTo("App\Mhs","nim");
	}


	public function user()
	{
		return $this->belongsTo("App\User","username_id");
	}
}

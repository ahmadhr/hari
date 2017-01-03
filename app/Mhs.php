<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mhs extends Model
{
    protected $table = 'mhs';
    protected $primaryKey = 'nim';
    protected $fillable = ['nim','nama','umur'];
    public $timestamps = false;

    public function crud()
	{
		return $this->hasOne("App\Crud","nim");
	}
	public function crud1()
	{
		return $this->hasOne("App\Crud","nim1");
	}
}

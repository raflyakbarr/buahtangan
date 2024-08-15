<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class KategoriArtikel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'kategori_artikel_id');
    }
    protected $table = 'kategori_artikel';
}

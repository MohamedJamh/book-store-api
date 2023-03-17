<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'isbn';
    protected $fillable = [
        "isbn",
        "title",
        "content",
        "status",
        "date_publication",
        "number_pages",
        "author_id",
        "collection_id",
        "genre_id"
    ];

    
    public function auteur(){
        return $this->belongsTo(Auteur::class);
    }
    
    public function collection(){
        return $this->belongsTo(Collection::class);
    }
    
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}

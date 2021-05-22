<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productPhotos extends Model
{
    use HasFactory;
    protected $table ="product_photos";
    protected $fillable = [
        'fileName'
    ];
    public function product(){
        return $this->belongsTo(product::class);
    }
}

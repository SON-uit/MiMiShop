<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_product extends Model
{
    use HasFactory;
    protected $table ="type_products";
    protected $fillable =['name','description','image','original','slug'];
    public function products(){
        return $this->hasMany(product::class,'id_type');
    }
}

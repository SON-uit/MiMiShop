<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table ="products";
    protected $fillable =['name','description','price','image','unit','slug','classification','status','link'];
    public function type_product(){
        return $this->belongsTo(type_product::class);
    }
    public function photos(){
        return $this->hasMany(productPhotos::class,'id_product');
    }
    public function bills(){
        return $this->belongsToMany(bill::class,'bill_details','id_product');
    }
}   

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    use HasFactory;
    protected $table ="bills";
    protected $fillable =['total','phonenumber','address','payment'];
    public function user(){ 
        return $this->belongsTo(User::class,'id_user');
    }
    public function products(){ 
        return $this->belongsToMany(product::class,'bill_details','id_bill','id_product');
    }
}

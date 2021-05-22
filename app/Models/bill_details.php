<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill_details extends Model
{
    use HasFactory;
    protected $table="bill_details";
    protected $fillable =['quanty','price'];
    
}

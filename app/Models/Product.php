<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table="products";

    protected $primaryKey="id";

    protected $fillable=['product_title','product_description','product_image'];

    protected $hidden=['created_at','updated_at'];
}

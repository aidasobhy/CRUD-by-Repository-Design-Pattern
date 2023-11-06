<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PharmacyProduct extends Model
{
    use HasFactory;


    protected $table="pharmacy_products";

    protected $primaryKey="id";

    protected $fillable=['product_id','pharmacy_id','product_price','product_quantity'];

    public $timestamps=false;
}

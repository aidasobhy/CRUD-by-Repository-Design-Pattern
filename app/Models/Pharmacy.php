<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    protected $table="pharmacies";
    protected $primaryKey="id";

    protected $fillable=['pharmacy_name','pharmacy_address'];

    protected $hidden=['created_at','updated_at'];
}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class RentVsBuy extends Model { protected $fillable = ['monthly_rent', 'home_price', 'rate', 'years']; }
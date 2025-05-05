<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class HsaVsPpo extends Model { protected $fillable = ['deductible', 'premium', 'oop_max']; }
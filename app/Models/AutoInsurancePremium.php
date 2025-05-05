<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutoInsurancePremium extends Model { protected $fillable = ['age', 'state', 'vehicle_value', 'coverage_level']; }
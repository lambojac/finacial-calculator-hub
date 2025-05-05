<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolarRoi extends Model { protected $fillable = ['system_cost', 'kwh_per_year', 'rate_per_kwh', 'rebate']; }
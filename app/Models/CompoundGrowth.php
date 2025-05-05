<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompoundGrowth extends Model { protected $fillable = ['initial_deposit', 'monthly_addition', 'rate', 'years']; }
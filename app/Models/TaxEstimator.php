<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxEstimator extends Model { protected $fillable = ['filing_status', 'income', 'region']; }
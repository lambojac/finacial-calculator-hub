<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class RefinanceSavings extends Model { protected $fillable = ['current_balance', 'old_rate', 'new_rate', 'term_left']; }
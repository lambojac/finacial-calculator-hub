<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRefi extends Model { protected $fillable = ['loan_balance', 'old_rate', 'new_rate', 'term']; }
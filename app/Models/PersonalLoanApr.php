<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalLoanApr extends Model { protected $fillable = ['principal', 'fees', 'term', 'nominal_rate']; }
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LifeInsuranceNeeds extends Model { protected $fillable = ['annual_income', 'debts', 'college_fund']; }
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class SalaryHourly extends Model { protected $fillable = ['annual_salary', 'hourly_rate', 'hours_per_week']; }
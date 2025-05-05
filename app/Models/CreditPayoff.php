<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditPayoff extends Model { protected $fillable = ['balance', 'apr', 'monthly_pay']; }
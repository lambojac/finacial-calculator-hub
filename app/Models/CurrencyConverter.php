<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class CurrencyConverter extends Model { protected $fillable = ['amount', 'from_currency', 'to_currency']; }
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MortgagePayment extends Model { protected $fillable = ['loan_amount', 'rate', 'years', 'start_date']; }
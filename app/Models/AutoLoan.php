<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class AutoLoan extends Model { protected $fillable = ['car_price', 'down_payment', 'rate', 'term', 'state_tax']; }
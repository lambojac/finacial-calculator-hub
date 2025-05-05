<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeAffordability extends Model { protected $fillable = ['income', 'down_payment', 'debts', 'rate']; }
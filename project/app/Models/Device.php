<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = ['brand', 'model'];

    public function costumer(){

        return $this -> belongsTo(Costumer::class);
    }

}

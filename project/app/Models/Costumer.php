<?php

namespace App\Models;

use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'level', 'address'];

    public function rules(){
        return [
            'level' => ['required','integer', Rule::in([0, 1, 2, 3, 4, 5])],
        ];
    }

    public function devices(){
        
        return $this -> hasMany(Device::class);

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        "emp_no",
        "birth_date",
        "first_name",
        "last_name",
        "gender",
        "hire_date",
    ];

    public function salary()
    {
        return $this->hasOne(Salary::class,'emp_no');
    }

    public function title()
    {
        return $this->hasOne(Title::class,'emp_no');
    }
}

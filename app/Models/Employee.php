<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    public $timestamps = false;
    protected $fillable = ['name', 'email', 'phone', 'salary', 'department'];

    public static function getEmployee()
    {
        $record = DB::table('employees')->select('id', 'name', 'email', 'phone', 'salary', 'department');
        return $record;
    }
}

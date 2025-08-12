<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    protected $table = "employee";
    protected $fillable = ['nama_karyawan', 'alamat', 'no_hp', 'jabatan'];
    use HasFactory;
}

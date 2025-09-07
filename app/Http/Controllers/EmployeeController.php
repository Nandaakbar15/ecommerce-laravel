<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "E-Commerce | Data Karyawan Admin";
        $employee = Employee::paginate(5);

        return view("admin.employee.IndexEmployee", [
            "title" => $title,
            "employee" => $employee
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "E-Commerce | Tambah Data Karyawan";
        return view("admin.employee.TambahKaryawan", [
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_karyawan' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'jabatan' => 'required|string'
        ]);

        Employee::create($validateData);

        return redirect('/admin/employee')->with('success', 'Berhasil menambahkan data karyawan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $title = "E-Commerce | Form Ubah Data Karyawan";
        return view("admin.employee.UbahKaryawan", [
            'employee' => $employee,
            'title' => $title
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validateData = $request->validate([
            'nama_karyawan' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'jabatan' => 'required|string'
        ]);

        $employee->update($validateData);

        return redirect('/admin/employee')->with('success', 'Berhasil mengubah data karyawan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}

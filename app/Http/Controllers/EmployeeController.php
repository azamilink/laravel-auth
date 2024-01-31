<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeesDataTable;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function dataTables(EmployeesDataTable $dataTable)
    {
        return $dataTable->render('employee.data-tables');
    }

    public function list()
    {
        $employees = Employee::all();

        return view('employee.list', compact('employees'));
    }

    public function employees()
    {
        $employees = Employee::paginate(6);

        return view('employee.all', compact('employees'));
    }

    // Export data to PDF - Excel - CSV
    public function downloadPdf()
    {
        $employees = Employee::all();
        $pdf = Pdf::loadView('employee.all', compact('employees'));

        return $pdf->download('employees.pdf');
    }

    public function exportToExcel()
    {
        return Excel::download(new EmployeeExport, 'employeelist.xlsx');
    }

    public function exportToCSV()
    {
        return Excel::download(new EmployeeExport, 'employeelist.csv');
    }

    // import data from excel - csv file
    public function importForm()
    {
        return view('employee.import-form');
    }

    public function import(Request $request)
    {
        Excel::import(new EmployeeImport, $request->file);

        return 'Record has added';
    }
}

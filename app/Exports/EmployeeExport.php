<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeeExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Email',
            'Phone',
            'Salary',
            'Department'
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Employee::all(['id', 'name', 'email', 'phone', 'salary', 'department']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function addEmployee()
    {
        $employees = [
            ["name" => "Alice", "email" => "alice@gmail.com", "phone" => "1234567890", "salary" => "20000", "department" => "Accounting"],
            ["name" => "Andrew", "email" => "andrew@gmail.com", "phone" => "1234567891", "salary" => "21000", "department" => "Marketing"],
            ["name" => "Mike", "email" => "mike@gmail.com", "phone" => "1234567892", "salary" => "22000", "department" => "Quaulity"],
            ["name" => "Sophie", "email" => "sophie@gmail.com", "phone" => "1234567893", "salary" => "23000", "department" => "Accounting"],
            ["name" => "Steve", "email" => "steve@gmail.com", "phone" => "1234567894", "salary" => "24000", "department" => "Marketing"],
        ];
        Employee::insert($employees);
        return "Employees Inserted Succesfully!!";
    }


    public function exportToExcel()
    {
        return Excel::download(new EmployeeExport, "employeelist.xlsx");
    }

    public function exportToCSV()
    {
        return Excel::download(new EmployeeExport, "employeelist.csv");
    }
}

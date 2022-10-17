<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class TransportationController extends Controller
{
    public function list($id)
    {

        $travel_expense = DB::table('tb_claim_foreign_travel_expenses')
            ->leftjoin('tb_employee_list','tb_employee_list.id','=','tb_claim_foreign_travel_expenses.employee_id')
            ->leftjoin('tb_designation_list','tb_employee_list.emp_designation_id','=','tb_designation_list.id')
            ->leftjoin('tb_department_list','tb_employee_list.emp_department_id','=','tb_department_list.id')
            ->leftjoin('tb_employee_list as LineManagerEmployee', 'LineManagerEmployee.id', 'tb_employee_list.line_manager_id')
            ->select('tb_claim_foreign_travel_expenses.*','tb_employee_list.id as employeeId', 'tb_employee_list.emp_first_name', 'tb_employee_list.emp_last_name',
                'tb_designation_list.designation_name','tb_department_list.department_name','LineManagerEmployee.emp_first_name as LM_first_name','LineManagerEmployee.emp_last_name as LM_last_name')
            ->where('tb_claim_foreign_travel_expenses.id', '=', $id)->first();

        $transportation_expenses = DB::table('travel_transportation_expenses')->get();

        return view('admin.pages.travel.list',compact('transportation_expenses'));
    }


    public function store(Request $request): RedirectResponse
    {

        try{
            foreach($request->data as $info){
                $sub_total = ($info['meal_expense'] + $info['accomendation_expense'] + $info['fare_amount'] + $info['other_expenses']);
                $total_amount =  ($sub_total * $info['exchge_rate'] );
                $data = DB::table('travel_transportation_expenses')->insert([

                    'date'                  => $info['travel_date'],
                    'description'           => $info['description'],
                    'meal_expense'          => $info['meal_expense'],
                    'accommodation_expense' => $info['accomendation_expense'],
                    'km_travelled'          => $info['km_travelled'],
                    'travel_mode'           => $info['travel_mode'],
                    'fare_amount'           => $info['fare_amount'],
                    'other_expenses'        => $info['other_expenses'],
                     'sub_total'             => $sub_total,
                    'exchange_rate'         =>$info['exchge_rate'],
                    'total_amount'             => $total_amount,
                    'remarks'               => $info['remarks'],
                ]);
            }


            return redirect()->back();

        }catch(Throwable $th){
            dd($th);
            return redirect()->back();
        }
    }
}

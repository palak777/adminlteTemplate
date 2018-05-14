<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\country;

class EmployeeController extends Controller
{
	public function create(Request $request){
        $this->validate($request,[
            'full_name' => 'required|max:100',
            'email' => 'required|email',
            'country' => 'required',
            'gender' => 'required',            
        ]); 
        $img_name ='';
        $image = $request->file('photo'); 
        if($image){
            $img_name = time().'.'.$image->getClientOriginalExtension(); 
            $destinationPath = public_path('/images'); 
            $image->move($destinationPath, $img_name); 
        }
        $employee=new Employee;
        $employee->full_name=$request->full_name;
        $employee->email=$request->email;
        $employee->country=$request->country;
        $employee->address=$request->address;
        $employee->gender=$request->gender;
        $employee->bdate=$request->bdate?date('Y-m-d',strtotime($request->bdate)):NULL;        
        $employee->hobbies=$request->hobbies?implode(',',$request->hobbies):NULL; 
        $employee->photo=$img_name?$img_name:NULL;
        $employee->save();  
        return redirect('employee-list')->with('message', 'Added Successfully!');       
    }

    public function index()
    {
        $countryData=Country::get();
        return view('employee_display',compact('countryData'));
    }

    public function list(){
        $employeeData=Employee::with('countryList')->get();
      //  dd($employeeData);
        return view('employee_display',compact('employeeData'));
    }
}

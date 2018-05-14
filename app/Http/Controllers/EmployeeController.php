<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Country;

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
        $employeeData=new Employee;
        $employeeData->full_name=$request->full_name;
        $employeeData->email=$request->email;
        $employeeData->country=$request->country;
        $employeeData->address=$request->address;
        $employeeData->gender=$request->gender;
        $employeeData->bdate=$request->bdate?date('Y-m-d',strtotime($request->bdate)):NULL;        
        $employeeData->hobbies=$request->hobbies?implode(',',$request->hobbies):NULL; 
        $employeeData->photo=$img_name?$img_name:NULL;
        $employeeData->save();  
        return redirect('employee_display')->with('message', 'Added Successfully!');       
    }

    public function delete($id){
        $employeeData=Employee::find($id);
        $employeeData->delete();
        return redirect()->back()->with('message', 'Deleted Successfully!');
    }

    public function index()
    {
        $countryData=Country::get();
        //dd($countryData);
        return view('employee_add',compact('countryData'));
    }

    public function list(){
        $employeeData=Employee::with('countryList')->get();
      // dd($employeeData);
        return view('employee_display',compact('employeeData'));
    }

    public function update_view($id){
        $employeeData=Employee::find($id); 
        $countryData=Country::get();        
        return view('employee_edit',compact('employeeData','countryData'));
    }
    public function update($id,Request $request){         
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
        $employeeData=Employee::find($id);
        $employeeData->full_name=$request->full_name;
        $employeeData->email=$request->email;
        $employeeData->country=$request->country;
        $employeeData->address=$request->address;
        $employeeData->gender=$request->gender;
        $employeeData->bdate=$request->bdate?date('Y-m-d',strtotime($request->bdate)):NULL;        
        $employeeData->hobbies=$request->hobbies?implode(',',$request->hobbies):NULL; 
        if($img_name){
            $employeeData->photo=$img_name?$img_name:NULL;
        }
        $employeeData->save();  
        return redirect('employee_display')->with('message', 'Updated Successfully!');          
    }

}

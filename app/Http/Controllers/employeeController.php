<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Companies;
use App\Models\Employees;
use App\Models\User;
use App;


class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        

        $user=Companies::all();
        $emp=Employees::paginate(10);

        return view('admin/employee_index',compact('user','emp'));


    }
    public function get_user()
    {        

        

        return view('admin/get_user');

    }
    public function get_user_data(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
           
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
       
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('admin/get_user');
    }


    
    public function store(Request $request)
    {
        $request->validate([
            'first_name'   => 'required',
            'last_image'   => 'required',
        ]);

        $user= new Employees;
        
        $user->first_name=$request->first_name;
        $user->last_image=$request->last_image;
        $user->email=$request->email; 
        $user->phone=$request->phone;
        $user->company_id=$request->company_id;
        
        $user->save();
        return back()->with('success', 'Employee Successfully Add');



    
    
    }

    
    public function edit($id)
    {
        $emp=Employees::find($id);
        $user=Companies::all();

        return view('admin/employee_edit',compact('user','emp'));
    }

    
    public function update(Request $request, $id)
    {
        $user=Employees::find($id);
        
        
        
        $user->first_name=$request->first_name;
        $user->last_image=$request->last_image;
        $user->email=$request->email; 
        $user->phone=$request->phone;
        $user->company_id=$request->company_id;
        $user->save();
        return back()->with('success', 'Employee Successfully Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user=Employees::find($id);
        
        
        $user->delete();
        return back()->with('success', 'Employee Successfully Delete');
    }
    public function changeLang(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
  
        return redirect()->back();
    }

}

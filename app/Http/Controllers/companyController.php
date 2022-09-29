<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Mail\notificattionMail;


class companyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        

        $user=Companies::paginate(10);

        return view('admin/company_index',compact('user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            
        ]);

        $user= new Companies;
        
        
        $user->name=$request->name;
        $user->email=$request->email; 
        $user->website=$request->website;
        if($request->hasFile('file')){
            $file=$request->file('file');
            $extension=$request->file->extension();
            $fileName=time()."_.".$extension;
            $request->file->move('upload/images/',$fileName);
            $user->logo =$fileName;

        }
        $user->save();
         $details = [
                'name' => $user->name,
               
            ];


        ///////here you use any email where you want to recive the notification/////  


                 
        \Mail::to("rija.idenbrid@gmail.com")->send(new notificattionMail($details));

        return back()->with('success', 'Company Successfully Add');



    
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=Companies::find($id);

        return view('admin/company_edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=Companies::find($id);
        
        
        $user->name=$request->name;
        $user->email=$request->email; 
        $user->website=$request->website;
        if($request->hasFile('file')){
            $file=$request->file('file');
            $extension=$request->file->extension();
            $fileName=time()."_.".$extension;
            $request->file->move('upload/images/',$fileName);
            $user->logo =$fileName;

        }
        $user->save();
        return back()->with('success', 'Company Successfully Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=Companies::find($id);
        
        
        $user->delete();
        return back()->with('success', 'Company Successfully Delete');
    }
}

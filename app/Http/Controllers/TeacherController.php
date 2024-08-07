<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\User;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()    
    {
    
        $teachers=User::where('role','1')->latest()->paginate(10);                     
       return view('teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->role==2){
            return back();
        }     
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request) 
    {
        $teacher=new User();
        $request->validate([   
            'name'=>'required',
            'email'=>'required |unique:users,email',
            'password'=>'required',
            'phone'=>'required',
            'date_of_birth'=>'required | after:1943-12-31 | before:2004-01-01',
            'gender'=>'required',
            'address'=>'required',
            'profile'=>'required'

        ]); 
        if($request->profile){
            $file=$request->profile;
            $newName='teacher_'.uniqid().".".$file->extension();
            $file->storeAs('public/teacher',$newName);
        }      
        $teacher->name=$request->name;
        $teacher->email=$request->email;
        $teacher->password=Hash::make($request->password);
        $teacher->phone=$request->phone;
        $teacher->date_of_birth=$request->date_of_birth;
        $teacher->gender=$request->gender;
        $teacher->address=$request->address;
        $teacher->profile=$newName;
        $teacher->role='1';
        $teacher->save();

        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teacher=User::FindOrFail($id);       
        return view('teacher.edit',compact('teacher'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request,$id)
    {          
   
        $teacher=User::FindOrFail($id);     
        if($request->profile){
            $file=$request->profile;
            $newName='teacher_'.uniqid().".".$file->extension();
            $file->storeAs('public/teacher',$newName);
            $teacher->profile=$newName;       
        }             
        $teacher->name=$request->name;
        $teacher->email=$request->email;
        $teacher->phone=$request->phone;
        $teacher->date_of_birth=$request->date_of_birth;
        $teacher->gender=$request->gender;
        $teacher->address=$request->address;       
        $teacher->update();       
        return redirect()->route('teacher.index')->with('success', 'Profile updated successfully.');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
     $user=User::FindOrFail($id);
      if($user){
       $user->delete();
      }
      return redirect()->route('teacher.index');
 
    }
}

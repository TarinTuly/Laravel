<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use Illuminate\Support\Facades\Session;



class CrudeController extends Controller
{
    //
    public function showData(){
        // $showdata= Crud::all();
        // $showdata= Crud::paginate(1);
        $showdata= Crud::paginate(10);
        $page = $showdata->currentPage();
        return view('show_data',compact('showdata','page'));
    }
    public function addData(){
        return view('add_data');
    }
    public function storeData(Request $r){
        $rules=[
            'name'=>'required|max:10',
            'email'=>'required|email',

        ];
        $customMessage=[
            'name.required'=>'Enter you name',
            'name.max'=>'Your name can not be more than 10 char',
            'email.required'=>'Enter your email',
            'email.email'=>'email must be a valid email',
        ];
        $this->validate($r,$rules,$customMessage);

        $crud=new Crud();
        $crud->name=$r->name;
        $crud->email=$r->email;
        $crud->save();
        Session::flash('msg','data successfully added');
        return redirect('/');
    }
    public function editData($id=null){
        $editData=Crud::find($id);
        $page = request()->query('page', 1);
        return view('edit_data',compact('editData','page'));
    }
    public function deleteData($id=null){
        $deleteData=Crud::find($id);
        $deleteData->delete();
        Session::flash('msg','data deleted successfully');
        return redirect('/');
    }

//     public function updateData(Request $r,$id){
//         $rules=[
//             'name'=>'required|max:10',
//             'email'=>'required|email',

//         ];
//         $customMessage=[
//             'name.required'=>'Enter you name',
//             'name.max'=>'Your name can not be more than 10 char',
//             'email.required'=>'Enter your email',
//             'email.email'=>'email must be a valid email',
//         ];
//         $this->validate($r,$rules,$customMessage);

//         $crud=Crud::find($id);
//         $crud->name=$r->name;
//         $crud->email=$r->email;
//         $crud->save();
//         Session::flash('msg','data successfully updated tulyy');
//         $page = $r->query('page', 1);
//         return redirect('/',['page' => $page]);
//       // return redirect()->route('/update-data', ['page' => $page]);
//       //return redirect()->back();
//     }
public function updateData(Request $r, $id)
{
    $rules = [
        'name' => 'required|max:10',
        'email' => 'required|email',
    ];

    $customMessage = [
        'name.required' => 'Enter your name',
        'name.max' => 'Your name cannot be more than 10 characters',
        'email.required' => 'Enter your email',
        'email.email' => 'Email must be a valid email',
    ];

    $this->validate($r, $rules, $customMessage);

    $crud = Crud::find($id);
    $crud->name = $r->name;
    $crud->email = $r->email;
    $crud->save();

    Session::flash('msg', 'Data successfully updated');
    //$page = $r->input('page');
    $page = $r->query('page', 1);

    // Redirect back to the same page
    return redirect()->route('show-data', ['page' => $page]);
}

 }

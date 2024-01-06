<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Form;
// use Alert;

class FormController extends Controller
{
    
    // ============= Insert Query ===============

    public function index(){
        return view('form');
    }
    public function add_data(request $request){
        $form= new Form;
        $form->name=$request->input('name');
        $form->address=$request->input('address');
        $form->email=$request->input('email');
        $form->description=$request->input('description');
        $form->password=$request->input('password');
        $raw_images=[];
        if($request->image){
            foreach ($request->image as $key => $imgs) {
                $extension = $imgs->getClientOriginalExtension();
            $filename = Rand(10000,99999).'.'.$extension;
            $imgs->move(public_path('/laravel_image'), $filename);
            $raw_images[]=$filename;
            }
        }
        $myimages=implode(',',$raw_images);
        $form->image=$myimages;
        $form->save();
        return redirect()->back()->with('success','Form has benn Add Successfully');  
    }

    // ============= View Query ===============

    public function view(){
        $customer = Form::all();
        return view('table')->with(compact('customer'));
    }

    // ============= Delete Query ===============

    // ==================== Single Image delete query ================
    
    // public function deletetable($id){
    //     $data=Form::find($id);
    //     unlink('laravel_image/'.$data->image);
    //     $data->delete();
    //     return redirect()->back()->with('danger','Form has benn Deleted');  
    // }

    //  =============== Multiple Image delete Query ================

    public function deletetable($id){
        $data = Form::find($id);
        $img_arr=explode(',',$data->image);
            foreach ($img_arr as $image) {
                \File::delete('laravel_image/' . $image);
            }
        $data->delete();
        return redirect()->back()->with('danger', 'Form have been deleted');
    }
    

    // ============ Update Query ===============

    public function edit($id){
        $customer = Form::find($id);
        return view('update')->with(compact('customer'));
    }

    public function update(Request $request, $id){
        
        $update = Form:: find($id);
        $image=[]; 
        if($request->image){
            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = rand(10000, 99999). '.' . $extension;
                $imageFile->move(public_path('/laravel_image'), $filename);
                $image[] = $filename;
            }
        }
        $image = implode(',', $image);
        $update->name = $request['name'];
        $update->address = $request['address'];
        $update->email = $request['email'];
        $update->description = $request['description'];
        $update->password = $request['password'];
        $update->image = $image;
        $update->save();
        return redirect('/table')->with('success','Form has benn Updated Successfully');

    }

}
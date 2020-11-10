<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller

{
    public function config()
    {
        return view('user.config');
    }
    public function update(Request $request)
    {
        //get variable
        $user= \auth::user();
        $id= \auth::user()->id;
        //validations rules
        $validate = $this->validate ($request, [
            'name' => 'required', 'string', 'max:255',
            'surname' => 'required', 'string', 'max:255',
            'nick' => 'required', 'string', 'max:255', 'unique:users,nick,'.$id,
            'phone' => 'required', 'string', 'max:255',
            'gender' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users,email'.$id
        ]); 

        //getting values
        $name=$request->input('name');
        $surname=$request->input('surname');
        $nick=$request->input('nick');
        $phone=$request->input('phone');
        $gender=$request->input('gender'); 
        $email=$request->input('email');  

        //new values in the objet user
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->phone = $phone;
        $user->gender = $gender;
        $user->email = $email;

        //run query in the data base
        
        $user->update();
        
        return redirect()->route('config');
                         //->whit(['message'=>'user updated successfully']);
    }
    
}
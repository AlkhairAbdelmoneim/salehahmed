<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Service;
use App\Models\User;
use Auth;
use Hash;
use Str;

class WelcomeController extends Controller
{
    public function index()
    {
        $countContact = Contact::count();
        $contacts = Contact::orderBy('created_at' , 'desc')->take(6)->get();
        $serviceContact = Service::count();

        $contacts->filter(function($value, $key){

            return $value->message = Str::limit($value->message , 30);
            
        }); 

        return view('dashboard.welcome' ,compact('countContact' ,'serviceContact' ,'contacts'));
    }


    public function change(Request $request)
    {
        
        $this->validate($request, [ 
            'new_password' => 'required|min:8',
            'old_password' => 'required',
        ]);
 
        $hashedPassword = Auth::user()->password;
        if (\Hash::check($request->old_password , $hashedPassword)) {
            if (\Hash::check($request->new_password , $hashedPassword)) {

                session()->flash('success','لا يمكن أن تكون كلمة المرور الجديدة هي كلمة المرور القديمة!');

                return redirect()->route('home');  

            }
            else{

                $users = User::find(Auth::user()->id);
                $users->password = bcrypt($request->new_password);
                $users->save();

                session()->flash('success','تم تغيير كلمة المرور بنجاح');

                return redirect()->route('home');  

            } 
        }
        else{

            session()->flash('success','كلمة المرور القديمة غير متطابقة');

            return redirect()->route('home');  

        }
    }

    
}

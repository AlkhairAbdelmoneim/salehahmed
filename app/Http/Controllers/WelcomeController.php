<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Contact;

class WelcomeController extends Controller
{
    public function welcome()
    {
        
        $services = Service::all();
        $last_services = Service::orderBy('created_at' , 'desc')->take(3)->get();

        dataFilter($services);
        dataFilterWelcome($last_services);
        return view('index' ,compact('services' ,'last_services'));
    }

    public function contact(Request $request)
    {
        $request->validate(
            [
                'name'=>'required|string|max:50',
                'subject'=>'required|string|max:50',
                'phone'=>'required|string|max:50',
                'message'=>'required|string',
            ]
            );
       
        try {
        
            if (empty($request)) {
                
                $noty = getMessage('حدث خطأ ما' ,'error');

                return redirect()->route('welcome')->with($noty);

            }  else{      
            
            $request_data = $request->except(['_token']);
            
            $request_data = Contact::create($request_data);

            $noty = getMessage('تم إرسال الرسالة بنجاح' ,'success');

            return redirect()->route('welcome')->with($noty);
            }
        
        } catch (\Throwable $th) {

                $noty = getMessage('حدث خطأ ما' ,'error');

                return redirect()->route('welcome')->with($noty);

        }
    }

    public function single($id)
    {
        $service = Service::find($id);
        
        if (!$service) {

            return redirect()->route('welcome');

        }

        return view('single',compact('service'));
    }
}

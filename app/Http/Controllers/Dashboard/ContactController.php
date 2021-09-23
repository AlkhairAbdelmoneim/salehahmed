<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index(Request $request)
    {
        try {
            
            $messages = Contact::when($request->search , function($query) use($request){

                return $query->where('name' , 'like' , '%' .$request->search . '%')
                ->orWhere('phone' , 'like' , '%' .$request->search. '%');
    
            })->latest()->paginate(PAGINATION_COUNT);  
            
            dataFilterMessage($messages);

            $messages->filter(function($value, $key){

                return $value->message = Str::limit($value->message , 60);
                
            });
    
            return view('dashboard.contact.index' ,compact('messages'));    

        } catch (\Throwable $th) {
            
            session()->flash('error',__('حدث خطأ ما حاول فيما بعد'));

            return redirect()->route('contact.index');  

        }
    }


    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {


    }

  
    public function show(Contact $contact)
    {
        //
    }


    public function edit(Contact $contact)
    {
        //
    }


    public function update(Request $request, Contact $contact)
    {
        //
    }


    public function destroy(Contact $contact)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{

    public function index(Request $request)
    {
        
        $services = Service::when($request->search , function($query) use($request){

            return $query->where('name' , 'like' , '%' .$request->search . '%');

        })->latest()->paginate(PAGINATION_COUNT);  
        
        $services = dataFilter($services);

        return view('dashboard.services.index' ,compact('services'));  
    }


    public function create()
    {
        return view('dashboard.services.create'); 
    }


    public function store(Request $request)
    {

        $request_data = $request->except(['_token']);

        $request_data = $request->validate([

            'name' => 'required|string|max:50|min:3',
            'description' => 'required|min:10',
            'image' => 'mimes:jpg,jpeg,png',
        ]);
        

        if ($request->image) {

            Image::make($request->image)->resize(800, 700)->save(public_path('uploads/' .$request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }

        Service::create($request_data);

        session()->flash('success',__('created_successfully'));

        return redirect()->route('service.index');  
    }


    // public function show(Service $service)
    // {
    //     //
    // }


    public function edit( $id)
    {
        $service = Service::find($id);

        if (!$service) {
            
            session()->flash('error',__('حدث خطأ ما حاول فيما بعد'));

            return redirect()->route('service.index');  

        } else {
            
            return view('dashboard.services.edit' ,compact('service'));

        }
        

        $user_info = $user_data->transform(function($value , $key){

            $data = [];
            $data['name'] = $value['name'];
            $data['email'] = $value['email'];

            return $data;
        });

        return view('dashboard.building.edit' , compact('building' ,'user_info'));
    }


    public function update(Request $request, Service $service)
    {
        $request_data = $request->validate([

            'name' => 'required|string|max:50|min:3',
            'description' => 'required|min:10',
            'image' => 'mimes:jpg,jpeg,png',
        ]);

        if ($request->image) {
            
            if ($request->image != 'image.png') {
                
                Storage::disk('public_uploads')->delete('/'.$service->image);

                Image::make($request->image)->resize(800, 700)->save(public_path('uploads/' .$request->image->hashName()));

                $request_data['image'] = $request->image->hashName();                
            }
        }

        $service->update($request_data);

        session()->flash('success',__('site.updated_successfully'));

        return redirect()->route('service.index');  


    }

    public function destroy($id)
    {
        $service = Service::find($id);

        if (!$service) {
            
            session()->flash('error',__('حدث خطأ ما حاول فيما بعد'));

            return redirect()->route('service.index');  

        } else {
            
            $service->delete();
            
            session()->flash('success',__('deleted_successfully'));

            return redirect()->route('service.index');  


        }
    }
}

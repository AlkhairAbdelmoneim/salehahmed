<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Requests\SiteSetting as  SiteSettingRequest;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Validator;

class SiteSettingeController extends Controller
{

    public function index(Request $request)
    {
        try {

            $siteSettings = SiteSetting::when($request->search , function($query) use($request){

                return $query->where('name' , 'like' , '%' .$request->search . '%');

            })->latest()->paginate(PAGINATION_COUNT);


                // $siteSettings->filter(function($value, $key){
            
                //     return $value->about_commpany = Str::limit($value->about_commpany , 30);
                    
                // }); 
                

            return view('dashboard.site_settings.index', compact('siteSettings'));  

        } catch (\Throwable $th) {

            session()->flash('error',__('حدث خطأ ما حاول فيما بعد'));

            return redirect()->route('settings.index');  
        }  
    }


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function show(SiteSetting $siteSetting)
    {
        //
    }


    public function edit($id)
    {

        $setting = SiteSetting::find($id);

        if (!$setting) {
            
            session()->flash('error',__('حدث خطأ ما حاول فيما بعد'));

            return redirect()->route('settings.index');   

        } else {
            
            return view('dashboard.site_settings.edit' , compact('setting'));

        }

    }

    public function update(Request $request, SiteSetting $siteSetting)
    {
        if ($request->namesetting) { 

            foreach ($request->namesetting as $key => $value) {   

                $siteSettingUpdate = $siteSetting->where('namesetting' , $key)->get()[0];

                $siteSettingUpdate->update(['value' => $value]);

                }
            
        }
        session()->flash('success',__('site.updated_successfully'));

        return redirect()->route('settings.index');  
    }


    public function destroy($id)
    {
        
        $setting = SiteSetting::find($id); 

        if (!$setting) {

            session()->flash('error',__('حدث خطأ ما حاول فيما بعد'));

            return redirect()->route('settings.index');

        } else {
            
            $setting->delete();
            session()->flash('success',__('site.deleted_successfully'));
    
            return redirect()->route('settings.index');
            
        }
    
        
    }
}

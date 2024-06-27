<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function serviceView(){
        $result = Services::latest()->get();
        return $result;
    }

    public function AllService(){
        $result = Services::all();
        return view('backend.service.all_service', compact('result'));
    }

    public function AddService(){
        return view('backend.service.add_service');

    }

    public function StoreService(Request $request){
        $request->validate([
            'service_name' => 'required',
            'service_logo' => 'required',
        ],[
            'service_name.required' => 'Input Image Name',
        ]);

        $image = $request->file('service_logo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        //Image::make($image)->resize(512, 512)->save('upload/service/'.$name_gen);
        $image->move(public_path('upload/service'),$name_gen);
        $save_url = 'http://127.0.0.1:8000/upload/service/'.$name_gen;

        Services::insert([
            'service_name' => $request->service_name,
            'service_logo' => $save_url,
        ]);
        $notification = array(
    		'message' => 'Service Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.services')->with($notification);
    }

    public function EditService($id){
        $services = Services::findOrFail($id);
        return view('backend.service.edit_service', compact('services'));
    }

    public function UpdateService(Request $request, $id){

        $service_id = $request->id;

        if($request->file('service_logo')){
            $image = $request->file('service_logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/service'),$name_gen);
            $save_url = 'http://127.0.0.1:8000/upload/service/'.$name_gen;

            Services::findOrFail($service_id)->update([
                'service_name' => $request->service_name,
                'service_logo' => $save_url,
            ]);
            $notification = array(
                'message' => 'Image Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.services')->with($notification);
        }
        else{
            Services::findOrFail($service_id)->update([
                'service_name' => $request->service_name,
            ]);
            $notification = array(
                'message' => 'Service Updated Without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.services')->with($notification);
        }
    }

    public function DeleteService($id){
        Services::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Image Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function getImage($imageId)
    {
        $imagePath = public_path('upload/service/' . $imageId);

        if (!File::exists($imagePath)) {
            return response()->json(['error' => 'Image not found'], 404);
        }

        $image = File::get($imagePath);

        $mimeType = File::mimeType($imagePath);

        return Response::make($image, 200, ['Content-Type' => $mimeType]);
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePageEtc;


class HomePageEtcController extends Controller
{
    public function selectVideo(){
        $result = HomePageEtc::select('video_description', 'video_url')->get();
        return $result;
    }
    
    public function selectTotalHome(){
        $result = HomePageEtc::select('total_student', 'total_course', 'total_review')->get();
        return $result;
    }

    public function selectTechHome(){
        $result = HomePageEtc::select('tech_description')->get();
        return $result;
    }
    public function selectHomeTitle(){
        $result = HomePageEtc::select('home_title', 'home_subtitle')->get();
        return $result;
    }

    public function AllHomeContent(){
        $homecontent = HomePageEtc::all();
        return view('backend.homecontent.all_homecontent', compact('homecontent'));
    }

    public function AddHomeContent(){
        return view('backend.homecontent.add_homecontent');

    }

    public function StoreHomeContent(Request $request){
        $request->validate([
            'home_title' => 'required',
            'home_subtitle' => 'required',
        ],[
            'home_title.required' => 'Input Home Title Name',
            'home_subtitle.required' => 'Input Home Subtitle Description',
        ]);

        HomePageEtc::insert([
            'home_title' => $request->home_title,
            'home_subtitle' => $request->home_subtitle,
            'tech_description' => $request->tech_description,
            'total_student' => $request->total_student,
            'total_course' => $request->total_course,
            'total_review' => $request->total_review,
            'video_description' => $request->video_description,
            'video_url' => $request->video_url,
        ]);
        $notification = array(
    		'message' => 'Home Content Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.home.content')->with($notification);
    }

    public function EditHomeContent($id){
        $homecontent = HomePageEtc::findOrFail($id);
        return view('backend.homecontent.edit_homecontent', compact('homecontent'));
    }

    public function UpdateHomeContent(Request $request){

        $home_id = $request->id;

        HomePageEtc::findOrFail($home_id)->update([
            'home_title' => $request->home_title,
            'home_subtitle' => $request->home_subtitle,
            'tech_description' => $request->tech_description,
            'total_student' => $request->total_student,
            'total_course' => $request->total_course,
            'total_review' => $request->total_review,
            'video_description' => $request->video_description,
            'video_url' => $request->video_url,
        ]);
        $notification = array(
    		'message' => 'Home Content Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.home.content')->with($notification);
    }

    public function DeleteHomeContent($id){
        HomePageEtc::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Home Content Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}

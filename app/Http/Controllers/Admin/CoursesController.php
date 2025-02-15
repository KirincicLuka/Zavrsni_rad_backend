<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;


class CoursesController extends Controller
{
    public function onSelectFour(){
        $result = Courses::limit(4)->get();
        return $result;
    }

    public function onSelectAll(){
        $result = Courses::all();
        return $result;
    }

    public function onSelectDetails($courseId){
        $id = $courseId;
        $result = Courses::where('id', $id)->get();
        return $result;
    }

    
    public function AllCourses(){

        $courses = Courses::all();
        return view('backend.courses.all_courses',compact('courses'));
    } 

    public function AddCourses(){
         return view('backend.courses.add_courses');
    }

    public function StoreCourses(Request $request){
        $request->validate([
            'short_title' => 'required',
            'short_title' => 'required',
            'small_img' => 'required',
        ],[
            'short_title.required' => 'Input Short Title Name',
            'short_title.required' => 'Input Short Description',
        ]);

        $image = $request->file('small_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        //Image::make($image)->resize(512, 512)->save('upload/service/'.$name_gen);
        $image->move(public_path('upload/courses'),$name_gen);
        $save_url = 'http://127.0.0.1:8000/upload/courses/'.$name_gen;

        Courses::insert([
            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'long_title' => $request->long_title,
            'long_description' => $request->long_description,
            'total_duration' => $request->total_duration,
            'total_lecture' => $request->total_lecture,
            'total_student' => $request->total_student,
            'skill_all' => $request->skill_all,
            'video_url' => $request->video_url,
            'small_img' => $save_url,
        ]);

         $notification = array(
            'message' => 'Courses Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.courses')->with($notification);

    }

    public function EditCourses($id){

        $courses = Courses::findOrFail($id);
        return view('backend.courses.edit_courses',compact('courses'));

    } // end method 


    public function UpdateCourses(Request $request){

        $course_id = $request->id;

        if ($request->file('small_img')) {

            $image = $request->file('small_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            //Image::make($image)->resize(512, 512)->save('upload/service/'.$name_gen);
            $image->move(public_path('upload/courses'),$name_gen);
            $save_url = 'http://127.0.0.1:8000/upload/courses/'.$name_gen;    

            Courses::findOrFail($course_id)->update([

                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_title' => $request->long_title,
                'long_description' => $request->long_description,
                'total_duration' => $request->total_duration,
                'total_lecture' => $request->total_lecture,
                'total_student' => $request->total_student,
                'skill_all' => $request->skill_all,
                'video_url' => $request->video_url,
                'small_img' => $save_url,
            ]);

            $notification = array(
                'message' => 'Course Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.courses')->with($notification);


        }else{

            Courses::findOrFail($course_id)->update([

            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'long_title' => $request->long_title,
            'long_description' => $request->long_description,
            'total_duration' => $request->total_duration,
            'total_lecture' => $request->total_lecture,
            'total_student' => $request->total_student,
            'skill_all' => $request->skill_all,
            'video_url' => $request->video_url,

        ]);

            $notification = array(
                'message' => 'Course Updated Without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.courses')->with($notification);
        }

    } 


    public function DeleteCourses($id){

        Courses::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Courses Delected Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } 

}

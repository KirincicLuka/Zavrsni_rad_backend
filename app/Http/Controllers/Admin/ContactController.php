<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{

    public function contact(){
        return view('emails.contact-us');
    }

    public function onContactSend(Request $request){

        $ContactArray = json_decode($request->getContent(),true);

        $name = $ContactArray['name'];
        $email = $ContactArray['email'];
        $message = $ContactArray['message'];

        $result = Contact::insert([
            'name' => $name,
            'email' => $email,
            'message' => $message,
        ]);

        if ($result == true) {
            Mail::to('lukakirincic2003@gmail.com')->send(new ContactMail($ContactArray));
            
            return with('Vaša poruka je uspješno poslana.');
        } else {
            return 0;
        }

    }

    public function AllContactMessage(){
        $contact = Contact::all();
        return view('backend.contact.all_contact',compact('contact'));
    }

    public function DeleteContactMessage($id){

        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Contact Message Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}

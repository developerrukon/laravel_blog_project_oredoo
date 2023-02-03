<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //message
    public function index(){
        $messages = Contact::paginate(15);
        return view('backend.contact.index', compact('messages'));
    }

    //message store
    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'subject' => 'required|max:50',
            'description' => 'required|max:250',
        ]);
        $contact =  Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'description' => $request->description,
        ]);
        if($contact){
            return back()->with('success', 'You Send Message Successful!');
        }else{
            return back()->with('success', 'You Message Send Fail!');
        }
    }
    public function show($id){
        $message = Contact::find($id);
        return view('backend.contact.show', compact('message'));
    }
    public function destroy($id){
        $delete = Contact::find($id);
        $delete->delete();
        if($delete){
            return redirect(route('backend.contact.index'))->with('success', 'Message Deleted');
        }else{
            return back()->with('success', 'Message Not Deleted');

        }
    }


}

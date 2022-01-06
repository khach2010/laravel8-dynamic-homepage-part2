<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function AdminContact() {
        $contacts = Contact::all();
       return view('admin.contact.index', compact('contacts'));
    }
    public function AdminAddContact() {
        return view('admin.contact.add');
    }
    public function StoreContact(Request $request) {
        Contact::insert([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('admin.contact')->with('success', 'Contact Inserted Successfully');
    }
    public function Contact() {
        $contacts = DB::table('contacts')->first();
       return view('pages.contact', compact('contacts'));
    }
    public function EditContact($id) {
       $contact = Contact::find($id);
       return view('admin.contact.edit', compact('contact'));
    }
    public function UpdateContact(Request $request, $id) {
        $update = Contact::find($id)->update([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return Redirect()->route('admin.contact')->with('success', 'Contact Updated Successfully');
    }
    public function DeleteContact($id) {
        $delete = Contact::find($id)->delete();
        return Redirect()->route('admin.contact')->with('success', 'Contact deleted Successfully');
    }

    public function ContactForm(Request $request) {
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success', 'Contact Form Successfully Send');
    }

    public function AdminContactMessage() {
        $contactsMessages = ContactForm::all();
       return view('admin.contact.message', compact('contactsMessages'));
    }
    public function DeleteContactFormMessage($id) {
        $contactsMessages = ContactForm::find($id)->delete();
       return Redirect()->back()->with('success', 'Contact Message Successfully deleted');
    }
}

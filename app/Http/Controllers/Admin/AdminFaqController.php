<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
    public function index(){
        $faqs = Faq::get();
        return view('admin.pages.faq.index',compact('faqs'));
    }

    public function create(){
        return view('admin.pages.faq.create');
    }

    public function store(Request $request){
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return redirect()->route('admin.faq.index')->with('success','Faq created successfully');
    }


    public function edit($id){
        $faq = Faq::find($id);
        return view('admin.pages.faq.edit',compact('faq'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $faq = Faq::find($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return redirect()->route('admin.faq.index')->with('success','Faq updated successfully');
    }

    public function delete($id){
        $faq = Faq::find($id);
        $faq->delete();
        return redirect()->route('admin.faq.index')->with('success','Faq deleted successfully');
    }

}

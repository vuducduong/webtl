<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();
        return view('index',compact('documents'));   
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $request->validate([
        //     'path' => 'required|mimes:csv,txt,xlx,xls,pdf,png|max:2048'
        // ]);
        $document = new Document();
        $name = $request -> file('path') -> getClientOriginalName();
        $request -> file('path')->storeAs('public/img', $name);
        $document->name = $request->input('name');
        $document->path = $name;
        $document->user_id = Auth::id();
        $document->status = $request->status;
        $document->save();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Document::findorfail($id);
        // thỏa mãn đồng thời vừa là tài liệu ở chế độ riêng tư
        // và không phải là người upload tài liệu, admin vẫn xem được tài liệu riêng tư
        if($data->status == 'private' && Gate::allows('access_rights', $data) && Gate::allows('isUser')){
            abort(403);
        }
        return view('detail',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $document = Document::findorfail($id);
        if(Gate::allows('access_rights', $document) && !Gate::allows('isAdmin')){
            abort(403);
        }
        return view('edit',compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $document = Document::findorfail($id);
        $name = $request -> file('path') -> getClientOriginalName();
        $request -> file('path')->storeAs('public/img', $name);
        $document->name = $request->input('name');
        $document->path = $name;
        $document->user_id = Auth::id();
        $document->status = $request->status;
        $document->save();
        return redirect()->route('index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::findorfail($id);
        $document -> delete();
        return redirect()->route('index');
    }
}

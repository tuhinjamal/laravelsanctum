<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Resources\PatientResource;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Patient::paginate(10);
        return PatientResource::collection($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $post = new Patient();
        $post->name = $request->name;
    	$post->email = $request->email;
    	$post->phone = $request->phone;
    	$post->address = $request->address;
    	$post->gender = $request->gender;
        $post->history = $request->history;
        $post->save();

        return new PatientResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =  Patient::findOrFail($id);
        return new PatientResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request,$id)
    {
        $post =  Patient::findOrFail($id);
        $post->name = $request->name;
    	$post->email = $request->email;
    	$post->phone = $request->phone;
    	$post->address = $request->address;
    	$post->gender = $request->gender;
        $post->history = $request->history;
        


        if ($post->save()) {
             return new PatientResource($post);
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        $post =  Patient::findOrFail($id);
        if($post->delete()){

            return new PatientResource($post);
        }
    }
}

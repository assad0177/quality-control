<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests=Test::all();
        $i=1;
        return view('test.index',compact('tests','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test.createTest');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'status'=>'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if( $request->hasFile('image') && $request->hasFile('icon') )
        {

            $icon="assets/images/".$request->icon->getClientOriginalName();
            $image="assets/images/".$request->image->getClientOriginalName();
            $test=new Test();
            $test->name=$request->name;
            $test->description=$request->description;
            $test->status=$request->status;
            $test->icon=$icon;
            $test->image=$image;
            $test->save();
            $request->icon->move("assets/images/",$icon);
            $request->image->move("assets/images/",$image);
        }
        return redirect()->route('test.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test=Test::where('id',$id)->first();
        return view('test.editTest',compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'status'=>'required',
            'icon'=>'required',
            'image'=>'required|mimes:.png,.jpg,.jpeg',
        ]);

        $test=Test::where('id',$id)->first();
        $test->name=$request->name;
        $test->description=$request->description;
        $test->status=$request->status;
        $test->icon=$request->icon;
        $test->image=$request->image;
        $test->update();
        return redirect()->route('test.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Test::where('id',$id)->delete();
        return redirect()->route('test.index');
    }
}

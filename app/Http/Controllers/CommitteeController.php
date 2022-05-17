<?php

namespace App\Http\Controllers;

use App\models\Committee;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $committees = Committee::all();
        return view('committee.list', compact('committees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $committees = Committee::where(['committee_type'=>1])->get();
        return view('committee.create', compact('committees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'committee_name'=>'required',
            'committee_type'=> 'required',
            'committee_center_id' => 'required_if:committee_type,=,2'
        ]);
        $commit = new Committee();
        $commit->committee_name = $request->committee_name;
        $commit->committee_type = $request->committee_type;
        $commit->committee_center_id = $request->committee_center_id;
        $commit->save();

        return redirect('/committee')->with('success', 'تم إضافة اللجنة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function show(Committee $committee)
    {
        return view('committee.view',compact('committee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function edit(Committee $committee)
    {
        $committees = Committee::where(['committee_type'=>1])->get();
        return view('committee.create', compact('committees','committee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Committee $committee)
    {
        $committee = Committee::find($id);
        $committee->committee_name = $request->get('committee_name');
        $committee->committee_type = $request->get('committee_type');
        $committee->committee_center_id = $request->get('committee_center_id');
 
        $committee->update();
 
        return redirect('/committee')->with('success', 'تم تعديل اللجنة بنجاح');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Committee $committee)
    {
        $committee->delete();
        return redirect('/committee')->with('success', 'تم حذف اللجنة بنجاح');
    }
}

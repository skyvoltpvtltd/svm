<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use DB;
/**
 * Class LeadController
 * @package App\Http\Controllers
 */

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:lead-list|lead-create|lead-edit|lead-delete', ['only' => ['index']]);
        $this->middleware('permission:lead-create', ['only' => ['create','store', 'updateStatus']]);
        $this->middleware('permission:lead-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:lead-delete', ['only' => ['delete']]);
    }
    public function index()
    {
        // echo "aa";die;
        $leads = Lead::get();

        return view('lead.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lead = new Lead();
        return view('lead.create', compact('lead'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Lead::$rules);

        $lead = Lead::create($request->all());

        return redirect()->route('leads.index')
            ->with('success', 'Lead created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lead = Lead::find($id);

        return view('lead.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lead = Lead::find($id);

        return view('lead.edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Lead $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        request()->validate(Lead::$rules);

        $lead->update($request->all());

        return redirect()->route('leads.index')
            ->with('success', 'Lead updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lead = Lead::find($id)->delete();

        return redirect()->route('leads.index')
            ->with('success', 'Lead deleted successfully');
    }

      public function change_city(Request $request)
      {
$id = $request->id;
// echo $id;die;
$result = DB::table('states')->where('name',$id)->first();
$id=$result->id;
// echo $id;die;
$result_city = DB::table('locations')->where('state_id',$id)->get();
foreach ($result_city as $key => $value) {
   ?>
<option value="<?= $value->city; ?>"><?= $value->city; ?></option>
   <?php
}

      }
}

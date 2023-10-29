<?php

namespace App\Http\Controllers;

use App\Models\Rfield;
use Illuminate\Http\Request;
use Auth;
use DB;
/**
 * Class RfieldController
 * @package App\Http\Controllers
 */
class RfieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rfields = Rfield::paginate();

        return view('rfield.index', compact('rfields'))
            ->with('i', (request()->input('page', 1) - 1) * $rfields->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rfield = new Rfield();
        return view('rfield.create', compact('rfield'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Rfield::$rules);

        $rfield = Rfield::create($request->all());

        return redirect()->route('rfields.index')
            ->with('success', 'Custom field created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rfield = Rfield::find($id);

        return view('rfield.show', compact('rfield'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rfield = Rfield::find($id);

        return view('rfield.edit', compact('rfield'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Rfield $rfield
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rfield $rfield)
    {
        request()->validate(Rfield::$rules);

        $rfield->update($request->all());

        return redirect()->route('rfields.index')
            ->with('success', 'Custom field updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rfield = Rfield::find($id)->delete();

        return redirect()->route('rfields.index')
            ->with('success', 'Custom field deleted successfully');
    }
    public function cfields(Request $request)
    {
        $alldata = $request->alldata;

        // print_r($alldata);die;

        foreach ($alldata as $key => $value) {
// print_r($value);die;
if(!empty($value))
{
    $value = explode('|', $value );

    // print_r($value);die;
if(!empty($value[0]))
{
$val1= $value[0];
}
else
{
    $val1= '';
}
if(!empty($value[1]))
{
$val2= $value[1];
}
else
{
$val2= '';
}

    // print_r($value);die;
// $all_field_type = DB::table('customforms')->where('service_id',$service_id)->where('slug',$key)->first();
$data['data_key'] =  $key;
$data['data_value'] =  $val1;
$data['sub'] = $val2;
$data['uid'] =   Auth::id() ;
$data['lead_id'] =   $request->leadid;
// $data['ftype'] =  $all_field_type->field_type;
// code...
// print_r($data);


DB::table('form_fields')->insert($data);  

}

}

 return redirect('/leads')->with('success', 'Add successfully.');

    }
}

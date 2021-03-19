<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use Illuminate\Support\Str;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $equipments = [];
        if ($request->has('created_by')) {
            $createdBy = $request->input('created_by');
            $equipments = Equipment::where('created_by', $createdBy)->get();
        } else if ($request->has('status')) {
            $status = $request->input('status');
            $equipments = Equipment::where('status', $status)->get();
        } else {
            $equipments = Equipment::all();
        }
        
        return response()->json($equipments, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->report) {
            $base64_str = substr($request->report, strpos($request->report, ",")+1);
            $file = base64_decode($base64_str);
            $safeName = Str::random(10).'_'.$request->report_name;
            $success = file_put_contents(public_path().'/uploads/'.$safeName, $file);    
            $request->merge([
                'report_url' => '/uploads/'.$safeName,
            ]);
        }

        $equipment = Equipment::create($request->all());
        return response()->json($equipment, 201);
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
    public function edit($id,Request $request)
    {
        if ($request->report) {
            $base64_str = substr($request->report, strpos($request->report, ",")+1);
            $file = base64_decode($base64_str);
            $safeName = Str::random(10).'_'.$request->report_name;
            $success = file_put_contents(public_path().'/uploads/'.$safeName, $file);    
            $request->merge([
                'report_url' => '/uploads/'.$safeName,
            ]);
        }
        $request->request->remove('report');
        $request->request->remove('report_name');
        $equipment = Equipment::whereId($id)->update($request->all());
        return response()->json($equipment, 200);
    }

    public function delete($id)
    {
        $equipment = Equipment::findOrFail($id);
        $equipment->delete();
        $response = new \stdClass();
        $response->message= 'Deleted';
        return response()->json($response, 200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

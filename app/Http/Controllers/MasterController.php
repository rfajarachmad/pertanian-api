<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\City;
use App\District;
use App\SubDistrict;
use App\EquipmentType;
use App\Funding;
use App\LandArea;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
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

    public function saveType(Request $request)
    {
        $equipment = EquipmentType::create($request->all());
        return response()->json($equipment, 201);
    }

    public function updateType($id,Request $request)
    {
        $equipment = EquipmentType::whereId($id)->update($request->all());
        return response()->json($equipment, 200);
    }

    public function listEquipmentType(Request $request) {
        if ($request->has('status')) {
            $types = EquipmentType::where('status', $request->status)->get();
        } else {
            $types = EquipmentType::all();
        }
        return response()->json($types, 200);
    }

    public function listAllEquipmentType() {
        $types = EquipmentType::all();
        return response()->json($types, 200);
    }

    public function getEquipmentType($id) {
        $type = EquipmentType::where('code', $id)->first();
        return response()->json($type, 200);
    }

    public function listFunding(Request $request) {
        if ($request->has('status')) {
            $fundings = Funding::where('status', $request->status)->get();
        } else {
            $fundings = Funding::all();
        }
        return response()->json($fundings, 200);
    }


    public function getFunding($id) {
        $type = Funding::where('code', $id)->first();
        return response()->json($type, 200);
    }

    public function saveFunding(Request $request)
    {
        $equipment = Funding::create($request->all());
        return response()->json($equipment, 201);
    }

    public function editFunding($id,Request $request)
    {
        $equipment = Funding::whereId($id)->update($request->all());
        return response()->json($equipment, 200);
    }


    public function listLandArea(Request $request) {
        if ($request->has('status')) {
            $fundings = LandArea::where('status', $request->status)->get();
        } else {
            $fundings = LandArea::all();
        }
        return response()->json($fundings, 200);
    }


    public function getLandArea($id) {
        $type = LandArea::where('code', $id)->first();
        return response()->json($type, 200);
    }

    public function saveLandArea(Request $request)
    {
        $equipment = LandArea::create($request->all());
        return response()->json($equipment, 201);
    }

    public function editLandArea($id,Request $request)
    {
        $equipment = LandArea::whereId($id)->update($request->all());
        return response()->json($equipment, 200);
    }

    public function listProvince() {
        $provinces = Province::all();
        return response()->json($provinces, 200);
    }

    public function getProvince($id) {
        $province = Province::where('id', $id)->first();
        return response()->json($province, 200);
    }

    public function listCity(Request $request) {
        $provId = $request->input('prov');
        $cities = City::where('id', 'like', ''.$provId.'%')->get();
        return response()->json($cities, 200);
    }

    public function getCity($id) {
        $city = City::where('id', $id)->first();
        return response()->json($city, 200);
    }

    public function listDistrict(Request $request) {
        $cityId = $request->input('city');
        $districts = District::where('id', 'like', ''.$cityId.'%')->get();
        return response()->json($districts, 200);
    }

    public function getDistrict($id) {
        $district = District::where('id', $id)->first();
        return response()->json($district, 200);
    }

    public function listSubDistrict(Request $request) {
        if ($request->has('city')) {
            $filter = $request->input('city');    
        }
        if ($request->has('district')) {
            $filter = $request->input('district');    
        }
        $subDistricts = SubDistrict::where('id', 'like', ''.$filter.'%')->get();
        return response()->json($subDistricts, 200);
    }

    public function getSubDistrict($id) {
        $subDistrict = SubDistrict::where('id', $id)->first();
        return response()->json($subDistrict, 200);
    }
}

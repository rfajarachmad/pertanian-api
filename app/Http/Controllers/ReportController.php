<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use DB;

class ReportController extends Controller
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

    public function ownership(Request $request) {

        $equipment = Equipment::where('status','Terverifikasi');

        if ($request->has('province_id') && !empty($request->province_id)) {
            $equipment->where('province_id', $request->province_id);
        }

        if ($request->has('city_id') && !empty($request->city_id)) {
            $equipment->where('city_id', $request->city_id);
        }

        if ($request->has('district_id') && !empty($request->district_id)) {
            $equipment->where('district_id', $request->district_id);
        }

        if ($request->has('sub_district_id') && !empty($request->sub_district_id)) {
            $equipment->where('sub_district_id', $request->sub_district_id);
        }

        if ($request->has('condition') && !empty($request->condition)) {
            $equipment->where('condition', $request->condition);
        }

        if ($request->has('funding_id') && !empty($request->funding_id)) {
            $equipment->where('funding_id', $request->funding_id);
        }

        if ($request->has('type_id') && !empty($request->type_id)) {
            $equipment->where('type_id', $request->type_id);
        }

        if ($request->has('year') && !empty($request->year)) {
            $equipment->where('year', $request->year);
        }


        return response()->json($equipment->get(), 200);
    }

    public function submission(Request $request) {

        $equipment = Equipment::where('status',$request->status);

        return response()->json($equipment->get(), 200);
    }

    public function fundings(Request $request) {

        $equipment = DB::table('equipment')
                ->select(DB::raw('count(*) as total, province_id, city_id, district_id,sub_district_id, type_id, funding_id, year'))
                ->where('status','Terverifikasi');

        if ($request->has('province_id') && !empty($request->province_id)) {
            $equipment->where('province_id', $request->province_id);
        }

        if ($request->has('city_id') && !empty($request->city_id)) {
            $equipment->where('city_id', $request->city_id);
        }

        if ($request->has('district_id') && !empty($request->district_id)) {
            $equipment->where('district_id', $request->district_id);
        }

        if ($request->has('sub_district_id') && !empty($request->sub_district_id)) {
            $equipment->where('sub_district_id', $request->sub_district_id);
        }

        if ($request->has('condition') && !empty($request->condition)) {
            $equipment->where('condition', $request->condition);
        }

        if ($request->has('funding_id') && !empty($request->funding_id)) {
            $equipment->where('funding_id', $request->funding_id);
        }

        if ($request->has('type_id') && !empty($request->type_id)) {
            $equipment->where('type_id', $request->type_id);
        }

        if ($request->has('year') && !empty($request->year)) {
            $equipment->where('year', $request->year);
        }

        $equipment->groupByRaw('province_id, city_id, district_id,sub_district_id, type_id, funding_id, year');

        return response()->json($equipment->get(), 200);
    }

    public function conditions(Request $request) {
        $sql = "select * from (
            select  
                province_id, 
                city_id, 
                district_id, 
                sub_district_id, 
                type_id, 
                count(*) as total_operational, 
                0 as total_broken, 
                0 as total_damage 
            from equipment eq 
            where 
                eq.condition = 'Layak Pake' 
                and status = 'Terverifikasi'
            group by province_id, 
                city_id, 
                district_id, 
                sub_district_id, 
                type_id
            union
            select  province_id, city_id, district_id, sub_district_id, type_id, 0 as total_operation, count(*) as total_broken, 0 as total_damage from equipment eq where eq.condition = 'Rusak Ringan' and status = 'Terverifikasi'
            group by province_id, 
                city_id, 
                district_id, 
                sub_district_id, 
                type_id
            union
            select  province_id, city_id, district_id, sub_district_id, type_id, 0 as total_operation, 0 as total_broken, count(*) as total_damage from equipment eq where eq.condition = 'Rusak Berat' and status = 'Terverifikasi'
            group by province_id, 
                city_id, 
                district_id, 
                sub_district_id, 
                type_id
            ) as main where 1=1";
        
        if ($request->has('province_id') && !empty($request->province_id)) {
            $sql = $sql.' AND province_id ='.$request->province_id;
        }
        if ($request->has('city_id') && !empty($request->city_id)) {
            $sql = $sql.' AND city_id ='.$request->city_id;
        }
        if ($request->has('district_id') && !empty($request->district_id)) {
            $sql = $sql.' AND district_id ='.$request->district_id;
        }
        if ($request->has('sub_district_id') && !empty($request->sub_district_id)) {
            $sql = $sql.' AND sub_district_id ='.$request->sub_district_id;
        }
        if ($request->has('condition') && !empty($request->condition)) {
            $sql = $sql." AND condition ='".$request->condition."'";
        }
        if ($request->has('funding_id') && !empty($request->funding_id)) {
            $sql = $sql." AND funding_id ='".$request->funding_id."'";
        }
        if ($request->has('type_id') && !empty($request->type_id)) {
            $sql = $sql." AND type_id ='".$request->type_id."'";
        }
        if ($request->has('year') && !empty($request->year)) {
            $sql = $sql.' AND year ='.$request->year;
        }

        $equipment = DB::select(DB::raw($sql));

        

        return response()->json($equipment, 200);
    }

    public function coverages(Request $request) {
        $sql = "select 
            la.province_id,
            la.city_id,
            la.district_id,
            la.sub_district_id,
            la.land_area,
            la.year,
            la.type_id,
            la.needs as total_need,
	        IFNULL(main.available, 0) total_available,
            round(IFNULL(main.available, 0)/la.needs*100) as coverage,
            case 
                when round(IFNULL(main.available, 0)/la.needs*100) <= 40 then 'Sangat Kurang'
                when round(IFNULL(main.available, 0)/la.needs*100) >40 and round(IFNULL(main.available, 0)/la.needs*100) <=60 then 'Kurang'
                when round(IFNULL(main.available, 0)/la.needs*100) >60 and round(IFNULL(main.available, 0)/la.needs*100) <=80 then 'Sedang'
                when round(IFNULL(main.available, 0)/la.needs*100) >80 and round(IFNULL(main.available, 0)/la.needs*100) <=100 then 'Cukup'
                else 'Jenuh'
            end coverage_status 
        from (
            select 
                la.province_id,
                la.city_id,
                la.district_id,
                la.sub_district_id,
                la.land_area,
                la.year,
                et.code as type_id,
                round(la.land_area/et.capacity) needs
            from land_area la, equipment_type et
        ) la left join (
            select 
                province_id,
                city_id,
                district_id,
                sub_district_id,
                type_id,
                year,
                count(*) as available
            from equipment
            where
                status = 'Terverifikasi'
            group by
                province_id,
                city_id,
                district_id,
                sub_district_id,
                type_id,
                year
        ) as main on 
            la.province_id = main.province_id 
            and la.city_id = main.city_id 
            and la.district_id = main.district_id 
            and la.sub_district_id = main.sub_district_id 
            and la.year = main.year
        where 1=1";
        
        if ($request->has('province_id') && !empty($request->province_id)) {
            $sql = $sql.' AND la.province_id ='.$request->province_id;
        }
        if ($request->has('city_id') && !empty($request->city_id)) {
            $sql = $sql.' AND la.city_id ='.$request->city_id;
        }
        if ($request->has('district_id') && !empty($request->district_id)) {
            $sql = $sql.' AND la.district_id ='.$request->district_id;
        }
        if ($request->has('sub_district_id') && !empty($request->sub_district_id)) {
            $sql = $sql.' AND la.sub_district_id ='.$request->sub_district_id;
        }
        if ($request->has('type_id') && !empty($request->type_id)) {
            $sql = $sql." AND la.type_id ='".$request->type_id."'";
        }
        if ($request->has('year') && !empty($request->year)) {
            $sql = $sql.' AND la.year ='.$request->year;
        }

        $equipment = DB::select(DB::raw($sql));

        

        return response()->json($equipment, 200);
    }
}

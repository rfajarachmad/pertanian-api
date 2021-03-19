<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('equipment')->delete();
        DB::table('equipment_type')->delete();
        DB::table('funding')->delete();
        DB::table('land_area')->delete();
        DB::table('users')->delete();
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role' => 'ADMIN',
            'status' => 'Active',
            'password' => Hash::make('test1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipment_type')->insert([
            'id' => 1,
            'code' => 'TR-2',
            'name' => 'Traktor Roda 2',
            'description' => 'Traktor Roda 2',
            'capacity' => 5,
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipment_type')->insert([
            'id' => 2,
            'code' => 'TR-4',
            'name' => 'Traktor Roda 4',
            'description' => 'Traktor Roda 4',
            'capacity' => 10,
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('funding')->insert([
            'id' => 1,
            'code' => 'Swadaya',
            'name' => 'Swadaya',
            'description' => 'Swadaya',
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('funding')->insert([
            'id' => 2,
            'code' => 'APBN-P-2019',
            'name' => 'APBN Perubahan 2019',
            'description' => 'APBN Perubahan 2019',
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('funding')->insert([
            'id' => 3,
            'code' => 'APBN-P-2020',
            'name' => 'APBN Perubahan 2020',
            'description' => 'APBN Perubahan 2020',
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('funding')->insert([
            'id' => 4,
            'code' => 'APBD-2019',
            'name' => 'APBD 2019',
            'description' => 'APBD 2019',
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('funding')->insert([
            'id' => 5,
            'code' => 'APBD-2020',
            'name' => 'APBD 2020',
            'description' => 'APBD 2020',
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('land_area')->insert([
            'id' => 1,
            'province_id' => '32',
            'city_id' => '3203',
            'district_id' => '320301',
            'sub_district_id' => '3203012001',
            'land_area' => 10,
            'year' => 2019,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('land_area')->insert([
            'id' => 2,
            'province_id' => '32',
            'city_id' => '3203',
            'district_id' => '320301',
            'sub_district_id' => '3203012002',
            'land_area' => 10,
            'year' => 2019,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('land_area')->insert([
            'id' => 3,
            'province_id' => '32',
            'city_id' => '3203',
            'district_id' => '320301',
            'sub_district_id' => '3203012003',
            'land_area' => 10,
            'year' => 2019,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('land_area')->insert([
            'id' => 4,
            'province_id' => '32',
            'city_id' => '3203',
            'district_id' => '320301',
            'sub_district_id' => '3203012004',
            'land_area' => 10,
            'year' => 2019,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('land_area')->insert([
            'id' => 5,
            'province_id' => '32',
            'city_id' => '3203',
            'district_id' => '320301',
            'sub_district_id' => '3203012005',
            'land_area' => 10,
            'year' => 2019,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('land_area')->insert([
            'id' => 6,
            'province_id' => '32',
            'city_id' => '3203',
            'district_id' => '320301',
            'sub_district_id' => '3203012006',
            'land_area' => 10,
            'year' => 2019,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('land_area')->insert([
            'id' => 7,
            'province_id' => '32',
            'city_id' => '3203',
            'district_id' => '320301',
            'sub_district_id' => '3203012007',
            'land_area' => 10,
            'year' => 2019,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('land_area')->insert([
            'id' => 8,
            'province_id' => '32',
            'city_id' => '3203',
            'district_id' => '320301',
            'sub_district_id' => '3203012008',
            'land_area' => 10,
            'year' => 2019,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('land_area')->insert([
            'id' => 9,
            'province_id' => '32',
            'city_id' => '3203',
            'district_id' => '320301',
            'sub_district_id' => '3203012009',
            'land_area' => 10,
            'year' => 2019,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('land_area')->insert([
            'id' => 10,
            'province_id' => '32',
            'city_id' => '3203',
            'district_id' => '320301',
            'sub_district_id' => '3203012010',
            'land_area' => 10,
            'year' => 2019,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('land_area')->insert([
            'id' => 11,
            'province_id' => '32',
            'city_id' => '3203',
            'district_id' => '320301',
            'sub_district_id' => '3203012011',
            'land_area' => 10,
            'year' => 2019,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

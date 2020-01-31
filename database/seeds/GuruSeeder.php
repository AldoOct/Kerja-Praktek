<?php

use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 20; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('guru')->insert([
    			'nip' => $faker->nip,
    			'id_kelas' => $faker->id_kelas,
    			'nama' => $faker->name,
    			'email' => $faker->email,
    			'alamat' => $faker->address,
    			'tempat_lahir' => $faker->city,
    			'tgl_lahir' => $faker->date("Y-m-d H:i:s"),
    			'no_telp' => $faker->phoneNumber,
    			'tgl_masuk' => $faker->date("Y-m-d H:i:s"), 
    			'pend_terakhir' => $faker->pend_terakhir,
    			'jabatan' => $faker->jabatan,
    			'boarding' => $faker->boarding,
    			'status_nikah' => $faker->randomElement($array = array('Sudah','Belum')), 
    			'pend_terakhir' => $faker->pend_terakhir,
    			'jumlah_kel' => $faker->jumlah_kel

    		]);
 
    	}
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Usertype;

class UsersTypeTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			$usertype = [            
		        ['id' => 1, 'user_type_name' => 'Client'],
		        ['id' => 2, 'user_type_name' => 'Designer'],
		    ];

		    foreach ($usertype as $type) {
		        Usertype::create($type);
		    }
    }
}

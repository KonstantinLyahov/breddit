<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunityRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('community_roles')->insert([
            ['role' => 'member'],
            ['role' => 'creator'],
            ['role' => 'moderator'],
        ]);
    }
}

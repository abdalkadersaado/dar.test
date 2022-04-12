<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        //Create Roles
        # 1
        $adminRole = Role::create([
            'name' => 'admin',
            'display_name' => 'الادارة',
            'display_name_en' => 'Administrator',
            'description' => 'مدير النظام',
            'description_en' => 'System Administrator',
            'allowed_route' => 'admin'
        ]);
        # 2
        $editorRole = Role::create([
            'name' => 'editor',
            'display_name_en' => 'Supervisor',
            'description_en' => 'System Supervisor',
            'display_name' => 'المشرف',
            'description' => 'مشرف النظام',
            'allowed_route' => 'admin'
        ]);
        # 3
        $userRole = Role::create([
            'name' => 'user',
            'display_name_en' => 'User',
            'description_en' => 'Normal User',
            'display_name' => 'مستخدم',
            'description' => 'مستخدم النظام',
            'allowed_route' => null
        ]);
        # 4
        $companyRole = Role::create([
            'name' => 'company',
            'display_name_en' => 'company',
            'description_en' => 'Company User',
            'display_name' => 'شركة',
            'description' => 'مستخدم شركة',
            'allowed_route' => null
        ]);
        //////////////////////////////

        //Create Users
        #1 admin
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'mobile' => '966500000001',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123123123'),
            'status' => 1,
        ]);
        $admin->attachRole($adminRole);

        #2 Editor
        $editor = User::create([
            'name' => 'Editor',
            'username' => 'editor',
            'email' => 'editor@gmail.com',
            'mobile' => '9636500000002',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123123123'),
            'status' => 1,
        ]);
        $editor->attachRole($editorRole);
        #3 company
        $company = User::create([
            'name' => 'Company',
            'username' => 'company',
            'email' => 'company@gmail.com',
            'mobile' => '9963500000002',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123123123'),
            'status' => 1,
        ]);
        $company->attachRole($companyRole);

        #4 user
        $user1 = User::create([
            'name' => 'abdulkader saado',
            'username' => 'abd',
            'email' => 'abd@gmail.com',
            'mobile' => '963500000003',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123123123'),
            'status' => 1,
        ]);
        $user1->attachRole($userRole);

        # create 10 users and contact its with role user
        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'username' => $faker->userName,
                'email' => $faker->email,
                'mobile' => '9665' . random_int(10000000, 99999999),
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('123123123'),
                'status' => 1
            ]);
            $user->attachRole($userRole);
        }
    }
}

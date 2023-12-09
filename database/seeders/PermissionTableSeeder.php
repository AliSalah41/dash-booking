<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',

            'companyEmail-list',
            'companyEmail-create',
            'companyEmail-edit',
            'companyEmail-delete',

            'companyPhone-list',
            'companyPhone-create',
            'companyPhone-edit',
            'companyPhone-delete',

            'policy-list',
            'policy-create',
            'policy-edit',
            'policy-delete',

            'about-list',
            'about-create',
            'about-edit',
            'about-delete',



        ];
        $permissionsTickets = [
            'role-list537',
            'role-create537',
            'role-edit537',
            'role-delete537',

            'user-list537',
            'user-create537',
            'user-edit537',
            'user-delete537',

            'admin-list537',
            'admin-create537',
            'admin-edit537',
            'admin-delete537',


            'companyEmail-list537',
            'companyEmail-create537',
            'companyEmail-edit537',
            'companyEmail-delete537',

            'companyPhone-list537',
            'companyPhone-create537',
            'companyPhone-edit537',
            'companyPhone-delete537',

            'policy-list537',
            'policy-create537',
            'policy-edit537',
            'policy-delete537',

            'about-list537',
            'about-create537',
            'about-edit537',
            'about-delete537',

            'category-list537',
            'category-edit537',
            'category-show537',
            'category-create537',
            'category-delete537',


            'event-list537',
            'event-edit537',
            'event-show537',
            'event-create537',
            'event-delete537',


            'booking-list537',
            'booking-edit537',
            'booking-show537',
            'booking-create537',
            'booking-delete537',


            'airline-list537',
            'airline-edit537',
            'airline-show537',
            'airline-create537',
            'airline-delete537',


            'confirm-list537',
            'confirm-edit537',
            'confirm-show537',
            'confirm-create537',
            'confirm-delete537',

        ];


        foreach ($permissions as $permission) {
            $per = new Permission();
            $per->name = $permission;
            $per->appKey = 1;
            $per->save();
        }
        foreach ($permissionsTickets as $permission) {
            $per = new Permission();
            $per->name = $permission;
            $per->appKey = '537';
            $per->save();
        }


        $role = new Role();
        $role->name = "superAdmin";
        $role->appkey = 1;
        $role->save();
        $roles = [
            "537" => "superAdmin",
        ];
        foreach ($roles as $key => $role) {
            $roleTicket = new Role();
            $roleTicket->name = "superAdmin";
            $roleTicket->appkey = $key;
            $roleTicket->save();
        }
        $administrator = Role::where("name", "superAdmin")->where("appKey", "1")->first();
        $administrator->givePermissionTo($permissions);

        $roleTicket = Role::where("name", "superAdmin")->where("appKey", "537")->first();
        $roleTicket->givePermissionTo($permissionsTickets);

        $user = Admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'appKey'    =>  1
        ]);
        $user->assignRole($role);

        $ticket = Admin::create([
            'name' => 'superAdmin',
            'email' => 'admin@tickets.com',
            'password' => Hash::make('123456'),
            'appKey'    =>  "537"
        ]);
        $ticket->assignRole($roleTicket);
    }
}

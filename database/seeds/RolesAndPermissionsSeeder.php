<?php

use App\User;
use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Company profile
        Permission::findOrCreate('init company', 'Initialize Company');
        Permission::findOrCreate('edit company', 'Edit Company');
        // Permission::findOrCreate('create company', 'Create Company');
        // Permission::findOrCreate('archive company');
        


        // User profile
        //Permission::findOrCreate('edit profile', 'Edit Profile');
        //Permission::findOrCreate('archive profile');


        //Permission::findOrCreate('create menus', 'Create Menus');
        


        //Roles and permissions
        Permission::findOrCreate('assign permissions', 'Assign Permissions');
        Permission::findOrCreate('deassign permissions', 'Deassign Permissions');
        Permission::findOrCreate('create roles', 'Create Roles');
        Permission::findOrCreate('edit roles', 'Edit Roles');
        Permission::findOrCreate('assign roles', 'Assign Roles');
        Permission::findOrCreate('deassign roles', 'Deassign Roles');
        Permission::findOrCreate('activate roles', 'Activate Roles');
        Permission::findOrCreate('deactivate roles', 'Deactivate Roles');
        Permission::findOrCreate('archive roles', 'Archive Roles');

        Permission::findOrCreate('view leads', 'View Leads');

        Permission::findOrCreate('view leads sources', 'View Leads Sources');
        Permission::findOrCreate('edit leads sources', 'Edit Leads Sources');
        Permission::findOrCreate('create leads sources', 'Create Leads Sources');
        Permission::findOrCreate('archive leads sources', 'Archive Leads Sources');
        

        // Users of the Company
        Permission::findOrCreate('create users', 'Create Users');
        Permission::findOrCreate('edit users', 'Edit Users');
        Permission::findOrCreate('archive users', 'Archive Users');




        //Default roles
        Role::findOrCreate('super-admin', 'Super Admin');

        Role::findOrCreate('admin', 'Admin')
            ->givePermission([
                'init company', 'edit company',
                'assign permissions', 'deassign permissions', 'create roles', 'edit roles', 'assign roles', 'deassign roles', 'activate roles', 'deactivate roles', 'archive roles',
                'view leads',
                'view leads sources', 'edit leads sources', 'create leads sources', 'archive leads sources',
                'create users', 'edit users', 'archive users'
        ]);

        

        Role::findOrCreate('dog-walker', 'Dog Walker');



        User::findOrFail(1)->giveRole('admin');
        
    }
}
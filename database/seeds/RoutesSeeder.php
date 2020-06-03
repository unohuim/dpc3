<?php

use App\Route;
use App\Permission;
use Illuminate\Database\Seeder;

class RoutesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Route::findOrCreate('home', '/home', NULL, './components/views/Home');
        Route::findOrCreate('welcome', '/', NULL, './components/views/Welcome');


        // Company profile
        // Route::findOrCreate('init company', '/company/init');
        // Route::findOrCreate('edit company', '/company/edit');
        // Permission::findOrCreate('create company', 'Create Company');

        // LEADS SOURCES
        Route::findOrCreate('leads sources', '/admin/leads/sources', 'view leads sources', './components/views/admin/leads/Sources');
        // Route::findOrCreate('edit leads sources', '/admin/leads/sources/:id/edit');
        // Route::findOrCreate('create leads sources', '/admin/leads/sources/create');
        // Route::findOrCreate('archive leads sources', 'admin/leads/sources/:id/archive');


    }

}



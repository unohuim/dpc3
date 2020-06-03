<?php
use App\User;
use App\Company;
use Illuminate\Database\Seeder;
class UsersSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'email'       => 'robert@woofs.ca',
            'company_id' => 2,
            'first_name' => 'Rob',
            'last_name' => 'Colquhoun',
            'email_verified_at' => date('Y-m-d'),
            'init_at' => date('Y-m-d'),
            'password' => password_hash('LiveRob27', PASSWORD_DEFAULT),

        ]);

        
    }
}

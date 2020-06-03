<?php
use App\Company;
use Illuminate\Database\Seeder;
class CompaniesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::firstOrCreate(
            ['is_default' => true],
            [
                'name'      => 'CanineX',
                'is_active' => true,
            ]);



        Company::firstOrCreate(
            ['is_default' => false],
            [
                'id' => 2,
                'name'      => 'Woofs Upon A Walk',
                'is_active' => true,
            ]);
    }
}
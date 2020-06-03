<?php

use App\Company;
use App\Leads\Source;
use App\Leads\SourceType;
use Illuminate\Database\Seeder;

class SourceAndSourceTypeTablesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     *
     * @throws Throwable
     */
    public function run()
    {

        $companies = [1, 2];

        foreach($companies as $company_id) {


            $sourceType = SourceType::firstOrCreate([
                'name'       => 'Park',
                'company_id' => $company_id,
            ]);

            $sourceType = SourceType::firstOrCreate([
                'name'       => 'Referral',
                'company_id' => $company_id,
            ]);

            $sourceType = SourceType::firstOrCreate([
                'name'       => 'Search Engine',
                'company_id' => $company_id,
            ]);
            $sourceType->sources()->save(Source::firstOrNew([
                'name'       => 'Google',
                'company_id' => $company_id,
            ]));

            $sourceType = SourceType::firstOrCreate([
                'name'       => 'Online Ad',
                'company_id' => $company_id,
            ]);
            $sourceType->sources()->save(Source::firstOrNew([
                'name'       => 'Google Adwords',
                'company_id' => $company_id,
            ]));

            $sourceType = SourceType::firstOrCreate([
                'name'       => 'Social',
                'company_id' => $company_id,
            ]);
            $sourceType->sources()->save(Source::firstOrNew([
                'name'       => 'Facebook',
                'company_id' => $company_id,
            ]));
            $sourceType->sources()->save(Source::firstOrNew([
                'name'       => 'Instagram',
                'company_id' => $company_id,
            ]));

        }
    }
}
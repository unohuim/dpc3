<?php

namespace App\Events;

use App\Company;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CompanyCreated {

    use Dispatchable, SerializesModels;

    public $company;

    /**
     * Create a new event instance.
     *
     * @param Company $company
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }
}
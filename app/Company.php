<?php

namespace App;

use App\Events\CompanyCreated;
use App\Traits\Addressable;
use App\Traits\HasSettings;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Throwable;

class Company extends Model
{
    use Addressable, HasSettings;

    protected $guarded = [];
    
    protected $casts = [
        
        'is_active' => 'boolean',
    ];
    



    /**
     * Get the default company
     *
     * @return mixed
     * @throws Throwable
     */
    public static function getDefault()
    {
        return throw_unless(

            Company::where('is_default', true)->first(),

            new ModelNotFoundException('Default company does not exist in the database!')
            
        );
    }
}

<?php

namespace App\Traits;

use App\Company;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Throwable;

trait Tenantable {

    /**
     * Booting the trait
     */
    protected static function bootTenantable()
    {
        if (static::class !== User::class) {
            static::addGlobalScope('with-company', function (Builder $builder) {
                $builder->with('company');
            });

            static::addGlobalScope('tenant', function (Builder $builder) {
                $builder->tenant();
            });
        }
    }

    /**
     * Relationship: Model belongs to Company
     *
     * @return BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Scope: return only items that belong to the current User's company.
     * Except the super-admin user.
     *
     * @param $query
     *
     * @return Builder
     */
    public static function scopeTenant(Builder $query)
    {
        if (is_null($user = auth()->user())) {
            return $query;
        }

        // TODO: Cache Roles and Permissions stuff!
        // if ($user->hasRole('super-admin') && request()->has('show_all')) {
            
        //     return $query;
        // }

        return $query->where('company_id', $user->company->id);
    }

    /**
     * Get Models that related to the 'Main Company'.
     * Disable global scope 'tenant'.
     *
     * @return Collection
     *
     * @throws Throwable
     */
    public static function getDefaults()
    {
        return static::query()
            ->withoutGlobalScope('tenant')
            ->where('company_id', Company::getDefault()->id)
            ->get();
    }

    /**
     * Find a model by attributes (except `company_id`) in the new company.
     * Clone the model if not found.
     *
     * @param Company $company
     *
     * @param array   $attributes
     *
     * @return mixed
     */
    public function cloneTo(Company $company, array $attributes = [])
    {
        // Exclude relationships
        $replicate = array_filter($this->replicate()->toArray(), function ($attribute) {
            return ! is_array($attribute);
        });

        $attributes = $attributes
            + ['company_id' => $company->id]
            + $replicate;

        return static::query()->withoutGlobalScope('tenant')->firstOrCreate($attributes);
    }
}
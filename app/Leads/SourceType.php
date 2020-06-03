<?php

namespace App\Leads;

use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SourceType extends Model {

    use Tenantable;

    protected $fillable = [
        'company_id',
        'name',
    ];



    /**
     * Relationship: SourceType has many Sources
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sources()
    {
        return $this->hasMany(Source::class);
    }

    
    public function scopeSearch(Builder $builder, $query)
    {
        if (! $query) {
            return $builder;
        }

        $builder->where('source_types.id', $query)
       
            ->orWhere('source_types.name', 'like', "{$query}%");
    }
}
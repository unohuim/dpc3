<?php

namespace App\Leads;

use App\Leads\SourceType;

use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use Tenantable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'id',
    ];



    /**
     * Relationship: Source has one SourceType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->belongsTo(SourceType::class, 'source_type_id');
    }
    
}

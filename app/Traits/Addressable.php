<?php

namespace App\Traits;

use App\Address;

trait Addressable {

    /**
     * Relationship: Model has many Addresses
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    /**
     * Add a new address to the Model
     *
     * @param array|Address $attributes
     *
     * @return Address
     */
    public function addAddress($attributes = [])
    {
        if ($attributes instanceof Address) {
            return $this->addresses()->save($attributes);
        }

        $attributes = array_filter($attributes);

        return $attributes
            ? $this->addresses()->save(new Address($attributes))
            : null;
    }
}
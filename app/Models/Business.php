<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Business extends Model
{
    use HasFactory;
    use Searchable;

    /**
     * Determine if the model should be searchable.
     *
     * @return bool
     */
    public function shouldBeSearchable()
    {
        return true;
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        $searchableArray = $this->only([
            'id',
            'id_number',
            'name',
            'slug',
            'profile',
            'verified_at',
            'is_featured',
            'is_verified',
            'is_active',
            'is_blocked',
            'is_confirmed',
            'has_changed_logo',
            'created_at',
            'updated_at',
            'deleted_at',
        ]);

        return $searchableArray;
    }
}

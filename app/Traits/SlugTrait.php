<?php

namespace App\Traits;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

trait SlugTrait
{
    use Sluggable, SluggableScopeHelpers;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name', 'title'],
            ]
        ];
    }

    // // The slug is created automatically from the "name" field if no slug exists.
    // public function getSlugOrNameAttribute()
    // {
    //     if ($this->slug != '') {
    //         return $this->slug;
    //     }

    //     return $this->name;
    // }
}

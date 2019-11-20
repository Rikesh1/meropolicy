<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class InsuranceType extends Model
{
    protected $fillable = ['slug', 'insurance_type_name', 'insurance_description', 'status', 'icon', 'insurance_type_image', 'meta_keywords', 'meta_description', 'page_title'];
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}

<?php

namespace App\Repositories\Eloquent;

use App\InsuranceType;
use App\Repositories\Contracts\InsuranceTypeRepository;

use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentInsuranceTypeRepository extends AbstractRepository implements InsuranceTypeRepository
{
    public function entity()
    {
        return \App\Models\InsuranceType::class;
    }

    public function all_insurance()
    {
        $all = $this->entity()::all();
        return $all;

    }
}

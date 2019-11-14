<?php

namespace App\Repositories\Contracts;

interface InsuranceTypeRepository
{
    public function all_insurance();

    public function update_insurance_type($request);
}

<?php

namespace App\Repositories\Eloquent;

use App\Model\InsuranceType;
use App\Repositories\Contracts\InsuranceTypeRepository;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentInsuranceTypeRepository extends AbstractRepository implements InsuranceTypeRepository
{
    public function entity()
    {
        return \App\Model\InsuranceType::class;
    }

    public function all_insurance()
    {
        $all = $this->entity()::all();
        return $all;

    }

    public function update_insurance_type($request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'insurance_type_name' => 'required|min:2|max:100'
            ]);
            if ($validator->fails()) {
                return Response::json(['errors' => $validator->errors()->all()]);
            }
            dd('ok');
        }

    }
}

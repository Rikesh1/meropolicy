<?php

namespace App\Http\Controllers\backend\InsuranceType;

use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\Controller;
use App\Models\InsuranceType;
use App\Repositories\Contracts\InsuranceTypeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Mockery\Exception;

class InsuranceTypeController extends BackendController
{
    protected $insurance = '';

    public function __construct(InsuranceTypeRepository $insurance)
    {
        parent::__construct();
        $this->insurance = $insurance;
    }

    public function update_types(Request $request)
    {
        if ($request->isMethod('get')) {
            $insurance_types = $this->insurance->all_insurance();
            return view($this->insuranceTypePath . 'update_insurance', compact('insurance_types', compact('insurance_types')));
        }
        if ($request->isMethod('post')) {

            try {
                $insert = $this->insurance->update_insurance_type($request);
                return $insert;
            } catch (Exception $e) {
                throw new \PDOException('Error in Updating Types' . $e);
            }
        }
        return false;
    }
}

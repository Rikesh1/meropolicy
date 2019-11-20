<?php

namespace App\Repositories\Eloquent;

use App\Model\InsuranceType;
use App\Repositories\Contracts\InsuranceTypeRepository;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;
use Intervention\Image\ImageManagerStatic as Image;
use Psy\Util\Str;

class EloquentInsuranceTypeRepository extends AbstractRepository implements InsuranceTypeRepository
{
    public function entity()
    {
        return InsuranceType::class;
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

            $data['insurance_type_name'] = $request->insurance_type_name;
            $data['insurance_description'] = $request->description;
            $data['status'] = $request->status;
            $data['meta_keywords'] = $request->meta_keywords;
            $data['meta_description'] = $request->meta_description;
            $data['page_title'] = $request->page_title;
            $data['slug'] = \Illuminate\Support\Str::slug($request->slug);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $ext = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/backend/insurance_image/');
                $makefile = Image::make($image);
                $save = $makefile->resize(500, '500', function ($ar) {
                    $ar->aspectRatio();
                })->save($destinationPath . '/' . $ext);
                $data['insurance_type_image'] = $ext;
            }
            if ($request->hasfile('icon')) {
                $image = $request->file('icon');
                $ext = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/backend/insurance_icon/');
                $makefile = Image::make($image);
                $save = $makefile->resize(500, '500', function ($ar) {
                    $ar->aspectRatio();
                })->save($destinationPath . '/' . $ext);
                $data['icon'] = $ext;
            }
            $save = InsuranceType::updateorcreate(['id'=>$request->id],$data);

            if ($save) {
                return \response()->json([
                    'status' => 'success',
                    'message' => 'Inusurance Type Updated Successfully'
                ],'200');
            }

        }
        return false;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePromotionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pro_name'=>'required',
            'pro_detail'=>'required',
            'pro_image'=>'required|image',
            'pro_cost'=>'required',
            'pro_due_date'=>'required'
        ];
    }
}

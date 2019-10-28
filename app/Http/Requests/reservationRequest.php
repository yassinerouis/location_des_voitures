<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class reservationRequest extends FormRequest
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
            'status'=>'required',
            'prix'=>'required',
            'type'=>'required',
            'dretrait'=>'required',
            'dretour'=>'required',
            'lretrait'=>'required',
            'lretour'=>'required',
            'car'=>'required',
            'client'=>'required',
            'paye'=>'required',
            'methodep'=>'required'
            
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;
use App\Traits\ApiResponseWithHttpSTatus;


class ApplicationRequest extends FormRequest
{
    use ApiResponseWithHttpSTatus;
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'cv'=>'required',
        ];
    }
    protected function failedValidation(Validator $validator){
        throw new HTTPResponseException($this->apiResponse('validate errors',null,
        Response::HTTP_UNPROCESSABLE_ENTITY,false, $validator->errors()));
    }
}

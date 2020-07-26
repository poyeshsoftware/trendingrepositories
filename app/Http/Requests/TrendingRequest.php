<?php

namespace App\Http\Requests;

use App\Enums\OrderOptions;
use App\Enums\SortOptions;
use Illuminate\Foundation\Http\FormRequest;

class TrendingRequest extends FormRequest
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
            'created' => 'required_without:language|date_format:Y-m-d',
            'language' => 'required_without:created|string',
            'per_page' => 'numeric',
            'order' => 'enum_value:' . OrderOptions::class,
            'sort' => 'enum_value:' . SortOptions::class
        ];
    }
}

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
     * //required_without:created//
     * @return array
     */
    public function rules()
    {
        return [
            'query' => 'required_without:language|string|max:255',
            'language' => 'required_without:query|string',
            'created' => 'date_format:Y-m-d',
            'per_page' => 'numeric',
            'order' => 'enum_value:' . OrderOptions::class,
            'sort' => 'enum_value:' . SortOptions::class
        ];
    }
}

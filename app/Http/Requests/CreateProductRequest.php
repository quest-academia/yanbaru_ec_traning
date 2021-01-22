<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'product_name' => 'required|string|max:20',
            'category_id' => 'required|numeric|exists:m_categories,id',
            'price' => 'required|numeric',
            'sale_status_id' => 'required|numeric|exists:m_sales_statuses,id',
            'product_status_id' => 'required|numeric|exists:m_products_statuses,id',
            'description' => 'required|string|max:191',
        ];
    }
}

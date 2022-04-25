<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
            'name' => 'required|min:10|max:50',
            'max_attendees' => 'required|integer|digits_between:2,5',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Trường bắt buộc điền: :attribute',
                 'max_attendees.required' => 'Số lượng tối đa tham dự?',
                 'name.min' => 'tên sự kiện phải có tối thiểu 10 ký tự',
                 'name.max' => 'tên sự kiện không quá 50 ký tự',
                 'max_attendees.digits_between' => 'Số lượng nên trong khoảng 2 -> 5'
        ];
    }
}
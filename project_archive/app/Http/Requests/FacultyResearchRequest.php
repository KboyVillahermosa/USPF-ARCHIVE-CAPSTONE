<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacultyResearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'project_name' => 'required|string|max:255',
            'members' => 'required|string',
            'department' => 'required|string',
            'abstract' => 'required|string',
            'banner_image' => 'nullable|image',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadExcelFileRequest extends FormRequest
{
    public function rules()
    {
        return [
            'file' => ['required', 'mimes:xlsx']
        ];
    }
}

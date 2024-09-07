<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// To create a form request, run in the terminal: php artisan make:request TaskRequest, where TaskRequest is the name of the request
class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // If validation does not pass, Laravel will redirect the user back to the previous page and
        // set all validation errors into a session variable 'errors'
        return [
            // Inside the array we can specify some fields and the validation rules
            'title' => 'required|max:255',
            'description' => 'required',
            'long_description' => 'required',
        ];
    }
}

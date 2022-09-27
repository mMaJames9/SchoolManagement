<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class PersonnelStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('personnel_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'nom_personnel' => ['required', 'string', 'max:255'],
            'prenom_personnel' => ['required', 'string', 'max:255'],
            'birthday_personnel'  => ['required', 'string', 'max:255'],
            'phone_number'  => ['required', 'string', 'max:255'],
            'experience_personnel' => ['required', 'string', 'max:255'],
            'cv_personnel' => ['required', 'file', 'mimes:doc,docx,pdf', 'max:5120'],
            'photo_profil_personnel' => ['required', 'image', 'max:3072'],
            'debut_contrat'  => ['nullable', 'string', 'max:255'],
            'fin_contrat'  => ['nullable', 'string', 'max:255'],
            'salaire' => ['required', 'integer', 'min:25'],
        ];
    }
}

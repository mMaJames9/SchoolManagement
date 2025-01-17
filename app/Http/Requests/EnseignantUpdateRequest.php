<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class EnseignantUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('enseignant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'nom_enseignant' => ['required', 'string', 'max:255'],
            'prenom_enseignant' => ['required', 'string', 'max:255'],
            'birthday_enseignant'  => ['required', 'string', 'max:255'],
            'experience_enseignant' => ['required', 'string', 'max:255'],
            'debut_contrat'  => ['nullable', 'string', 'max:255'],
            'fin_contrat'  => ['nullable', 'string', 'max:255'],
            'salaire' => ['required', 'integer', 'min:25'],
        ];
    }
}

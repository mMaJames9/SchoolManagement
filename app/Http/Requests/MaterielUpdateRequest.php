<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class MaterielUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('materiel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'nom_materiel' => ['required', 'string', 'max:255'],
            'date_achat' => ['required', 'string', 'max:255'],
            'destination' => ['required', 'string', 'max:255'],
            'prix_materiel' => ['required', 'integer', 'min:25'],
            'date_prochain_achat' => ['required', 'string', 'max:255'],
        ];
    }
}

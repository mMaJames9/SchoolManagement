<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class EleveStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('eleve_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'matricule_eleve' => ['required', 'string', 'min:10', 'unique:eleves'],
            'nom_eleve' => ['required', 'string', 'max:255'],
            'prenom_eleve' => ['required', 'string', 'max:255'],
            'age_eleve' => ['required', 'integer', 'min:2'],
            'photo_profil_eleve' => ['required', 'image', 'max:3072'],
            'maladie_hereditaire' => ['required', 'string', 'max:255'],
            'acte_naissance' => ['required', 'string', 'max:255'],
            'fiche_renseignement' => ['required', 'string', 'max:255'],
            'carnet_vaccination' => ['required', 'image', 'max:3072'],
            'classe_id' => ['required', 'integer'],

            'nom_pere' => ['string', 'max:255'],
            'num_tel_pere' => ['string', 'max:255'],
            'nom_mere' => ['string', 'max:255'],
            'num_tel_mere' => ['string', 'max:255'],
            'domicile_famille' => ['required', 'string', 'max:255'],

            'bulletin_precedent' => ['image', 'max:3072'],
            'nom_etablissement' => ['string', 'max:255'],
        ];
    }
}

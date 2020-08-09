<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemilikRequest extends FormRequest
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
        if ($this->method() == 'PATCH') {
            $telepon_rules = 'required|numeric|digits_between:10,15|unique:pemilik,nomor_telepon,'. $this->get('id').',id';
        } else {
            $telepon_rules = 'required|numeric|digits_between:10,15|unique:pemilik,nomor_telepon';
        }

        return [
            'nama_pemilik'    => 'required|string|max:50',
            'alamat'          => 'required|string|max:100',
            'nomor_telepon'   => $telepon_rules,
            'nama_hewan'      => 'required|string|max:50',
            'jenis_kelamin'   => 'required|in:Jantan,Betina',
            'foto'            => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:500|dimensions:width=150,height:180',
        ];
    }
}

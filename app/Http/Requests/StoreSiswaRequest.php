<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreSiswaRequest extends Request
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
            'nis' => 'required|unique:siswa|numeric',
            'nama' => 'required|max:50|regex:/^[\pL\s]+$/u',
            'j_kel' => 'required|max:1',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'nis.required' => 'NIS harus diisi',
            'nis.numeric' => 'NIS harus berupa angka',
            'nis.unique' => 'NIS sudah terdaftar',
            'nama.required' => 'Nama harus diisi',
            'nama.max' => 'Nama tidak boleh melebihi :max',
            'nama.regex' => 'Nama tidak boleh mengandung angka',
            'j_kel.required' => 'Harap memilih jenis kelamin',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.max' => 'Alamat tidak boleh melebihi :max'
        ];
    }
}

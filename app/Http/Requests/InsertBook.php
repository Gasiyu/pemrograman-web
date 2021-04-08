<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertBook extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'cover_image' => 'required|file|image|max:1024',
            'judul' => 'required|max:32',
            'penulis' => 'required|max:32',
            'penerbit' => 'required|max:32',
            'tahun_terbit' => 'required|date_format:Y|size:4'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'title'=> 'required|max:191|min:2' ,
            'content' => 'required|min:2' ,
            'title'=> 'required|max:191|min:2' ,
            'category_id'=> 'required|integer' 
        ];
    }
}

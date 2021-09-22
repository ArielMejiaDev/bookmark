<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RecipeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        if (! is_null($this->title)) {
            $slug = Str::of($this->title)->append('-' . uniqid())->slug();
            $this->request->add(compact('slug'));
            $this->merge(compact('slug'));
            $this->merge(['thumbnail' => null]);
            $this->merge(['author_id' => $this->user()->id]);
        }
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:10'],
            'content' => ['required', 'string', 'max:5000'],
            'slug' => ['required', Rule::unique('recipes')],
            'thumbnail' => ['nullable', 'image', 'max:1024'],
            'author_id' => ['required', Rule::exists('users', 'id')],
        ];
    }
}

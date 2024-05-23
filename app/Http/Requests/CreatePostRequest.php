<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    use Illuminate\Support\Str;
    use Illuminate\Validation\Rule;

    class CreatePostRequest extends FormRequest {

        public function authorize(): bool {
            return true;
        }

        public function rules(): array
        {
            return [
                'title' => ['required', 'min:8', 'max:40'],
                'slug' => ['required', 'min:8', 'regex:/^[a-z0-9\-]+$/', Rule::unique('posts')->ignore($this->route()->parameter('post'))],
                'content' => ['required'],
                'category_id' => ['required', 'exists:categories,id'],
                'tags' => ['array', 'exists:tags,id', 'required']
            ];
        }

        protected function prepareForValidation()
        {
            $this->merge([
                'slug' => $this->input('slug') ?: Str::slug($this->input('title'))
            ]);
        }

    }

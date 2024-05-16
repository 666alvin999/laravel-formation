<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    use Illuminate\Support\Str;
    use Illuminate\Validation\Rule;

    class CreatePostRequest extends FormRequest {
        /**
         * Determine if the user is authorized to make this request.
         */
        public function authorize(): bool {
            return true;
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
         */
        public function rules(): array {
            return [
                'name' => ['required', 'min:8', 'max:40'],
                'slug' => ['required', 'min:8', 'regex:/^[a-z0-9\-]+$/', Rule::unique('posts')->ignore($this->route()->parameter('post'))],
                'content' => ['required']
            ];
        }

        protected function prepareForValidation() {
            $this->merge([
                'slug' => $this->input('slug') ?: Str::slug($this->input('name'))
            ]);
        }
    }
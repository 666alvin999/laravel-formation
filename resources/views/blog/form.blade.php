<form action="" method="post" class="vstack gap-2">
    @csrf
    <div class="form-group">
        <label for="title">Titre :</label>
        <input type="text" class="form-control" name="title" value="{{ old('name', $post->name) }}">
        @error("title")
        {{ $message }}
        @enderror
    </div>
    <div class="form-group">
        <label for="slug">Slug :</label>
        <input type="text" class="form-control" name="slug" value="{{ old('slug', $post->slug) }}">
        @error("slug")
        {{ $message }}
        @enderror
    </div>
    <div class="form-group">
        <label for="category_id">Catégorie :</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="">Sélectionner une catégorie</option>
            @foreach ($categories as $category)
            <option @selected(old('category_id', $post->category_id) == $category->id) value="{{ $category->id }}">{{
            $category->name }}</option>
            @endforeach
        </select>
        @error("category_id")
        {{ $message }}
        @enderror
    </div>
    @php
    $tagsIds = $post->tags()->pluck('id');
    @endphp
    <div class="form-group">
        <label for="tag">Tags :</label>
        <select name="tags[]" id="tag" class="form-control" multiple>
            @foreach ($tags as $tag)
            <option @selected($tagsIds->contains($tag->id)) value="{{ $tag->id }}">{{
                                        $tag->name }}</option>
            @endforeach
        </select>
        @error("tags")
        {{ $message }}
        @enderror
    </div>
    <div class="form-group">
        <label for="content">Contenu :</label>
        <textarea name="content" id="content" class="form-control">{{ old('content', $post->content) }}</textarea>
        @error("content")
        {{ $message }}
        @enderror
    </div>
    <button class="btn btn-primary">
        @if ($post->id)
        Modifier
        @else
        Créer
        @endif
    </button>
</form>

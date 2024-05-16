<form action="" method="post" class="vstack gap-2">
    @csrf
    <div class="form-group">
        <label for="name">Name :</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $post->name) }}">
        @error("name")
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
        <label for="content">Contenu :</label>
        <textarea name="content" id="content" class="form-control" cols="30" rows="10">
            {{ old('content', $post->content) }}
        </textarea>
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

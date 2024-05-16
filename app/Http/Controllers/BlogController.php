<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\CreatePostRequest;
    use App\Models\Post;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\View\View;

    class BlogController extends Controller {

        public function index(): View {
            return view('blog.index', [
                'posts' => Post::paginate(1)
            ]);
        }

        public function show(Post $post): RedirectResponse | View {
            return view('blog.show', [
                'post' => $post
            ]);
        }

        public function create() {
            $post = new Post();
            return view('blog.create', [
                'post' => $post
            ]);
        }

        public function store(CreatePostRequest $request) {
            $post = Post::create($request->validated());

            return redirect()->route('blog.show', ['post' => $post->slug])->with('success', "L'article a bien été sauvegardé");
        }

        public function edit(Post $post) {
            return view('blog.edit', [
                'post' => $post
            ]);
        }

        public function update(Post $post, CreatePostRequest $request) {
            $post->update($request->validated());

            return redirect()->route('blog.show', ['post' => $post->slug])->with('success', "L'article a bien été modifié");
        }

    }

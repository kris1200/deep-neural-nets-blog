<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show_post.css') }}">
    <x-bs />

</head>

@auth
@if (Auth::user()->id === $post->user->id)

<x-confirm_deletion_modal />

@endif
@endauth

<body>
    <x-navbar />

    {{-- To position the post container using flexbox on different viewport sizes, wrap it inside a another container  --}}
    <main id="post_container_parent">

        <article id="post_container" class="d-inline-flex flex-column flex-wrap">

            {{-- Post title --}}
            <header>
                <h1 id="post_title">
                    {{ $post->title }}
                </h1>
            </header>

            {{-- The user can see an option to edit and delete his own post --}}
            @auth
            @if (Auth::user()->id === $post->user->id)
            <div>
                <a href="/edit_post/{{ $post->title }}/" class="btn btn-primary">Edit this post</a>
                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete this post</button>
            </div>
            {{-- Form to send the delete request to the designated route --}}
            <form action="/delete_post/{{ $post->id }}" id="send_delete_request" method="POST" hidden>
                @method('DELETE')
                @csrf
            </form>
            @endif
            @endauth

            {{-- Username and published at --}}
            <section id="post_info_container">
                <div id="post_info">
                    {{-- Try to display image only if its path is found from the database --}}
                    @if ($post->user->profile_photo_path !== null)
                    {{-- Here, the span with "post_author_info_container" includes a profile pic, whereas the span with "post_author_name_container" includes just a name.  --}}
                    <span id="post_author_info_container">
                        <img id="post_author_avatar" src="{{ asset('/storage') }}/{{ $post->user->profile_photo_path }}">
                        <span id="post_author_name">{{ $post->user->name }}</span>
                    </span>

                    @else
                    {{-- If no path to an image is found, just display the name --}}
                    <span id="post_author_name_container">
                        <span id="post_author_name">{{ $post->user->name }}</span>
                    </span>
                    @endif

                    <span id="pipe" class="ms-2 me-2"> | </span>
                    <section class="d-inline" id="publish_date_container">
                        <span id="published_at">
                            Published at
                        </span>
                        <time id="publish_date" datetime="{{ date('Y-m-d') }}">{{ date('d M Y', strtotime($post->created_at)) }}</time>
                    </section>
                </div>
            </section>

            {{-- Post Thumbnail --}}
            <div id="thumbnail_container">
                <img id="thumbnail" src="{{ asset('/storage') }}/{{ $post->post_image_path }}">
            </div>

            {{-- Post Body --}}
            <section id="post_body_container">
                <div id="post_body">
                    {{ $post->post_body }}
                </div>
            </section>
            <hr class="mb-4 mt-4">


        </article>

    </main>

    <x-footer />

    <x-bs_js />
    <script src="{{ asset('js/show_post.js') }} "></script>

</body>

</html>

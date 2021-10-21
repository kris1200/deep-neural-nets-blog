{{-- Home page of the website --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <x-bs />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/alert.css') }}">
</head>

<body>

    <x-navbar />


    <x-deletion_success />
    <x-update_success />
    <x-creation_success />



    @if($posts->count() === 0)
    <div id="no_posts_found">
        <h1>Sorry, this section doesn't have any posts for now. Maybe you will want to visit this section sometime later. </h1>
    </div>
    @endif

    <main id="posts_container_parent">
        <div class="d-inline-flex flex-wrap flex-column" id="posts_container">
            @foreach ($posts as $post)
            <article class="mt-4 mb-4 border" id="posts_box">
                <a href="/show_post/{{ $post->title }}" class="bg-dark" id="show_post_link">
                    <div id="post_info_container" class="px-0">
                        <header class="mx-0" id="post_title">
                            {{ $post->title }}
                        </header>

                        <section class="d-inline text-secondary" id="post_author_and_date_container">
                            <span> By </span>
                            <b id="post_author">{{ $post->user->name }}</b>
                            <span> | </span>
                            <span id="post_created_at">
                                {{ $post->created_at->diffForHumans() }}
                            </span>
                        </section>
                    </div>
                    <div id="thumbnail_container">
                        <img src="{{ asset('/storage') }}/{{ $post->post_image_path }}" id="thumbnail">
                    </div>

                </a>
            </article>
            @endforeach
        </div>
    </main>

    <div id="paginated_links" class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

    <x-footer />

    <x-bs_js />


    {{-- jquery cdn --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/alert.js') }}"></script>

    <script>

    </script>
</body>

</html>

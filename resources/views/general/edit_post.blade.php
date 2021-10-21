<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit post</title>
    <x-bs />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit_post.css') }}">
</head>


<x-confirm_deletion_modal />

<body>

    <x-navbar />

    {{-- Deletion failure message --}}
    @if (session('deletion_failure_message'))

    <aside id="deletion_failure_container" class="alert_container">
        <div class="alert" role="alert" id="deletion_failure">
            {{ session('deletion_failure_message') }}
        </div>
    </aside>
    @endif

    {{-- Update failure message --}}
    @if (session('update_failure_message'))
    <aside id="update_failure_container" class="alert_container">
        <div class="alert" role="alert" id="update_failure">
            {{ session('update_failure_message') }}
        </div>
    </aside>
    @endif

    {{-- Edit Post Container --}}
    <main class="d-flex justify-content-center align-items-center" id="edit_post_container">
        <section id="edit_post">
            <h2 class="fw-bold"><u>Edit this post</u></h2>
            @if ($errors->any())
            <div id="errors_container" class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form id="edit_post_form" action="/edit_post/{{ $post->id }} " method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div id="title_input_container" class="mb-3">
                    <label class="form_input_label" for="title_input" id="title-l">New Title</label>
                    <input type="text" name="title" id="title_input" class="form-control mt-2 edit_form_input" placeholder="New post title" @if (old('title') !==null) value="{{ old('title') }}" @else value="{{ $post->title }}"> @endif
                </div>
                <div id="body_input_container" class="mb-3">
                    <label class="form_input_label" for="body_input" id="body-l">New post body</label>
                    <textarea name="body" id="body_input" class="form-control mt-2 edit_form_input" style="height: 150px" placeholder="Your new post body goes here!">
                        @if (old('body') !== null)
                        {{ old('body') }}
                        @else
                        {{ $post->post_body }}
                    @endif
                    </textarea>
                </div>
                <div id="thumbnail_input_container" id="thumbnail-l" class="mb-3">
                    <label class="form_input_label" for="thumbnail_input" id="thumbnail-l">New thumbnail (Optional)</label>
                    <input type="file" class="form-control mt-2 edit_form_input" id="thumbnail_input" name="thumbnail" accept="image/jpeg, image/png, image/bmp">
                </div>
                <span>
                    <button type="submit" class="btn btn-outline-primary">Update</button>
                </span>
                <span>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Delete this post
                    </button>
                </span>
            </form>

            <div id="thumbnail_preview_container">
                <img id="thumbnail_preview">
            </div>
        </section>
    </main>


    {{-- Form to send the delete request to the designated route --}}
    <form action="/delete_post/{{ $post->id }}" id="send_delete_request" method="POST" hidden>
        @method('DELETE')
        @csrf
    </form>

    <x-bs_js />
    <x-jq />
    <script src="{{asset('js/edit_post.js') }}"></script>
</body>



</html>

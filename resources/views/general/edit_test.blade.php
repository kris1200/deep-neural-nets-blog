<div class="d-flex justify-content-center align-items-center" id="edit_post_container">
    <div id="edit_post">
        <h2 class="fw-bold"><u>Write a post</u></h2>
        @if ($errors->any())
        <div id="errors_container" class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif



        <form id="edit_post_form" action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="title_input_container" class="mb-3">
                <label class="form_input_label" for="title_input" id="title-l">Post Title</label>
                <input type="text" name="title" id="title_input" class="form-control mt-2 edit_form_input" placeholder="Your post title" value="{{ old('title') }}" required>
            </div>
            <div id="body_input_container" class="mb-3">
                <label class="form_input_label" for="body_input" id="body-l">Post Body</label>
                <textarea name="body" id="body_input" class="form-control mt-2 edit_form_input" placeholder="Your post body goes here!" required>{{ old('body') }}</textarea>
            </div>
            <div id="thumbnail_input_container" id="thumbnail-l" class="mb-3">
                <label class="form_input_label" for="thumbnail_input" id="thumbnail-l">New thumbnail (Optional)</label>
                <input type="file" class="form-control mt-2 edit_form_input" id="thumbnail_input" name="thumbnail" accept="image/jpeg, image/png, image/bmp" required>
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
    </div>
</div>

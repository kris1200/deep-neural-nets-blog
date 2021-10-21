<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Write post</title>
    <x-bs />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create_post.css') }}">
</head>

<body>

    <x-navbar />


    {{-- Creation failure message --}}
    @if (session('creation_failure_message'))
    <aside id="creation_failure_container" class="alert_container">
        <div class="alert" role="alert" id="creation_failure">
            {{ session('creation_failure_message') }}
        </div>
    </aside>
    @endif



    <main class="d-flex justify-content-center align-items-center" id="create_post_container">
        <section id="create_post">
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



            <form id="create_post_form" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="title_input_container" class="mb-3">
                    <label class="form_input_label" for="title_input" id="title-l">Post Title</label>
                    <input type="text" name="title" id="title_input" class="form-control mt-2 create_form_input" placeholder="Your post title" value="{{ old('title') }}" required>
                </div>
                <div id="body_input_container" class="mb-3">
                    <label class="form_input_label" for="body_input" id="body-l">Post Body</label>
                    <textarea name="body" id="body_input" class="form-control mt-2 create_form_input" placeholder="Your post body goes here!" required>{{ old('body') }}</textarea>
                </div>
                <div id="thumbnail_input_container" id="thumbnail-l" class="mb-3">
                    <label class="form_input_label" for="thumbnail_input" id="thumbnail-l">Post thumbnail</label>
                    <input type="file" class="form-control mt-2 create_form_input" id="thumbnail_input" name="thumbnail" accept="image/*" required>
                </div>
                <div class="text-center">
                    <button id="submit_button" type="submit" class="btn btn-outline-primary">Create</button>
                </div>
            </form>
            <div id="thumbnail_preview_container">
                <img id="thumbnail_preview">
            </div>
        </section>
    </main>

    <x-bs_js />
    <x-jq />




    <script src="{{ asset('js/create_post.js') }}"></script>




    {{-- {{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{ For testing purposes }}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}} --}}
    <script>
        function makeid(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() *
                    charactersLength));
            }
            return result;
        }
        document.getElementById("body_input").innerHTML = makeid(1000)
        document.getElementById("title_input").value = makeid(50);

    </script>
    {{-- {{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}} --}}
</body>


</html>

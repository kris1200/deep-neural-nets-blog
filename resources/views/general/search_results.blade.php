<!DOCTYPE html>
<html lang="en" style="background: orchid;">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search results</title>
    <x-bs />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search_results.css') }}">

</head>

<body>
    <x-navbar />


    @if ($results->count() === 0)
    <section id="posts_not_found">
        <h1>Sorry, we couldn't find any posts related to your search :(</h1>
        <h2 class="fst-italic">Tip: Try limiting your query to specific words associated with a post title you are looking for <span class="fst-normal">:)</span> </h2>
    </section>
    @endif

    <main id="search_results_container_parent" class="d-flex">

        <div class="d-inline-flex flex-wrap flex-column" id="search_results_container">
            <h2 id="indicator_label">Search results: </h2>
            @foreach ($results as $result)
            <article class="col mb-4 border" id="search_results_box">
                <a href="/show_post/{{ $result->title }}" class="bg-dark" id="show_post_link">
                    <div id="post_title_container" class="px-0">
                        <header id="post_title" class="mx-0">
                            {{ $result->title }}
                        </header>
                    </div>
                    <div id="thumbnail_container">
                        <img src="{{ asset('/storage') }}/{{ $result->post_image_path }}" id="thumbnail">
                    </div>

                </a>

            </article>
            @endforeach


        </div>



    </main>

    <section id="paginated_links" class="d-flex justify-content-center ms-4 me-4 mb-4">
        {{ $results->links() }}
    </section>

    <x-footer />
    <x-area />
    <x-bs_js />
    <script>
        if (document.getElementById("posts_not_found")) {
            document.getElementById("indicator_label").remove();
        }

    </script>


</body>

</html>

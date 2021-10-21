


<nav id="navbar" class="navbar navbar-expand-lg fixed-top py-2">
    <div class="container-fluid">

        <header>
        <a class="navbar-brand ms-lg-4" href="{{ url('/') }}">
            <img src="{{ asset("logos\DeepNeualNet.png") }}" width="140" height="40" alt="Deep Neural Nets">
        </a>
        </header>

        <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span id="navbar-toggler" class="navbar-toggler-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu">
                <form id="searchForm" class="d-flex align-items-center me-lg-5 mb-2 mt-2" action="/search_posts" id="search_form" >
                    <input class="form-control" id="searchInput" type="search" placeholder="Search" aria-label="Search" name="query" @if(session('query')) value="{{ session('query') }}" @endif>
                    <button class="btn btn-outline-light ms-2 me-2 d-inline" type="submit" id="searchSubmit">Search</button>
                </form>
                @guest
                <span class="me-4 mt-lg-3">
                    <a href="/register" class="link-primary me-2">
                        Register
                    </a>
                    <a href="/login" class="link-primary">
                        Login
                    </a>
                </span>

                @endguest

                @php
                // Get the current URL
                $domain = env('APP_URL');
                $url = url()->current();

                @endphp
                @auth
                {{-- Show the button to create a post only if the user isn't on the create post page --}}
                @if (!str_contains($url, $domain . '/' . 'create_post'))
                <div class="d-flex">
                    <div class="d-flex align-items-center">
                        <a href="/create_post" class="float-end btn btn-outline-light me-lg-5 me-xl-5 mb-1">
                            <i class="bi bi-pencil-square"> Write a post</i>
                        </a>
                    </div>
                </div>
                @endif

                <div class="mt-lg-2 mt-1 me-lg-4" id="profile_container">
                    <x-profile />
                </div>
                @endauth
            </ul>
        </div>
    </div>
</nav>









<script>
    var searchBar = document.getElementById("searchInput")
    var searchForm = document.getElementById("searchForm")


    //Prevent the user from submitting the form if the search bar is left blank
    searchForm.addEventListener("submit", (e) => {
        if (searchBar.value.trim() == "") {
            e.preventDefault();
        }
    })

</script>

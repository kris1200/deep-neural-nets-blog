<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About us</title>
    <x-bs />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about_us.css') }}">
</head>
<body>

    <x-navbar />
    <div class="container">

    </div>

    <h1>About us</h1>
    <p id="about_us_para">
        Deep Neural Nets (DNN) is an open-source project developed solely for fun and educational purposes. It is built based on the MVC architecture using PHP, JavaScript, HTML & CSS. That's all there is to know about this project. Have a good day! :)
    </p>

    {{-- I tried running this animation and it's giving my computer strokes --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous"></script>
    <script>
        const container = document.querySelector('.container');
        for (var i = 0; i <= 7; i++) {
            const block = document.createElement('div');
            block.classList.add('blockclass');
            container.appendChild(block);
        }

        function animateBlocks() {
            anime({
                targets: '.blockclass'
                , translateX: function() {
                    return anime.random(-200, 200)
                }
                , translateY: function() {
                    return anime.random(-200, 200)
                }
                , scale: function() {
                    return anime.random(-10, 10)
                }
                , easing: 'linear'
                , duration: 2000
                , delay: anime.stagger(10)
                , complete: animateBlocks
            , })
        }


        animateBlocks();

    </script> --}}
    <x-bs_js />




</body>
</html>

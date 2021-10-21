{{-- This script should be used to view the computed height and width of the viewport. However, since it's only meant for testing purposed, you can dismiss it. --}}
<script>
    var area = document.getElementById("area")

    area.innerHTML = "Width: " + window.innerWidth + "<br>" + "Height: " + window.innerHeight
    window.addEventListener("resize", () => {
        area.innerHTML = "Width: " + window.innerWidth + "<br>" + "Height: " + window.innerHeight

    })
</script>

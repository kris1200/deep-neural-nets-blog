/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///==========================================Javascript===========================================================///
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (creation_failure_alert = document.getElementById("creation_failure")) {
    //Remove the alert five seconds after the document has finished loading with a fade out effect
    $(document).ready(() => {
        setTimeout(() => {
            $(creation_failure_alert).fadeOut(1000, () => {
                creation_failure_alert.remove();
            });
        }, 5000)
    });
}
//Warn the user before he leaves the page
function beforeUnloadCallback(event) {
    event.returnValue = "Your post will be discarded!";
}
//Since the above function will also be executed when a form is being submitted, the user shouldn't be shown a warning (Because it would be illogical if a user sees a warning while submitting a post:))
document.getElementById("create_post_form").addEventListener("submit", () => {
    window.removeEventListener("beforeunload", beforeUnloadCallback);
});

//Add a before-unload event listener
window.addEventListener("beforeunload", beforeUnloadCallback);

//Preview the thumbnail
var thumbnail = document.getElementById("thumbnail_input")
var thumbnail_preview = document.getElementById('thumbnail_preview')
var tp_container = document.getElementById('thumbnail_preview_container')
    //Setting a display value of none will prevent the "tp_container" from taking up unnecessary space when it's not being used
tp_container.style.display = 'none'
thumbnail_preview.style.display = 'none'
thumbnail.addEventListener("change", function() {
        tp_container.style.display = "block";
        thumbnail_preview.style.display = "block";
        thumbnail_preview.src = window.URL.createObjectURL(this.files[0]);

        //Crop Image

        // new Cropper(thumbnail_preview, {
        //     aspectRatio: 9 / 5,
        //     crop(event) {
        //         console.log(event.detail.x);
        //         console.log(event.detail.y);
        //         console.log(event.detail.width);
        //         console.log(event.detail.height);
        //         console.log(event.detail.rotate);
        //         console.log(event.detail.scaleX);
        //         console.log(event.detail.scaleY);
        //     },
        // })
    })
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
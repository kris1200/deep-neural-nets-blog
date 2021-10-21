//Trim whitespaces in the textarea
document.getElementById("body_input").innerHTML = document.getElementById("body_input").innerHTML.trim();

//Submit the deletion form to the designated route
document.getElementById("delete_post").addEventListener("click", () => {
    document.getElementById("send_delete_request").submit();
})

//Deletion alert
if (deletion_failure_alert = document.getElementById("deletion_failure")) {
    //Remove the alert five seconds after the document has finished loading with a fade out effect
    $(document).ready(() => {
        setTimeout(() => {
            $("#deletion_failure").fadeOut(1000, () => {
                deletion_failure_alert.remove();
            });
        }, 5000)
    });
}

// Update alert
if (update_failure_alert = document.getElementById("update_failure")) {
    //Remove the alert five seconds after the document has finished loading with a fade out effect
    $(document).ready(() => {
        setTimeout(() => {
            $("#update_failure").fadeOut(1000, () => {
                update_failure_alert.remove();
            });
        }, 5000)
    });
}


//Warn the user before he leaves the page
function beforeUnloadCallback(event) {
    event.returnValue = "Your edits on this post will be discarded!";
}
//Since the above function will also be executed when a form is being submitted, the user shouldn't be shown a warning (Because it would be illogical if a user sees a warning while submitting a post:))
document.getElementById("edit_post_form").addEventListener("submit", () => {
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
    })
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

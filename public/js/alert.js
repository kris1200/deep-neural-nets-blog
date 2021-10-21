// Deletion related alerts
if (deletion_success_alert = document.getElementById("deletion_success")) {
    //Remove the alert five seconds after the document has finished loading with a fade out effect
    $(document).ready(() => {
        setTimeout(() => {
            $("#deletion_success").fadeOut(1000, () => {
                deletion_success_alert.remove();
            });
        }, 5000)
    });
}

// End of deletion related alerts

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Update related alerts
if (update_success_alert = document.getElementById("update_success")) {
    //Remove the alert five seconds after the document has finished loading with a fade out effect
    $(document).ready(() => {
        setTimeout(() => {
            $("#update_success").fadeOut(1000, () => {
                update_success_alert.remove();
            });
        }, 5000)
    });
}


// End of Update related alerts

//Creation related alerts
if (creation_success_alert = document.getElementById("creation_success")) {
    //Remove the alert five seconds after the document has finished loading with a fade out effect
    $(document).ready(() => {
        setTimeout(() => {
            $("#creation_success").fadeOut(1000, () => {
                creation_success_alert.remove();
            });
        }, 5000)
    });
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

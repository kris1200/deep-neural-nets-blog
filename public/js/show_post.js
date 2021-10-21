//Submit the deletion form to the designated route
if (document.getElementById("delete_post")) {
    document.getElementById("delete_post").addEventListener("click", () => {
        document.getElementById("send_delete_request").submit();
    });
}

const button = document.querySelector('#submit');
let response = $("#response")
button.addEventListener('click', () => {
    if($("#filename").val()===""){
        response.removeClass();
        response.addClass("failed");
        response.html("Zadaj názov súboru !!!");
        return -1;
    }
    document.getElementById("response").innerHTML = '<img src="images/uploading.gif" class="loading" alt="...">';
    const form = new FormData(document.querySelector('#profileData'));
    const url = 'upload.php'
    const request = new Request(url, {
        method: 'POST',
        body: form
    });
    fetch(request)
        .then(response => response.json())
        .then(data => {
            response.removeClass();
            if(data.message === "File uploaded successfully"){
                response.addClass("success");
            }else{
                response.addClass("failed");
            }

            response.html(data.message);
            $("#table-div").load("table.php");
        });
});
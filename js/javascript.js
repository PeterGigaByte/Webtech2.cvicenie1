const button = document.querySelector('#submit');
button.addEventListener('click', () => {
    document.getElementById("response").innerHTML = '<img src="images/uploading.gif" class="loading" alt="...">';
    const form = new FormData(document.querySelector('#profileData'));
    const url = 'upload.php'
    const request = new Request(url, {
        method: 'POST',
        body: form
    });
    fetch(request)
        .then(response => response.json())
        .then(data => { document.getElementById("response").innerHTML = data.message;
            $("#table-div").load("table.php");});
});
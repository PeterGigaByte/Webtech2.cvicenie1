const button = document.querySelector('#submit');
button.addEventListener('click', () => {

    const form = new FormData(document.querySelector('#profileData'));
    const url = 'upload.php'
    const request = new Request(url, {
        method: 'POST',
        body: form
    });

    fetch(request)
        .then(response => response.json())
        .then(data => { console.log(data); })
});
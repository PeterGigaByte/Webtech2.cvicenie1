const button = document.querySelector('#submit');
let response = $("#response")
button.addEventListener('click', () => {
    document.getElementById("path").value = path;
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
            $.post('table.php', 'val=' + path, function (response) {
                $("#table-div").html(response);
                changePath();
                stepBack();
                document.getElementById("path").value = path;
            });
        });

});
let path = ''
function changePath(){
    $(".pointer").click(function () {
        if(path === ''){

            path='/'+$(this).text();
        }else{
            path = path+'/'+$(this).text();

        }
        console.log(path);
        $.post('table.php', 'val='+ path , function (response) {
            $("#table-div").html(response);
            console.log("hh");
            changePath();
            stepBack();
            document.getElementById("path").value = path;
        });
    });
}

function stepBack(){
    $(".step-back").click(function () {
        let pathSplitted =  path.split('/');
        console.log(pathSplitted);
        let pathBack = pathSplitted[pathSplitted.length-1];
        console.log(pathBack);
        path = path.replace('/'+pathBack,"");
        console.log(path);
        $.post('table.php', 'val=' + path, function (response) {
            $("#table-div").html(response);
            changePath();
            stepBack();
            document.getElementById("path").value = path;
        });
    });
}
stepBack();
changePath();


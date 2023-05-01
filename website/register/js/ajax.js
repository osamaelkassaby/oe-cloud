function check_username(username) {
    const request = new XMLHttpRequest();
    response = '';
    var err = document.getElementById('err');
    var usererr = document.getElementById('user-err');

    request.onreadystatechange = function() {
        if (request.readyState === 4 && request.status === 200) {

            console.log(request.responseText);

            err.innerHTML = "<div class='err'> <p> " + request.responseText + " </p> </div>";
            usererr.innerHTML = '<p style="color:red;font-size:25px;">' + request.responseText + '</p>';
        }
    }

    request.open('GET', 'http://localhost/register/username.php?username=' + username, true);
    request.send();
    return response;
}



var username = document.getElementById('username');
var pass = document.getElementById('password');

pass.addEventListener('focus', () => {
    console.log(check_username(username.value));
})



function check_eamil(email) {
    const request = new XMLHttpRequest();
    response = '';
    var err = document.getElementById('err');

    request.onreadystatechange = function() {
        if (request.readyState === 4 && request.status === 200) {

            console.log(request.responseText);

            err.innerHTML = "<div class='err'> <p> " + request.responseText + " </p> </div>";
        }
    }

    request.open('GET', 'http://localhost/register/username.php?email=' + email, true);
    request.send();
    return response;
}

var email = document.getElementById('email');
var phone = document.getElementById('phone');
phone.addEventListener('focus', () => {
    check_eamil(email.value);
})
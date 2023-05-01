
var btn;
var submit = document.getElementById('submit');
var btn_password = document.getElementById('password');
var con_password = document.getElementById('conpassword');
var check_box    = document.querySelector('#checkbox');
function month(){
    var month = document.getElementById('month');
    var day   = document.getElementById('day');
    if(month.value == "February"){
        if(day.value > 29){
            btn = 0;
        }else{
            btn = 1;
        }
    }else if(month.value == "April"){
        if(day.value > 30){
            btn = 0;
        }else{
            btn = 1;
        }
    }else if(month.value == "September"){
        if(day.value > 30){
            btn = 0;
        }else{
            btn = 1;
        }
    }else if(month.value == "November"){
        if(day.value > 30){
            btn = 0;
        }else{
            btn = 1;
        }
    }else if(month.value == "June"){
        if(day.value > 30){
            btn = 0;
        }else{
            btn = 1
        }
    }
}



function show_password() {
    if(btn_password.type == "password"){
        btn_password.type = "text";
        con_password.type = "text";
    }else{
        btn_password.type = "password";
        con_password.type = "password";
    }
       
    
   
}



function check_password(){
    var password = document.getElementById('password');
    var con_password = document.getElementById('conpassword');
    if(password.value != con_password.value){
        btn = 0;
    }
}


function year() {
   var year = document.getElementById('year');
   let number = year.value;
    if(isNaN(parseInt(number)))   {
        
        year.className = "error-year";
        btn = 0;
    }else{
        btn = 1;
    }
    if(number > 2009 ){
        year.className = "error-year";
        btn = 0;
    }
    
}

setInterval(() => {
    month();

    if(btn == 0){
        submit.disabled = true;
    }else if(btn == 1){
        submit.disabled = false;
    }

}, 1000);


setInterval(() => {
    check_password();

    if(btn == 0){
        submit.disabled = true;
    } else if(btn == 1){
        submit.disabled = false;
    }

}, 1000);

setInterval(() => {
    year();
}, 3000);

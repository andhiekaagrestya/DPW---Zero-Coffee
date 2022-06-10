

var error = "";


function generate(){
    var char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-=!@#$%&*_+"
    password = ""
    password1 = ""
    for(var i = 0; i < 12; i++){
        password += char.charAt(Math.floor(Math.random() * char.length ))
    }
    for(var i = 0; i < 8; i++){
        password1 += char.charAt(Math.floor(Math.random() * char.length ))
    }
    var pattern = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})/;
    var pattern2 = /[-=!@#$%&*_+]/;
    if(password.match(pattern) && password.match(pattern2)){
        return password
    }if(password1.match(pattern) && password1.match(pattern2)){
        return password1
    }
    else{
        return generate()
    }
}

$(document).ready(function(){
    $('.login-info-box').fadeOut();
    $('.login-show').addClass('show-log-panel');
});


$("#login").submit(function(event){
    event.preventDefault();
    var data = $(this).serialize();
    $.ajax({
        url: 'auth/login.php',
        type: 'post',
        data: data,
        success: function(response){
            console.log(response);
            if(response === 'berhasil'){
                swal({ icon: 'success',
                title: 'success...',
                text: "Anda Berhasil Login",
                footer: '<a href="">Why do I have this issue?</a>'}).then(() => {
                    window.location = "index.php";
                });
            }else{
                swal({ icon: 'error',
                title: 'Oops...',
                text: response,
                footer: '<a href="">Why do I have this issue?</a>'});
            }
        },
        error: function(){
            console.log(1)
        }
    });
});


// submit
$("#daftar").submit(function(event){
    event.preventDefault();
    var serializedData = $(this).serialize();

    error = ""
    // REGES FullName
    var nama = $("#nama").val();
    var patternName = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/g;
    if(!nama.match(patternName)){

        error += 'Format Nama Anda salah...!\n';
    }


    // REGEX Email
    var email = $("#email").val();

    var patternEmail = /[a-z0-9]+@[a-z]+\.[a-z]{2,3}/g;
    
    if(!email.match(patternEmail) ){
        console.log("ok");
        error += 'Format Email Anda salah...!\n';
    }

    // REGEX Password
    var pw = $("#pw").val();
    var pattern = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})/;
    var pattern2 = /[-=!@#$%&*_+]/;
    if(!pw.match(pattern) && !pw.match(pattern2)){

        error += 'Password anda kurang kuat...!\n';
    }
    if(error){
        var message = error;
        swal({ icon: 'error',
        title: 'Oops...',
        text: message,
        footer: '<a href="">Why do I have this issue?</a>'});
        $('.alert .list-alert').html(error);
    }else{
        $.ajax({
            url: "auth/register.php",
            type: "post",
            data: serializedData ,
            success: function (response) {
                if(response == 9){
                    swal({ icon: 'error',
                    title: 'Oops...',
                    text: "Usename Sudah ada",
                    footer: '<a href="">Why do I have this issue?</a>'});
                }

                //Saran Email
                else if(response == 10){
                    swal({ icon: 'error',
                    title: 'Oops...',
                    text: "Email Sudah ada",
                    footer: '<a href="">Why do I have this issue?</a>'});
                    var kosong = ""
                    for (var i = 0; i < 2 ; i++){
                        var email = generateEmail($("#username").val());
                        kosong += '<li style="cursor: pointer; color: red;" onclick="getEmail(\''+email+'\')">'+email+'</li>'
                    }
                    $('#gmail').html(kosong);
                }else{
                    console.log(response);
                    swal({ icon: 'success',
                    title: 'Success...',
                    text: "Akun Berhasil dibuat",
                    footer: '<a href="">Why do I have this issue?</a>'});
                    $("#daftar")[0].reset()
                }
               
            },
            error: function(jqXHR, textStatus, errorThrown) {
               
            }
        });
    }

});



$("#update").submit(function(event){
    event.preventDefault();
    var serializedData = $(this).serialize();
    
    error = ""

    // validasi pw
    var pw = $("#pwbaru").val();
    var pattern = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})/;
    var pattern2 = /[-=!@#$%&*_+]/;
    if(!pw.match(pattern) && !pw.match(pattern2)){

        error += 'Password anda kurang kuat...!\n';
    }

    // validasi pw
    var pwlama = $("#pwlama").val();
    var pattern = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})/;
    var pattern2 = /[-=!@#$%&*_+]/;
    if(!pwlama.match(pattern) && !pwlama.match(pattern2)){

        error += 'Password anda kurang kuat...!\n';
    }

    if(error){
        var message = error;
        swal({ icon: 'error',
        title: 'Oops...',
        text: message,
        footer: '<a href="">Why do I have this issue?</a>'});
        $('.alert .list-alert').html(error);
    }else{
        var data = {
            pwlama: pwlama,
            pwbaru: pw,
        }
        console.log(data);
        $.ajax({
            url: "auth/update.php",
            type: "post",
            data: data ,
            success: function (response) {
                console.log(response)
                $("#update")[0].reset()
                if(response == 9){
                    swal({ icon: 'error',
                    title: 'Oops...',
                    text: "Password Lama tidak cocok",
                    footer: '<a href="">Why do I have this issue?</a>'});
                }
                else if(response == 1){
                    swal({ icon: 'success',
                    title: 'Success...',
                    text: "Data Berhasil dirubah",
                    footer: '<a href="">Why do I have this issue?</a>'});
                }
               
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    }
});

$('.btn-generate').on("click",  function(event) {
    event.preventDefault();
    $('#pw').attr('type', 'text');
    $('#pw').val(generate());
});


function generateEmail(username){
    var angka = "123467890";
    var email = username;

    for (var i = 0; i < 3; i++){
        email += angka.charAt(Math.floor(Math.random() * angka.length ))
    }

    return email+"@gmail.com";
}

function getEmail(email){
    console.log(email)
    $('#email').val(email);
}

$('.login-reg-panel input[type="radio"]').on('change', function() {
    if($('#log-login-show').is(':checked')) {
        $('.register-info-box').fadeOut(); 
        $('.login-info-box').fadeIn();
        
        $('.white-panel').addClass('right-log');
        $('.register-show').addClass('show-log-panel');
        $('.login-show').removeClass('show-log-panel');
        
    }
    else if($('#log-reg-show').is(':checked')) {
        $('.register-info-box').fadeIn();
        $('.login-info-box').fadeOut();
        
        $('.white-panel').removeClass('right-log');
        
        $('.login-show').addClass('show-log-panel');
        $('.register-show').removeClass('show-log-panel');
    }
});

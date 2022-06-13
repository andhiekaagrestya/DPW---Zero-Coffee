
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Login/Registration Form Transition</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'><link rel="stylesheet" href="{{asset('assets/style.css')}}">

</head>
<body>
  <p class="tip"></p>
  <div class="cont">
    <div class="form sign-in">
      <h2>Welcome back,</h2>
        <form action="" id="login">
            <label>
                <span>Email</span>
                <input name="email" id="email" type="email" />
              </label>
              <label>
                <span>Password</span>
                <input name="password" type="password" />
              </label>
              <!-- <p class="forgot-pass">Forgot password?</p> -->
              <button type="submit" class="submit">Sign In</button>
        </form>
      <!-- <button type="button" class="fb-btn">Connect with <span>facebook</span></button> -->
    </div>
    <div class="sub-cont">
      <div class="img">
        <div class="img__text m--up">
          <h2>New here?</h2>
          <p>Sign up and discover great amount of new opportunities!</p>
        </div>
        <div class="img__text m--in">
          <h2>One of us?</h2>
          <p>If you already has an account, just sign in. We've missed you!</p>
        </div>
        <div class="img__btn">
          <span class="m--up">Sign Up</span>
          <span class="m--in">Sign In</span>
        </div>
      </div>
      <div class="form sign-up">
        <h2>Time to feel like home,</h2>
        <form action="" id="register">
            <label>
                <span>Name</span>
                <input type="text" name="name" />
              </label>
              <label>
                <span>Email</span>
                <input type="email" name="email" />
              </label>
              <label>
                <span>Password</span>
                <input type="password" name="password" />
              </label>
              <button type="submit" class="submit">Sign Up</button>
        </form>
      </div>
    </div>
  </div>

  <a href="https://www.instagram.com/syachfarhan_/" class="icon-link">
    <img src="https://cdn3.iconfinder.com/data/icons/social-network-30/512/social-03-1024.png">
  </a>

  <a href="https://www.instagram.com/dianprnms/" class="icon-link icon-link--1">
    <img src="https://cdn3.iconfinder.com/data/icons/social-network-30/512/social-03-1024.png">
  </a>

  <a href="https://www.instagram.com/ryakid/" class="icon-link icon-link--2">
    <img src="https://cdn3.iconfinder.com/data/icons/social-network-30/512/social-03-1024.png">
  </a>

  <script  src="{{asset('assets/script.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  {{-- <script src="{{ asset('auth/script.js') }}"></script> --}}
  <script>
      

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

function setCookie(cname, cvalue, exdays) {
const d = new Date();
d.setTime(d.getTime() + (exdays*24*60*60*1000));
let expires = "expires="+ d.toUTCString();
document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

$(document).ready(function(){
  $('.login-info-box').fadeOut();
  $('.login-show').addClass('show-log-panel');
});


$("#login").submit(function(event){

  event.preventDefault();
  var data = $(this).serialize();
  let email = $('#email').val();

  $.ajax({
      url: 'http://127.0.0.1:8000/api/login',
      type: 'post',
      data: data,
      success: function(response){
          if(response['message'] === 'Berhasil Login.'){
              setCookie('email', email, 1);
              setCookie('token', response['token'], 1);
              swal({ icon: 'success',
              title: 'success...',
              text: "Anda Berhasil Login",
              footer: '<a href="">Why do I have this issue?</a>'}).then(() => {
                  window.location = "/";
              });
          }else{
              swal({
                  icon: 'error',
                  title: 'Oops...',
                  text: response.message,
              })
          }
      },
      error: function(){
          console.log(1)
      }
  });
});

$("#register").submit(function(event){
event.preventDefault();
var data = $(this).serialize();
let email = $('#email').val();

$.ajax({
    url: 'http://127.0.0.1:8000/api/register',
    type: 'post',
    data: data,
    success: function(response){
        if(response['message'] === 'Berhasil Daftar.'){
            setCookie('email', email, 1);
            setCookie('token', response['token'], 1);
            swal({ icon: 'success',
            title: 'success...',
            text: "Anda Berhasil Daftar",
            footer: '<a href="">Why do I have this issue?</a>'}).then(() => {
                window.location = "/";
            });
        }else{
            swal({
                icon: 'error',
                title: 'Oops...',
                text: response.message,
            })
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

      $.ajax({
          url: "auth/update.php",
          type: "post",
          data: data ,
          success: function (response) {

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

  </script>

</body>
</html>


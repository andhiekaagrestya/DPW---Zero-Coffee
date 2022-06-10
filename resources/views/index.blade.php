<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive coffee shop website design</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    @yield("style")

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo">
        <img src="images/logo.png" alt="">
    </a>

    <nav class="navbar">
        {{-- <a href="#home">home</a> --}}
        <a href="/#products">Menu</a>
        <a href="/#promo">Promo</a>
        <a href="/#review">Review</a>
        <a href="/#contact">Contact</a>
        <a href="/#about">About Us</a>
        {{-- <a href="#blogs">blogs</a> --}}
    </nav>

    <div class="icons">
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
        <span id="ckjum" style="background: #d3ad7f;color: white; padding: 2px 5px; border-radius: 50%;">0</span>
        <div class="fas" id="logout"><i class="bi bi-person-fill"></i></div>

        {{-- <div class="fas fa-shopping-cart" id="cart-btn"></div> --}}
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <div class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </div>

    <div class="cart-items-container">
        <div id="checkout">
            <div class="cart-item">
                <span class="fas fa-times"></span>
                <img src="images/cart-item-1.png" alt="">
                <div class="content">
                    <h3>cart item 01</h3>
                    <div class="price">$15.99/-</div>
                </div>
            </div>
            <div class="cart-item">
                <span class="fas fa-times"></span>
                <img src="images/cart-item-2.png" alt="">
                <div class="content">
                    <h3>cart item 02</h3>
                    <div class="price">$15.99/-</div>
                </div>
            </div>
            <div class="cart-item">
                <span class="fas fa-times"></span>
                <img src="images/cart-item-3.png" alt="">
                <div class="content">
                    <h3>cart item 03</h3>
                    <div class="price">$15.99/-</div>
                </div>
            </div>
        </div>
        <a href="/checkout" class="btn">checkout now</a>

    </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>fresh coffee in the morning</h3>
        <p>It doesn’t matter where you are from or how you feel, there is always peace in a strong cup of coffee.</p>
        <a href="#products" class="btn">get yours now</a>
    </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span>about</span> us </h1>

    <div class="row">

        <div class="image">
            <img src="images/about-img.jpeg" alt="">
        </div>

        <div class="content">
            <h3>what makes our coffee special?</h3>
            <p>Zero Coffee dimulai dari project  kelompok pada mata kuliah Desain Pemrograman Web. </p>
            <p>Kopi dan snack yang kami sediakan untuk pelanggan menggunakan bahan-bahan yang berkualitas tinggi. </p>
            <p>Barista di Zero  Coffee sudah berpengalaman lebih dari 1 tahun serta sudah menerima pelatihan yang baik dari Zero Coffee.</p>
            <a href="#" class="btn">learn more</a>
        </div>

    </div>

</section>

<!-- about section ends -->

<!-- menu section starts  -->


<!-- menu section ends -->

<section class="products" id="products">

    <h1 class="heading"> our <span>products</span> </h1>

    <div class="box-container" id="data-product">

       

    </div>

</section>


<section class="promo" id="promo">
    <h1 class="heading"> our <span>promo</span> </h1>

    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="mb-5 promo">FREE TUMBLER</h1>
            <h1 class="mt-5 promo">For 100K Purchase</h1>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/tumbler.png') }}" style="width: 100%;" alt="">
        </div>
    </div>

</section>
<!-- review section starts  -->

<section class="review" id="review">

    <h1 class="heading"> customer's <span>review</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/quote-img.png" alt="" class="quote">
            <p>Harganya cukup terjangkau</p>
            <img src="images/pic-1.png" class="user" alt="">
            <h3>Dika</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
        </div>

        <div class="box">
            <img src="images/quote-img.png" alt="" class="quote">
            <p>Kopinya sangat enak</p>
            <img src="images/pic-2.png" class="user" alt="">
            <h3>Dian</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
        </div>
        
        <div class="box">
            <img src="images/quote-img.png" alt="" class="quote">
            <p>Promonya sangat menarik</p>
            <img src="images/pic-3.png" class="user" alt="">
            <h3>Ansah</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
        </div>

    </div>

</section>

<!-- review section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

    <h1 class="heading"> <span>contact</span> us </h1>

    <div class="row">

        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30153.788252261566!2d72.82321484621745!3d19.141690214227783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b63aceef0c69%3A0x2aa80cf2287dfa3b!2sJogeshwari%20West%2C%20Mumbai%2C%20Maharashtra%20400047!5e0!3m2!1sen!2sin!4v1629452077891!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>

        <form action="">
            <h3>get in touch</h3>
            <div class="inputBox">
                <span class="fas fa-user"></span>
                <input type="text" placeholder="name">
            </div>
            <div class="inputBox">
                <span class="fas fa-envelope"></span>
                <input type="email" placeholder="email">
            </div>
            <div class="inputBox">
                <span class="fas fa-phone"></span>
                <input type="number" placeholder="number">
            </div>
            <input type="submit" value="contact now" class="btn">
        </form>

    </div>

</section>

<!-- contact section ends -->

<!-- blogs section starts  -->


<!-- blogs section ends -->

<!-- footer section starts  -->

<footer>
    <section class="footer">
        <div class="row">
            <div class="box-footer">
                <h2 class="title">Zero <br> Coffee.</h2>
            </div>
            <div class="box-footer">
                <h3 class="title-contact">Contact</h3>
                <ul>
                    <li>+62 852 346 000</li>
                    <li>info@zerocoffee.com</li>
                    
                    <li class="space">1959 Sepulveda Blvd.</li>
                    <li>Culver City, CA, 90230</li>
                </ul>
            </div>
            <div class="box-footer">
                <h3>Never Miss a Recipe</h3>
                <div class="form">
    
                    <input type="text" class="text-inp" placeholder="Email Address" class="subscribe">
                    <input type="submit" class="btn" value="Subcribe">
                </div>
                <p>Join our subcribers and get best recipe delivered each week!</p>
            </div>
    
        </div>
    </section>
    <hr style="border-top: 2px dashed #FFFFFF">
    <div class="footer-bottom">
        <div class="copyright">
            Copyright &copy; 2022 Zero Coffee, Inc. - All rights Reserved.
        </div>
        <div class="icon-socmed">
            <i class="bi bi-youtube"></i>
            <i class="bi bi-facebook"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-instagram"></i>
        </div>
    </div>
</footer>

















<!-- custom js file link  -->
<script src="{{asset('js/script.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
    // $("#data-product").html("aku")

    let BASEURL = 'http://127.0.0.1:8000/api/'

    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for(let i = 0; i <ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
            c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    let getProduct = async () => {
        // let data = await fetch(BASEURL+'product')
        $.ajax({
            url: BASEURL+"product",
            type: 'GET',
            success: function(res) {
                // console.log(res.data)
                let data = ""
                res.data.forEach(product => {
                    data += `<div class="box">
                                <div class="icons">
                                    <a href="#" id="cart" data-id="${product.id}" class="fas fa-shopping-cart"></a>
                    
                                </div>
                                <div class="image">
                                    <img src="${product.image}" alt="">
                                </div>
                                <div class="content">
                                    <h3>${product.name}</h3>
                                    <div class="price">Rp. ${product.price}</div>
                                </div>
                            </div>`;
                });
                $("#data-product").html(data)
                // alert(res);
            }
        });
    }

    let getCk = async () => {
        let isLogin = getCookie('token') != "" ? true : false;
        // console.log("ck")
        if(isLogin){
            // let ck = "";
            let ck = "";
            let total = 0;
            $.ajax({
                url: BASEURL+'orders/checkout',
                type: 'POST',
                data: {
                    email: getCookie('email')
                },
                success: function(res){
                    console.log(res.data[0]);
                    res.data[0].order_detail.forEach((row) =>{
                        console.log(row.product[0].id)
                        ck += `<div class="cart-item">
                            <span class="fas fa-times"></span>
                            <img src="${row.product[0].image}" alt="">
                            <div class="content">
                                <h3>${row.product[0].name}</h3>
                                <div class="price">${row.product[0].price}/-</div>
                            </div>
                        </div>`;
                        total += 1;
                    });
                    // console.log(ck)
                    $("#checkout").html(ck);
                    $("#ckjum").html(total)
                }
            })
        }else{
            $("#checkout").html("<h3 style='text-align: center; margin-top: 30px;'>Anda belum Login.</h3>")
        }
    }
    $(document).ready(function(){
        getProduct()
        getCk()
    })


    $(document).on('click', "#cart", function(e){
            e.preventDefault()
            let id = $(this).data('id');
            console.log(id);
            let isCookie = getCookie('token') != "" ? true : false;
            if(!isCookie){
                swal({
                    title: "Anda belum login",
                    text: "Silahkan Login terlebih dahulu!",
                    icon: "warning",
                    type: "warning",
                    buttons: ["Cancel","Login!"],
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((willDelete) => {
                    if (willDelete) {
                        window.location = "/sign"
                    }
                });
            }else{
                let url = BASEURL+'orders/cart'
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        id: id,
                        email: getCookie('email')
                    },
                    success: function(res){
                        // console.log(res)
                        console.log(res)
                        if(res.status){
                            swal({ icon: 'success',
                                title: 'success...',
                                text: res.message,
                            }).then(()=>{
                                getCk()
                            });
                        }
                    }
                })
                // console.log(id)
            }

        }); 

        function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        let expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

        $(document).on('click', '#logout', function(e){
        console.log("ok")
        
        setCookie("email", "", -1)
        swal({ icon: 'success',
                            title: 'success...',
                            text: "berhasil logout",
                        }).then(()=>{
                            window.location="/sign"
                        });
    });


</script>

</body>
</html>
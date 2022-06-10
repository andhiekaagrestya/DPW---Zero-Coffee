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

    <a href="/#" class="logo">
        <img src="images/logo.png" alt="">
    </a>

    <nav class="navbar">
        {{-- <a href="#home">home</a> --}}
        <a href="/#menu">Menu</a>
        <a href="/#products">Promo</a>
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



</header>




<section  style="margin-top: 130px;" id="about">

    <h1 class="heading"> YOUR <span>ORDER'S</span></h1>

    {{-- <div class="row text-white"> --}}
    <form class="row text-white" action="" >
        <div class="col-md-8">
            <h3>Total Belanja</h3>
            <div id="data">

            </div>
        </div>
        <div class="col-md-4 px-5" style="border-left: 2px solid #FFFFFF ">
            <h3 class="text-white">Harga Total Tanpa Ongkir</h3>
            <input class="mt-3 input-total" id="inptotal" type="text" value="35000000">

            <h3 class="text-white mt-5">Pilih Pembayaran</h3>
            <select class="mt-3 input-total" id="method" name="method">
                {{-- <option selected>Open this select menu</option> --}}
                <option value="OVO" selected>OVO</option>
                <option value="DANA">DANA</option>
                <option value="BRI">BRI</option>
              </select>

              <h3 class="text-white mt-5">Pilih Kurir</h3>
              <div class="form-check mt-3">
                <input class="form-check-input" type="radio" value="grab" name="kurir" id="kurir2">
                <label class="form-check-label" style="font-size: 13px;" for="kurir1">
                  Grab
                </label>
              </div>
              <div class="form-check mt-3">
                <input class="form-check-input" type="radio" value="gojek" name="kurir" id="kurir2" checked>
                <label class="form-check-label" style="font-size: 13px;" for="kurir2">
                  Gojek
                </label>
              </div>
              <div class="form-check mt-3">
                <input class="form-check-input" type="radio" value="zerodriver" name="kurir" id="kurir2" checked>
                <label class="form-check-label" style="font-size: 13px;" for="kurir2">
                  Zero Driver
                </label>
              </div>
              <div class="form-check mt-3">
                <input class="form-check-input" type="radio" value="lalamove" name="kurir" id="kurir2" >
                <label class="form-check-label" style="font-size: 13px;" for="kurir2">
                  Lalamove
                </label>
              </div>

              <div class="mt-5 box-total">
                    <div class="row justify-content-center">
                            <div class="col-md-6 text-end">
                                Total Harga
                            </div>
                            <div class="col-md-6" id="total">:  Rp. 0</div>
                    </div>
                    <div class="row justify-content-center">
                            <div class="col-md-6 text-end">
                                Pajak Pembayaran
                            </div>
                            <div class="col-md-6">:  Rp. 1000</div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-end">
                            Pajak Kurir
                        </div>
                        <div class="col-md-6">:  Rp. 0</div>
                    </div>
                    <hr style="border: 1px solid #fff">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-end">
                            Total
                        </div>
                        <div class="col-md-6" id="totakh">:  Rp. 0</div>
                    </div>

                    <div class="mt-3">
                        <input type="submit" class="btn-checkout" id="buying" value="checkout">
                    </div>
              </div>
        </div>
    </form>
    {{-- </div> --}}

</section>

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
    var id;
    var total;
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
                                    <a href="#" class="fas fa-heart"></a>
                                    <a href="#" class="fas fa-eye"></a>
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
        console.log("ck")
        if(isLogin){
            // let ck = "";
            let ck = "";
            $.ajax({
                url: BASEURL+'orders/checkout',
                type: 'POST',
                data: {
                    email: getCookie('email')
                },
                success: function(res){
                    // console.log(res.data[0]);
                    let totals = 0
                    id = res.data[0].id
                    res.data[0].order_detail.forEach((row) =>{
                        console.log(row.product[0].id)
                        ck += `<div class="row mt-3 align-items-center">
                    <div class="col-md-3">
                        <img src="{{ asset('${row.product[0].image}') }}" width="100%" alt="">
                    </div>
                    <div class="col-md-3">
                        <h3>${row.product[0].name}</h3>
                    </div>
                    <div class="col-md-3">
                        {{-- <input type=""> --}}
                        <button class="btn-minus"><i class="bi bi-dash-lg"></i></button>
                        <input type="number" class="inpnum" min="1" value="${row.amount}">
                        <button class="btn-plus"><i class="bi bi-plus-lg"></i></button>
                    </div>
                    <div class="col-md-3">
                        <h4>
    
                            Rp. ${row.price}
                            <a href="#" id="hapus" data-id="${row.id}" class="text-white"><i class="bi bi-trash3"></i></a>
                        </h4>
                    </div>
                </div>`;
                        totals += parseInt(row.price);
                    });
                    // console.log(ck)
                    $("#data").html(ck);
                    $("#inptotal").val(totals);
                    $("#total").html('Rp. '+totals)
                    $("#totakh").html('Rp. '+(totals - 1000))
                    total = totals
                }
            })
        }else{
            $("#data").html("<h3 style='text-align: center; margin-top: 30px;'>Anda belum Login.</h3>")
        }
    }
    let buy = () => {
        let kurir = $('#kurir2').val();
        let method = $('#method').val();
        let data = {
            id: id,
            kurir: kurir,
            method: method
        }
        $.ajax({
            url: BASEURL+"orders/buying",
            type: 'POST',
            data: data,
            success: function(res){
                swal({ icon: 'success',
                    title: 'success...',
                    text: res.message,
                }).then(() => {
                    getCk();
                    window.location = "/checkout/after";
                });
            }
        });
    }
    $(document).on('click', '#buying', function(e){
        if(total > 100000){
            swal({ icon: 'success',
                    title: 'success...',
                    text: "Selamat anda mendapatkan tumbler, di pembelian lebih dari 100.000",
                }).then(() => {
                    buy()
                });
        }else{
            buy()
        }

        e.preventDefault()
    });

    $(document).ready(function(){
        getProduct()
        getCk()
    })

    $(document).on('click', '#hapus', function(e){
        e.preventDefault();
        let id = $(this).data('id');
        console.log(id);

        swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                buttons: ["Cancel","Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    // console.log(result)
                    if(result){
                        // console.log(id);
                        $.ajax({
                            url: BASEURL+'orders/delete/'+id,
                            type: 'GET',
                            success: function(res){
                                if(res.status){
                                    swal({ icon: 'success',
                                        title: 'success...',
                                        text: res.message,
                                    }).then(() => {
                                        getCk()
                                    });
                                }
                            }
                        });
                    
                    }
            });

    });
    $(document).on('click', "#cart", function(e){
            e.preventDefault()
            let id = $(this).data('id');
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
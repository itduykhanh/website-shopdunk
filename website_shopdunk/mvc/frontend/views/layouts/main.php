
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShopDunk</title>
    <base href="<?php echo $_SERVER['SCRIPT_NAME']; ?>" />
    <link rel="stylesheet" href="assets/frontend/icon/icon.css">
    <link rel="stylesheet" href="assets/frontend/css/style.css">
  <link rel="stylesheet" href="assets/frontend/css/app.css">
  <script src="assets/frontend/js/main.js"></script>
  <script src="assets/frontend/js/jquery-3.5.1.min.js"></script>
  <script src="assets/backend/js/jquery.validate.min.js"></script>
  <script src="assets/backend/js/additional-methods.min.js"></script>
<!--  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</head>
<body>
<script>
    function changeImage(id) {
        var srcImg = document.getElementById(id).getAttribute("src")
        document.getElementById("img-main").setAttribute("src", srcImg);
    }
</script>
<div>
    <?php require_once 'mvc/frontend/views/layouts/header.php'; ?>
<!--  -->
  <div class="margin20px">
    <?php  if(isset($_SESSION['success'])): ?>
      <div class="container">
        <div class="alert alert-success alert-dismissible"role="alert">
          <?php echo "<i class='fa fa-check'></i>" . $_SESSION["success"];
          unset($_SESSION["success"]); ?>
        </div>
      </div>
    <?php endif;?>
    <?php  if(isset($_SESSION['error'])): ?>
    <div class="container">
      <div class="alert alert-danger alert-dismissible "role="alert">
        <?php echo "<i class='fa fa-times'></i>" .$_SESSION["error"];
        unset($_SESSION["error"]); ?>
      </div>
      <?php endif;?>
      <?php echo $this->content; ?>
      <!--  -->
  </div>

    <?php require_once 'mvc/frontend/views/layouts/footer.php'; ?>
</div>

</body>

</html>
<script>
    $(".icon-search").click(function(event) {
        event.preventDefault();
        if ($(".search").hasClass("hidden")) {
            $(".search").addClass("active").removeClass("hidden");
        } else {
            $(".search").addClass("hidden").removeClass("active")
        }
    });
    $("#register_form").validate({
        rules:  {
            fullname : "required",
            email :{
                required: true,
                email: true
            },
            phone :
                {
                    required : true,
                    number: true,
                    maxlength:10,
                    minlength:10
                },
            password: {
                required: true,
                minlength: 5
            },
        },
        messages :
            {
                fullname : " * H??? t??n kh??ng ???????c ????? tr???ng",
                email :{
                    required: " * Email kh??ng ???????c ????? tr???ng",
                    email: " * Ph???i ????ng ?????nh d???ng l?? Email"
                },
                phone :
                    {
                        required : " * S??? ??i???n tho???i kh??ng ???????c ????? tr???ng",
                        number: "* Ph???i nh???p s??? kh??ng ???????c nh???p ch??? hay k?? t??? ????c bi???t",
                        minlength: " * S??? ??i???n tho???i ph???i c?? ??t nh???t 10 s???",
                        maxlength :" * S??? ??i???n tho???i kh??ng ???????c qu?? 10 s???",
                    },
                password: {
                    required: " * M???t kh???u kh??ng ???????c ????? tr???ng",
                    minlength: " * M???t kh???u ph???i c?? ??t nh???t 5 k?? t???",
                },
            }
    });
    $("#register_email").keyup(function () {
        let email = $(this).val();
        $.post("index.php?area=frontend&controller=login&action=validateEmail",
            {email: email},
            function (data) {
                if (data == "True") {
                    $("#emailerror").text(" * Email n??y ???? ???????c ????ng k??");
                    $("#emailerror").css("font-style","italic");
                    $("#emailerror").css("font-size","12px");
                    $("#emailerror").css("color","red");
                    document.getElementById("button_submit").disabled = true;
                }
                else {
                    document.getElementById("button_submit").disabled = false;
                    $("#emailerror").text("");
                }
            });
    });
    $("#register_phone").keyup(function () {
        let phone = $(this).val();
        $.post("index.php?area=frontend&controller=login&action=validatePhone",
            {phone: phone},
            function (data) {

                if (data == "True") {
                    $("#phoneerror").text(" * S??? ??i???n tho???i n??y ???? ???????c ????ng k??");
                    $("#phoneerror").css("font-style","italic");
                    $("#phoneerror").css("font-size","12px");
                    $("#phoneerror").css("color","red");
                    document.getElementById("button_submit").disabled = true;
                }
                else {
                    document.getElementById("button_submit").disabled = false;
                    $("#phoneerror").text("");
                }
            });
    });
    $("#login_frontend").validate({
        rules:  {
            email :{
                required: true,
                email: true
            },
            password: {
                required: true,
            },
        },
        messages :
            {
                email :{
                    required: " *Email kh??ng ???????c ????? tr???ng",
                    email: " *T??n ????ng nh??p ph???i ????ng ?????nh d???ng l?? Email"
                },

                password: {
                    required: " * M???t kh???u kh??ng ???????c ????? tr???ng",
                },
            }
    });

    $("#thanhtoandonhang").validate({

        rules:  {
            fullname : "required",
            email :{
                required: true,
                email: true
            },
            phone :
                {
                    required : true,
                    number: true,
                },
            address: {
                required: true,
            },
        },
        messages :
            {
                fullname : " * H??? t??n kh??ng ???????c ????? tr???ng",
                email :{
                    required: " * Email kh??ng ???????c ????? tr???ng",
                    email: " * Ph???i ????ng ?????nh d???ng l?? Email"
                },
                phone :
                    {
                        required: " * S??? ??i???n tho???i kh??ng ???????c ????? tr???ng",
                        number: "* Ph???i nh???p s??? kh??ng ???????c nh???p ch??? hay k?? t??? ????c bi???t",
                    },
                address: {
                    required: " * ?????a ch??? nh???n h??ng kh??ng ???????c ????? tr???ng",
                },
            }
    });
    ////////////////////////////////
    $(document).ready(function(){

        filter_data();

        function filter_data()
        {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var id=$('.get_id').val();
            var price = get_filter('price');
            if(price  && id ){
                $.ajax({
                    url:"index.php?area=frontend&controller=Product&action=searchProduct",
                    method:"POST",
                    data:{
                        id:id,
                        price:price,
                    },
                    success:function(data){
                        $('.filter_data').html(data);
                    }
                });
            }
        }
        function get_filter(class_name)
        {
            var filter = [];
            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });
            return filter;
        }

        $('.common_selector').click(function(){
            filter_data();
        });
        $("#product__search").keyup(function () {
            let name=$(this).val();
            let search = $.trim(name);
            if(search != '')
            {
                $(".result__product").css("display","block");
                $(".result__product").css("height","300px");
                $(".result__product").css("padding-top","10px");
                $(".result__product").css("overflow","auto");
                $.ajax({
                    url :"index.php?area=frontend&controller=product&action=searchProductName",
                    method: "POST",
                    data : {
                        search : search
                    },
                    dataType: "text",
                    success:function (data) {
                        console.log(data);
                        $(".result__product").html(data);
                    }
                });
            }
            else
            {
                $(".result__product").css("display","none");
            }
        });
    });
    $(function () {
        let listStar=$(".list-star .icon-star");
        listratingText= {
            1: 'Kh??ng th??ch',
            2: 'T???m ???????c',
            3: 'B??nh th?????ng',
            4: 'T???t',
            5: 'R???t t???t',
        };
        listStar.click(function () {
            let $this=$(this);
            let number=$this.attr('data-key');
            listStar.removeClass('active__star');
            $(".number_rating").val(number);
            $.each(listStar,function (key,value) {
                if(key +1 <=  number)
                {
                    $(this).addClass('active__star')
                }
            });
            $(".list-text").text('').text(listratingText[number]).show();
        });
    });
    $(document).ready(function() {
        $(".submit_rating").click(function () {
            event.preventDefault();
            let content=$("#content_rating").val();
            let number=$(".number_rating").val();
            let name=$("#name_rating").val();
            let url=$(this).attr('href');
            // console.log(content,number,name,url);
            if(content && number  && name)
            {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        number: number,
                        name: name,
                        content: content,
                    },
                    dataType : "text",
                }).done(function (data) {
                    console.log(data);
                    location.reload(data);
                    alert(data);
                });
            }
            else
            {
                alert("Vui l??ng nh???p ????? th??ng tin ????nh gi??")
            }
        });
    });

</script>

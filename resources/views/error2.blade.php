<html>
    <head>
        <link rel="stylesheet" href="/css/style.css">
        <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .error{
                height: 700px;
            }

            .message{
                color: black !imporatant;
                border: 3px solid red;
                padding: 20px;
            }

            .checkout p{
                    color: rgb(0, 0, 0);
                    font-size: 1.6em;

            }
            .checkout p:last-of-type, .checkout i:nth-of-type(3) {
                             opacity: 1;
            }
            .checkout i{
                color: red;
                margin-left: 50%;

                font-size: 100px;
                margin-bottom: 40px;

            }
            .fail{
                color: red;
                margin-left: 50%;

            }
            .method h2{
                color: #ff0000;
            }

            </style>
    </head>
    <body>
        <div id="wrapper">

            <div class="container2">
                <div class="checkout">


                    <div class="payment">
                        <div class="content">
                            <div class="infos error">

                                <div class="method">
                                    <h2>Something went wrong!</h2>

                                </div> <!-- .method -->
                                <i class="fas fa-times fa-lg" style="color: #ff0000;"></i>
                                <div class="alert alert-danger">{{ $response }}</div>
                            </div> <!-- .infos -->
                        </div> <!-- .content -->
                    </div> <!-- .payment -->
                </div> <!-- .checkout -->
            </div> <!-- .container2 -->
        </div> <!-- #wrapper -->
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/script.js"></script>
</html>

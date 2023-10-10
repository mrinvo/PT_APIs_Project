<html>
    <head>
        <link rel="stylesheet" href="/css/style.css">
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
                                    <h2>Error Page</h2>

                                </div> <!-- .method -->

                                <i class="fail">x</i>
                                <p class="message">{{ $response }}</p>

                            </div> <!-- .infos -->
                        </div> <!-- .content -->
                    </div> <!-- .payment -->
                </div> <!-- .checkout -->
            </div> <!-- .container2 -->
        </div> <!-- #wrapper -->
    </body>
    <script src="/js/script.js"></script>
</html>

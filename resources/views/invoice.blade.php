<html>
    <head>
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <div id="wrapper">
            <div class="container1">
                <div class="order">
                    <h2>Your order summary</h2>
                    <div class="item">
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/1978060/balle.png' alt=''>
                        <div class="info">
                            <h4>Trixie Soccer Ball, Vinyl</h4>
                            <p class="quantity">Quantity: 1</p>
                            <p class="price">30$</p>
                        </div> <!-- .info -->
                    </div> <!-- .item -->

                    <div class="item">
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/1978060/frisbee.png' alt=''>
                        <div class="info">
                            <h4>Trixie Dog Activity Dog Disc</h4>
                            <p class="quantity">Quantity: 3</p>
                            <p class="price">30$</p>
                        </div> <!-- .info -->
                    </div> <!-- .item -->

                    <div class="item">
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/1978060/harnais.png' alt=''>
                        <div class="info">
                            <h4>Julius K9 Powerharness, Mini/M</h4>
                            <p class="quantity">Quantity: 1</p>
                            <p class="price">40$</p>
                        </div> <!-- .info -->
                    </div> <!-- .item -->

                    <h4 class="ship">Shipping: FREE</h4>
                    <hr>
                    <h3 class="total">TOTAL: 100$</h3>
                </div> <!-- .order -->
            </div> <!-- .container1 -->

            <div class="container2">
                <div class="checkout">
                    <p><i class="fas fa-check-circle"></i>Shipping</p>
                    <p><i class="fas fa-check-circle"></i>Checkout</p>
                    <p><i class="fas fa-check-circle"></i>Payment</p>

                    <div class="payment">
                        <div class="content">
                            <div class="infos">

                                <div class="method">
                                    <h2>Hosted Payment Page</h2>
                                </div> <!-- .method -->

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                                <form action="/payment/invoice" method="POST">
                                    @csrf
                                <h3 class="customerDetailsTitle">Customer Details</h2>
                                <div class="customerDetailsWrapper">
                                    <div class="cardHolderName">
                                        <p class="title">name</p>
                                        <input type="text" name="customer_name">
                                    </div> <!-- cardHolderName -->
                                    <div class="cardHolderName">
                                        <p class="title">Email</p>
                                        <input type="email" name="customer_email">
                                    </div> <!-- cardHolderName -->
                                    <div class="cardHolderName">
                                        <p class="title">Phone</p>
                                        <input type="tel" name="customer_phone">
                                    </div> <!-- cardHolderName -->
                                    <div class="cardHolderName">
                                        <p class="title">Street</p>
                                        <input type="text" name="customer_street">
                                    </div> <!-- cardHolderName -->
                                    <div class="cardHolderName">
                                        <p class="title">Country</p>
                                        <input type="text" name="customer_country">
                                    </div> <!-- cardHolderName -->
                                    <div class="cardHolderName">
                                        <p class="title">City</p>
                                        <input type="text" name="customer_city">
                                    </div> <!-- cardHolderName -->
                                    <div class="cardHolderName">
                                        <p class="title">State</p>
                                        <input type="text" name="customer_state">
                                    </div> <!-- cardHolderName -->
                                    <div class="cardHolderName">
                                        <p class="title">Zip COde</p>
                                        <input type="text" name="customer_zip">
                                    </div> <!-- cardHolderName -->
                                </div>
                                <div class="shippingAsBillingWrapper">
                                    <input type="checkbox" name="paymentOption" value="paytaps" id="shippingAsBilling" checked onchange="changeShippingAsBillingStatus()">
                                    <label for="shippingAsBilling">Shipping Same As Billing</label>
                                </div>
                                <hr/>
                                <div class="shippinDetailsWrapper" id="shippinDetailsWrapperId">
                                    <h3 class="customerDetailsTitle">Shipping Details</h2>
                                        <div class="customerDetailsWrapper">
                                            <div class="cardHolderName">
                                                <p class="title">name</p>
                                                <input type="text" name="shipping_name">
                                            </div> <!-- cardHolderName -->
                                            <div class="cardHolderName">
                                                <p class="title">Email</p>
                                                <input type="email" name="shipping_email">
                                            </div> <!-- cardHolderName -->
                                            <div class="cardHolderName">
                                                <p class="title">Phone</p>
                                                <input type="tel" name="shipping_phone">
                                            </div> <!-- cardHolderName -->
                                            <div class="cardHolderName">
                                                <p class="title">Street</p>
                                                <input type="text" name="shipping_street">
                                            </div> <!-- cardHolderName -->
                                            <div class="cardHolderName">
                                                <p class="title">Country</p>
                                                <input type="text" name="shipping_country">
                                            </div> <!-- cardHolderName -->
                                            <div class="cardHolderName">
                                                <p class="title">City</p>
                                                <input type="text" name="shipping_city">
                                            </div> <!-- cardHolderName -->
                                            <div class="cardHolderName">
                                                <p class="title">State</p>
                                                <input type="text" name="shipping_state">
                                            </div> <!-- cardHolderName -->
                                            <div class="cardHolderName">
                                                <p class="title">Zip COde</p>
                                                <input type="text" name="shipping_zip">
                                            </div> <!-- cardHolderName -->
                                        </div>
                                </div>



                                <div class="security">
                                    <p class="title">Choose A Payment Option</p>
                                    <div>
                                        <input type="radio" name="paymentOption" value="cash" id="cashOnDelivery">
                                        <label for="cashOnDelivery">Cash on Delivery</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="paymentOption" value="paytaps" id="paytaps">
                                        <label for="paytaps">Paytaps</label>
                                    </div>

                                    {{-- static inputs field --}}
                                    <input hidden type="text" name="payment_type" value="invoice">
                                    <input hidden type="text" name="tran_type" value="sale">
                                    <input hidden type="text" name="tran_class" value="ecom">
                                    <input hidden type="text" name="cart_id" value="cart1">
                                    <input hidden type="text" name="cart_description" value="cart 1 description">
                                    <input hidden type="text" name="cart_currency" value="USD">
                                    <input hidden type="text" name="cart_amount" value="100">

                                    <!-- invoice fields -->
                                    <input hidden type="number" name="line_items[0][unit_cost]" value="50">
                                    <input hidden type="number" name="line_items[0][quantity]" value="1">

                                    <input hidden type="number" name="line_items[1][unit_cost]" value="50">
                                    <input hidden type="number" name="line_items[1][quantity]" value="1">

                                </div><!-- .security -->
                                <input type="submit" class="sub">
                                {{-- <button>Checkout</button> --}}
                            </form>
                            </div> <!-- .infos -->
                        </div> <!-- .content -->
                    </div> <!-- .payment -->
                </div> <!-- .checkout -->
            </div> <!-- .container2 -->
        </div> <!-- #wrapper -->
    </body>
    <script src="/js/script.js"></script>
</html>

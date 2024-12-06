@extends("front.layout.app")
@section("title",$provider_pages->checkout_heading)
@section("heading",$provider_pages->checkout_heading)
@section("content")
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 checkout-left">

                <form action="payment.html" method="post" class="frm_checkout" _lpchecked="1">
                    <input type="hidden" name="ff__checkout" value="1">
                    <div class="billing-info">
                        <h4 class="mb_30">Billing Information</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Name:</label>
                                <input type="text" class="form-control mb_15" name="billing_name" value="Patrick Henderson">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Email Address:</label>
                                <input type="text" class="form-control mb_15" name="billing_email" value="patrick@gmail.com">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Phone Number:</label>
                                <input type="text" class="form-control mb_15" name="billing_phone" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Country:</label>
                                <input type="text" class="form-control mb_15" name="billing_country" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Address:</label>
                                <input type="text" class="form-control mb_15" name="billing_address" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">State:</label>
                                <input type="text" class="form-control mb_15" name="billing_state" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">City:</label>
                                <input type="text" class="form-control mb_15" name="billing_city" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Zip Code:</label>
                                <input type="text" class="form-control mb_15" name="billing_zip" value="">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary bg-website mb_30">Continue to payment</button>
                </form>
            </div>
            <div class="col-lg-4 col-md-6 checkout-right">
                <div class="inner">
                    <h4 class="mb_10">Cart Details</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        Regular Couple Bed
                                        <br>
                                        (05/07/2022 - 07/07/2022)
                                        <br>
                                        Adult: 2, Children: 0
                                    </td>
                                    <td class="p_price">$60</td>
                                </tr>
                                <tr>
                                    <td>
                                        Regular Couple Bed
                                        <br>
                                        (05/07/2022 - 05/07/2022)
                                        <br>
                                        Adult: 2, Children: 0
                                    </td>
                                    <td class="p_price">$60</td>
                                </tr>
                                <tr>
                                    <td>
                                        Delux Couple Bed
                                        <br>
                                        (10/07/2022 - 11/07/2022)
                                        <br>
                                        Adult: 2, Children: 2
                                    </td>
                                    <td class="p_price">$40</td>
                                </tr>
                                <tr>
                                    <td><b>Total:</b></td>
                                    <td class="p_price"><b>$160</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
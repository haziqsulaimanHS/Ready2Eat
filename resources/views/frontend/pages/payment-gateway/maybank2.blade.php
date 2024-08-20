<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>body {
            margin: 0;
            padding: 0;
            font-size: 12px;
            font-family: "Helvetica Neue","Calibri",Helvetica,Verdana,Tahoma,Arial,sans-serif;
            text-align: left;
            color: #000;
            background: #fff;
        }

        *, ::before, ::after {
            box-sizing: border-box;
        }

        .overlay {
            width: 100%;
            position: absolute;
            background-color: none;
            z-index: 100;
        }

        @media (min-width: 480px) {
            .px-content {
                padding-right: 20px;
                padding-left: 20px;
            }
        }

        #footer {
            padding: 20px;
        }

        .paddingdiv {
            padding: 10px;
        }

        .clearfix {
            clear: both;
        }

        .common_box_shadow {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .max-width-xs {
            max-width: 480px;
        }

        .mx-auto {
            margin: 0 auto;
        }

        .bg-gold {
            background-color: #FFD700;
        }

        .font-family-lato {
            font-family: 'Lato', sans-serif;
        }

        .font-size-base {
            font-size: 1rem;
        }

        .font-size-dec {
            font-size: 0.9rem;
        }

        .text-mineshaft {
            color: #333;
        }

        .text-center {
            text-align: center;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .p-1 {
            padding: 0.25rem;
        }

        .p-2 {
            padding: 0.5rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .w-100 {
            width: 100%;
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            user </style>
</head>
<body>
<div id="overlay" class="overlay" style="visibility: hidden;">
    <div id="overlayBox" class="overlayBox" style="visibility: hidden;">
        <p class="overlayBox"><img src="loading.gif" alt="Loading"></p>
    </div>
</div>

<div id="content" class="font-family-lato font-size-base bg-gold px-content min-w-content">
    <div id="login" class="clearfix common_box_shadow max-width-xs mx-auto" style="border:0px solid #888;z-index: 1;position:relative;background-color:#000">
        <div class="paddingdiv">
            <div style="position:relative;">
                <div class="paddingdiv">
                    <div style="float: left"><img src="{{asset('uploads/maybank2u-2.png')}}" alt="Logo" style="border:0px; height:100px;"></div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="common_box" style="border:1px solid #888;background-color:#FFF;">
                <div style="padding-top:5px">&nbsp;</div>
                <div style="text-align: center;z-index: 1">
                    <img src="{{asset('uploads/fpxlogo.png')}}" alt="FPX Logo" style="border:0px; width:107px;">
                    <div class="text-mineshaft font-size-dec">
                        <p id="timeout">Timeout in 10:00</p>
                    </div>
                </div>
                <div class="common_box" style="border:0px solid #888;margin: 0 auto;z-index: 1;position:relative;">
                    <div class="paddingdiv">
                        <div class="text-center mb-3">
                            <strong>Step 1 of 3</strong>
                        </div>
                        <div class="bg-gallery border-light p-2 rounded mb-4 font-size-dec">
                            <form>
                                <table class="font-size-dec w-100" cellspacing="0" cellpadding="0" border="0">
                                    <tr>
                                        <td width="40%" valign="top" class="right p-1">
                                            <div class="d-inline-block py-2">
                                                <label id="fromAccountLabel"><span id="fromAccountErrorSymbol"></span>From account: </label>
                                            </div>
                                        </td>
                                        <td width="60%" valign="top" class="p-1">
                                            <select name="fromAccount" class="w-100 form-control">
                                                <option value="" selected="selected">Please select&nbsp;&nbsp;</option>
                                                <option value="0145980148480000000">014598014848 MAE Wallet</option>
                                                <option value="1620767351950000000">162076735195 SA-i</option>
                                            </select>
                                            <table id="errorTable" class="my-2 font-size-dec">
                                                <tr>
                                                    <td>
                                                        <span id="serverSideError" class="error"><font color="red"></font></span>
                                                        <font color="red"><span id="fromAccountError" class="error"></span></font>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" class="p-1 right">Merchant Name:</td>
                                        <td valign="top" class="p-1"><strong>Ready2Eat</strong></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" class="p-1 right">Payment Reference:</td>
                                        <td valign="top" class="p-1"><strong>T089490448524</strong></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" class="p-1 right">FPX Transaction ID:</td>
                                        <td valign="top" class="p-1"><strong>2407052153310162</strong></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" class="p-1 right">Amount:</td>
                                        <td valign="top" class="p-1"><strong>{{$settings->currency_icon}}{{getFinalPayableAmount()}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" class="p-1 right">Fee Amount:</td>
                                        <td valign="top" class="p-1"><strong>RM0.00</strong></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <form action="{{route('user.maybank.payment')}}" method="post">
                            @csrf
                            <p class="text-center">
                                <input type="submit" name="action" value="Continue" class="btn btn-warning">
                                &nbsp;&nbsp;&nbsp;
                                <button type="button" name="cancel" class="button transparent font-size-dec" onclick="goBack()">Cancel</button>
                            </p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer">
    <img src="{{asset('uploads/maybank2u-2.png')}}" alt="Maybank2u" style="height: 100px">
</div>
</body>
</html>

<script>
    function goBack() {
        history.back();
    }
</script>

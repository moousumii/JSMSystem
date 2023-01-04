<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sale No. 4740</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
    <script src="http://demo.tecdiary.my/spos/assets/js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <style type="text/css" media="all">
       
        body {
				max-width: 300px;
				margin: 0 auto;
				text-align: center;
				color: #000;
				font-size: 10px;
			}
        #wrapper {
            min-width: 240px;
            margin: 0 auto;
        }
        h3,
        p {
            margin: 5px 0;
			font-size:12px;
			font-weight:bold;
        }
        
        .left {
            width: 60%;
            float: left;
            text-align: left;
            margin-bottom: 3px;
        }
        
        .right {
            width: 40%;
            float: right;
            text-align: right;
            margin-bottom: 3px;
        }
        
        .table,
        .totals {
            width: 100%;
            margin: 10px 0;
        }
        
        .table th {
            border-bottom: 1px solid #000;
			vertical-align: middle;
        }
        
        .table td {
            padding: 0;
			vertical-align: middle;
        }
        
        .totals td {
            width: 24%;
            padding: 0;
			vertical-align: middle;
        }
        
        .table td:nth-child(2) {
            overflow: hidden;
			vertical-align: middle;
        }
        
        @media print {
            body {	
				font-size: 10px;
            }
			p {
				font-size:12px;
			}
            #nonPrintSection {
                display: none;
            }
            #wrapper {
                width: 100%;
				margin: 0 5px;
                font-size: 10px;
            }
        }
    </style>
</head>
<?php
	 //echo"<pre>";
	// print_r($info);
	 //echo "</pre>"; 
?>
<body>
    <div id="wrapper">
        <!--<img src="http://demo.tecdiary.my/spos/assets/images/logo1.png" alt="Simple POS" />-->
        <h4><strong>Excellent Shoes</strong></h4>
        <p class="text-center;">Barnch Name<br />
			Invoice No : 4740 <br />
			Date: 13/12/2016 15:37:05 <br />
			Served By : Keshob
		</p>
        <div style="clear:both;"></div>

        <table class="table" cellspacing="0" border="0" style="width:240px;">
            <thead>
                <tr>
                    <th style="text-align:left;font-size:13px;">Barcode</th>
                    <th style="text-align:left;font-size:13px;">Rate</th>
                    <th style="text-align:left;font-size:13px;">Quantity</th>
                    <th style="text-align:left;font-size:13px;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
				 <tr>
                    <td style="text-align:left; width:40%;"><p><span>15254554545485454</span></p></td>
                    <td style="text-align:center; width:20%;;"><p><span>550</span></p></td>
                    <td style="text-align:center; width:20%;"><p><span>2</span></p></td>
                    <td style="text-align:right; width:20%; "><p><span>1100</span></p></td>
                </tr>
            </tbody>
        </table>

        <table class="totals" cellspacing="0" border="0" style="margin-bottom:5px;">
            <tbody>
                <tr>
                    <td style="text-align:left;font-size:13px;font-weight:bold;">Total Items</td>
                    <td style="text-align:right; padding-right:1.5%; border-right: 1px solid #000;font-size:13px;font-weight:bold;"><p>2</p></td>
                    <td style="text-align:left; padding-left:1.5%;font-size:13px;font-weight:bold;">Total</td>
                    <td style="text-align:right;font-weight:bold;font-size:13px;"><p>1100</p></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:left; font-weight:bold; border-top:1px solid #000; padding-top:5px;font-size:13px;">Grand Total</td>
                    <td colspan="2" style="border-top:1px solid #000; padding-top:5px; text-align:right; font-weight:bold;"><p>1100</p></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:left; font-weight:bold; padding-top:5px;font-size:13px;">Paid</td>
                    <td colspan="2" style="padding-top:5px; text-align:right; font-weight:bold;"><p>1100</p></td>
                </tr>
				<tr>
					<?php //if(($info['info']->total_price- $info['info']->receved_total)<0){ ?>
					<td colspan="2" style="text-align:left; font-weight:bold; padding-top:5px;font-size:13px;">Change</td>
					<td colspan="2" style="padding-top:5px; text-align:right; font-weight:bold;"><p>0</p></td>
                </tr>
				
            </tbody>
        </table>

        <div style="border-top:1px solid gray; padding-top:10px;">
		
            <p style="border-bottom:1px dotted gray; padding-bottom:5px;">
				You have saved 50 <br />
                Thank you for your business!
            </p>
			<p style="">
                Developed by : StarLab IT; 01617827522 <br />
				<span class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">www.starlabit.com.bd</span>
            </p>
			
        </div>

        <div id="nonPrintSection" style="padding-top:10px; text-transform:uppercase;">
            <span class=""><button type="button" onClick="window.print();return false;" style="width:100%; cursor:pointer; font-size:12px; background-color:#FFA93C; color:#000; text-align: center; border:1px solid #FFA93C; padding: 10px 1px; font-weight:bold;">Print</button></span>
			
            <div style="clear:both;"></div>
			
            <a href="http://demo.tecdiary.my/spos/index.php?module=pos" style="width:95%; display:block; font-size:12px; text-decoration: none; text-align:center; color:#FFF; background-color:#007FFF; border:2px solid #007FFF; padding: 10px 1px; margin: 5px auto 10px auto; font-weight:bold;">Back to POS</a>

            <!--<div style="background:#F5F5F5; padding:10px;">
                <p style="font-weight:bold;">Please don't forget to disble the header and footer in browser print settings.</p>
                <p style="text-transform: capitalize;"><strong>FF:</strong> File > Print Setup > Margin & Header/Footer Make all --blank--</p>
                <p style="text-transform: capitalize;"><strong>chrome:</strong> Menu > Print > Disable Header/Footer in Option & Set Margins to None</p>
            </div>-->
			
            <div style="clear:both;"></div>
			
        </div>
    </div>
    <script type="text/javascript" src="http://demo.tecdiary.my/spos/assets/js/jquery.js"></script>
    <script type="text/javascript">
        /*$(document).ready(function() {
            $('#email').click(function() {
                var email = prompt("Please enter email address", "test@mail.com");
                if (email != null) {
                    $.ajax({
                        type: "post",
                        async: false,
                        url: "index.php?module=pos&view=email_receipt",
                        data: {
                            csrf_pos: "888b39ed7d43ed3d7b79dbf83cf9c89e",
                            email: email,
                            id: 4740
                        },
                        //dataType: "json",
                        success: function(data) {
                            alert(data);
                        },
                        error: function() {
                            alert('Ajax Request Failed');
                            return false;
                        }
                    });
                }
                return false;
            });
        });

        $(window).load(function() {
            window.print();
        });*/
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Example Store</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/animate.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/responsive.css'); ?>" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        @font-face {
            /*font-family: 'Nunito Sans';
            font-style: normal;
            font-weight: 400;
            src: url('<?php //echo base_url('assets/fonts/NunitoSans-Regular.ttf'); ?>');*/
        }
        body{
            background-image:url('assets/images/pexels-photo-302820.jpeg');
            background-size: 100% 100%;
            height:100%;
        }
        .flex-center{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .thumbnail{
            background-color:rgba(0,0,0,0.6);
            border: 0px solid #337AB7;
            padding-bottom:20px;
        }
        .form-control{
            background-color:rgba(0,0,0,0.3);
            border: 1px solid rgba(0,0,0,0.3);
            color:#FFF;
            border-radius:0px;
        }
        .form-control:focus{
            border: 1px solid rgba(255,255,255,0.5);
        }
        h2{
            margin-top: 10px;
        }
        input:-webkit-autofill {
            background-color:rgba(0,0,0,0.2) !important;
            -webkit-box-shadow: 0 0 0px 1000px rgba(255,255,255,0.5) inset;
            color:#FFF;
        }
        .btn:focus,
        .btn:active:focus,
        .btn.active:focus,
        .btn.focus,
        .btn:active.focus,
        .btn.active.focus {
          outline: none;
          outline-offset: 0px;
        }
        .btn:active,
        .btn.active {
            outline: 0;
            -webkit-box-shadow: none;
                  box-shadow: none;
        }
    </style>
</head>

<body>
    <div>
        <?php echo $this->session->flashdata('login'); ?>
    </div>


    <?php if($this->session->flashdata('feedback_successfull'))
            { ?>
    <div class="alert alert-success">
        <strong>Success!</strong>
        <?php echo $this->session->flashdata('feedback_successfull'); ?>
    </div>
    <?php } ?>


    <?php echo form_open();?>
    <section class="login-page flex-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row login-part">
                        <div class="col-md-4 col-md-offset-4">
                            <div class="thumbnail">
                                <div class="caption text-center">
                                    <div class="row m-bottom-25">
                                <div class="col-md-12">
                                    <h2 class="" style="color:#FFF;">LOG IN</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="result" style="display: none" class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center red-text">
                                    <p class="label_output" id="value"></p>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php echo form_input(['name'=>'email', 'id' => 'name', 'placeholder' => 'User Name', 'class'=>'form-control input-lg', 'value'=>set_value('email')]); 
                                        echo form_error('email'); ?>
                                        <div style="" id="email" class="warningSize red-text"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php echo form_password(['name'=>'password', 'id' => 'pwd', 'placeholder' => 'Password', 'class'=>'form-control input-lg fancyInput']); 
                                        echo form_error('password'); ?>
                                        <div style="" id="password" class="warningSize red-text"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-top-10">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-lg btn-success" value="Login" name="login" id="submit"><i class="fa fa-sign-in"></i> Login</button>
                                    <button type="reset" class="btn btn-lg btn-danger" value="Reset" name="login"><i class="fa fa-refresh"></i> Reset</button>
                                    <?php echo form_close();?>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <script src="<?php echo base_url('assets/js/jQuery1.12.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-timepicker.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/select2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/table.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/metisMenu.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/script.js'); ?>"></script>    
    <script type="text/javascript">
        // Ajax post
        $(document).ready(function() {
            $("#submit").click(function(event) {
                event.preventDefault();
                var email = $("input#name").val();
                var password = $("input#pwd").val();
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "login/user_login",
                    dataType: 'json',
                    data: {
                        email: email,
                        password: password
                    },
                    success: function(res) {
                        if (res) {
                            // Show Entered Value
                            if (res.status === true)
                                document.location.href = res.redirect;
                            else {
                                jQuery("div#result").show();
                                jQuery("#value").html(res.errors);
                                jQuery("#email").html(res.email);
                                jQuery("#password").html(res.password);
                                //jQuery("div#value_pwd").html(res.pwd);
                            }
                        }
                    }
                });
            });
        });
    </script>
    <script>
        var windowHeight = $(window).height();
        $('.login-page').css('min-height', windowHeight);       
    </script>
    <script>
        //$('#name').fancyInput();
    </script>

</body>

</html>
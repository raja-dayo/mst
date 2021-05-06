<?php 
	
	require_once('header.php');
?>

<style>
  .rc-anchor-light {border:1px solid #d3d3d3; color:#000; padding: 10px; margin-bottom:20px;} 
  .rc-anchor-logo-img { border:none; background-color:#fff;  height:32px; width:32px; background-size:100%;  background-image:url(https://www.gstatic.com/recaptcha/api2/logo_48.png); background-repeat:no-repeat; padding:0px !important; line-height:normal !important; min-height:auto !important;}   
  .rc-anchor-logo-img:active, .rc-anchor-logo-img:focus, .rc-anchor-logo-img:hover  { border:none;  }
  .rc-anchor-logo-text { cursor:default; font-size:10px; font-weight:400; line-height:10px; center;color:#555;}
  .rc-anchor-content { width:80%; float:left; }
  .rc-anchor-content canvas { width:100%; }
  .reCAPTCHA { float:right; text-align:center; }
</style>

<!-- CONTENT -->
<section>
  <div class="container m-b-40">
     <div class="breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a> </li>
            
                <li class="breadcrumb-item">Contact Us</li>
                <!--<li class="breadcrumb-item active" aria-current="page">Data</li>-->
            </ol>
        </nav>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="heading-text heading-section">
          <h1>Get In Touch</h1>
        </div>
        <div class="row m-t-40">
          <div class="col-lg-6">
            <address>
              19 Oakhall Court/Oakhall Drive <br>
              Sunbury-On-Thames Middlesex TW16 7LE<br><br>
              <strong>N :</strong> Ed Anderson<br>
              <strong>E :</strong> orders@mysleepingtabs.com<br>
              <strong>P :</strong> +44 7563 084792<br>
            </address>
          </div>
          <div class="col-lg-6">
            <address>
               
            </address>
          </div>
        </div>
      </div>
      <div class="col-lg-12 m-t-40">
        <form  action="<?php echo base_url('shop/form_submit');?>"  method="post" id="submit">
          <div class="row">
            <div class="form-group col-md-6">
              <label for="FirstName">First Name</label>
              <input type="text" aria-required="true" required name="name" id="name" class="form-control required name" placeholder="Enter your Name">
              <p id="name_msg"></p>
            </div>
            <div class="form-group col-md-6">
              <label for="PhoneNo">Phone No</label>
              <input type="text" aria-required="true" required name="number" minlength="11" maxlength="11" id="number" class="form-control required number" placeholder="Enter your Phone No">
              <p id="num_msg" style="color: red"></p>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="Email ">Email </label>
              <input type="email" aria-required="true" required name="email" id="email" class="form-control required email" placeholder="Enter your Email">
              <p id="email_msg"></p>
            </div>
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea type="text" name="message" required rows="5" class="form-control required" placeholder="Enter your Message"></textarea>
          </div>
          <?php
            if($this->session->flashdata('msg'))
            {
              ?>
                <div class="row">
                  <div class="form-group col-md-4"></div>
                  <div class="form-group col-md-4">
                    <div class="alert btn-<?php echo $this->session->flashdata('class');?> alert-dismissible fade show" role="alert">
                      <p class="text-center"><?php echo $this->session->flashdata('msg');?></p>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>
                </div> 
              <?php
            }
          ?>
          <div class="row">
            <div class="form-group col-md-12">
                <label id="SuccessMessage" class="success"></label>
                <input type="text" id="UserCaptchaCode" class="form-control col-md-4" placeholder='Enter Captcha - Case Sensitive'>
                <span id="WrongCaptchaError" class="error" style="color: red;"></span>
            </div>
            <div class="rc-anchor-light col-md-4">
              <div id="CaptchaImageCode" class="rc-anchor-content">
                  <canvas id="CapCode" width="300" height="80"></canvas>
              </div> 
              <div class="reCAPTCHA">
                <input class="rc-anchor-logo-img" type="button" onclick='CreateCaptcha();'>
                <div class="rc-anchor-logo-text">reCAPTCHA</div>
              </div>
            </div>
          </div>
          <input type="submit" class="btn btn-primary" value="Submit">            
          <!-- <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i>&nbsp;Send message</button>-->
        </form>
      </div>
    </div>
  </div>
</section> 
<!-- end: Content -->
        
<?php 
	
	require_once('footer.php');
?>

<script type="text/javascript">
    var cd;

$(function(){
  CreateCaptcha();
});

// Create Captcha
function CreateCaptcha() {
  //$('#InvalidCapthcaError').hide();
  var alpha = new Array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
                    
  var i;
  for (i = 0; i < 6; i++) {
    var a = alpha[Math.floor(Math.random() * alpha.length)];
    var b = alpha[Math.floor(Math.random() * alpha.length)];
    var c = alpha[Math.floor(Math.random() * alpha.length)];
    var d = alpha[Math.floor(Math.random() * alpha.length)];
    var e = alpha[Math.floor(Math.random() * alpha.length)];
    var f = alpha[Math.floor(Math.random() * alpha.length)];
  }
  cd = a + ' ' + b + ' ' + c + ' ' + d + ' ' + e + ' ' + f;
  $('#CaptchaImageCode').empty().append('<canvas id="CapCode" class="capcode" width="300" height="80"></canvas>')
  
  var c = document.getElementById("CapCode"),
      ctx=c.getContext("2d"),
      x = c.width / 2,
      img = new Image();

  img.src = "https://pixelsharing.files.wordpress.com/2010/11/salvage-tileable-and-seamless-pattern.jpg";
  img.onload = function () {
      var pattern = ctx.createPattern(img, "repeat");
      ctx.fillStyle = pattern;
      ctx.fillRect(0, 0, c.width, c.height);
      ctx.font="46px Roboto Slab";
      ctx.fillStyle = '#ccc';
      ctx.textAlign = 'center';
      ctx.setTransform (1, -0.12, 0, 1, 0, 15);
      ctx.fillText(cd,x,55);
  };
  
  
}

// Validate Captcha
function ValidateCaptcha() {
  var string1 = removeSpaces(cd);
  var string2 = removeSpaces($('#UserCaptchaCode').val());
  if (string1 == string2) {
    

    return true;

  }
  else {
    return false;
  }
}

// Remove Spaces
function removeSpaces(string) {
  return string.split(' ').join('');
}

// Check Captch
    $(document).ready(function(){
        
        $("#submit").submit(function(){


            var abc= $("#number").val();
            
            if(isNaN(Number(abc)))
            {
              $("#num_msg").html("Please enter only number");

              return false;
            }

            if($("#name").val()==="" || $("#number").val()==="" || $("#email").val()===""){

                if ($("#name").val()==="")
                {
                    $("#name_msg").html("Please enter name");  
                }
                if($("#number").val()==="")
                {
                    $("#number_msg").html("Please enter your number");  
                }
                if($("#email").val()==="")
                {
                    $("#email_msg").html("Please enter your email");  
                }
                return false;
            } 

            // Check Captcha

            // Check Captcha
            
            var result = ValidateCaptcha();
            if( $("#UserCaptchaCode").val() == "" || $("#UserCaptchaCode").val() == null || $("#UserCaptchaCode").val() == "undefined") {
                $('#WrongCaptchaError').text('Please enter code given below in a picture.').show();
                $('#UserCaptchaCode').focus();

                return false;
            } 
            else 
            {
                if(result == false)
                { 
                    $('#WrongCaptchaError').text('Invalid Captcha! Please try again.').show();
                    CreateCaptcha();
                    $('#UserCaptchaCode').focus().select();

                    return false;
                }
                else 
                { 
                   // $('#UserCaptchaCode').val('').attr('place-holder','Enter Captcha - Case Sensitive');
                   // CreateCaptcha();
                    //$('#WrongCaptchaError').fadeOut(100);
                    //$('#SuccessMessage').fadeIn(500).css('display','block').delay(5000).fadeOut(250);
                    
                    return true;
                }
            }  

        });
    });
</script>
</body>

</html>
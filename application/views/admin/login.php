<style type="text/css">
  /*--------------------------------------------------------------
# General
--------------------------------------------------------------*/
:root {
  --primary-color: white;
  --secondary-color: #4caf50;
  --bg-color: rgba(0, 0, 0, 0.8);
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: sans-serif;
  background: url(https://picsum.photos/2500/1667?image=353) no-repeat;
  background-size: auto;
  background-position-y: 30%;
}

/*--------------------------------------------------------------
# Login
--------------------------------------------------------------*/
.login-box {
  width: 320px;
  padding: 20px;
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: var(--bg-color);
  box-shadow: 0 15px 25px var(--bg-color);
  border-radius: 10px;
}

.login-box h1 {
  font-size: 30px;
  color: var(--primary-color);
  margin-bottom: 10px;
  padding: 13px 0;
  text-align: center;
}

.textbox {
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0 30px 0;
  border-bottom: 2px solid var(--secondary-color);
}

.textbox i {
  width: 26px;
  float: left;
  text-align: center;
  color: var(--primary-color);
}

.textbox input {
  border: none;
  outline: none;
  background: none;
  font-size: 18px;
  width: 80%;
  float: left;
  margin: 0 10px;
  color: var(--primary-color);
}

.btn {
  width: 100%;
  height: 50px;
  background: none;
  border: 2px solid var(--secondary-color);
  border-radius: 5px;
  color: var(--primary-color);
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;
  color: var(--primary-color);
  background-color: var(--secondary-color);
}

</style>
<div class="login-box">
  <form method="POST" action="<?php echo base_url('login/admin_login_process');?>">
    <h1>Admin Login</h1>

    <!-- ======= Username ======= -->
    <div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-10">
    <?php
      if($this->session->flashdata('msg'))
      {
        ?>
          <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
               <div class="alert btn-<?php echo $this->session->flashdata('class');?> alert-dismissible fade show" role="alert" style="color: red;">
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
  </div>
    <div class="textbox">
      <i class="fa fa-user" aria-hidden="true"></i>
      <input type="email" placeholder="Email" name="email" required=""/>
    </div>

    <!-- ======= Password ======= -->
    <div class="textbox">
      <i class="fa fa-lock" aria-hidden="true"></i>
      <input type="password" placeholder="Password" name="password" required=""/>
    </div>

    <!-- ======= Sign in ======= -->
    <input class="btn" type="submit" name="" value="Sign In" />
  </form>
</div>
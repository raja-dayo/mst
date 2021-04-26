<style type="text/css">
@media only screen and (max-device-width:640px),
only screen and (max-width:640px) {
	table[class="mobile-shell"] {
		width:100%!important;
		min-width:100%!important
	}
}
</style>
<table width="640" align="center" border="0" cellspacing="0" cellpadding="0" class="mobile-shell" style="color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:16px;">
	<tbody>
		<tr>
			<td id="emailcontent" class="text-top" style="line-height:16px; text-align:left;">
			<div style="margin-bottom:20px; padding:20px 0px; border-bottom:1px solid #eeeeee"><a href="index.html">
                            <img alt="" src="https://www.mysleepingtabs.com/asset/images/mstlogo.png">
                        </a></div>
			
				<p style="font-size:16px; line-height:20pt; font-weight:bold;">Hi <?php echo $result[0]['cus_fname']?>  here’s how to reset your password. </p>
				
		        	
					We have received a request to have your password reset for mysleepingtabs.com. If you did not make this request, please ignore this email. 
					
					<br>
					<br>
					To reset your password , please copy the following OTP code and paste in your forgot-password page. 
					
					<br>
					<br>
					<p style="font-size: 20px">OTP: <?=$_SESSION['otp']?></p>
					<br><br><br>

					Having trouble ?  
					<br><br>
					If the above process does not work, please email us at orders@mysleepingtabs.com.
				
				




				
				
				
				<p style="text-align:center; border-top: 1px solid #eeeeee; padding-top: 20px;
    margin-top: 60px;">© <?php echo date('Y',time())?> MysleepingTabs.com All Rights Reserved.</p>
			</td>
		</tr>
	</tbody>
</table>
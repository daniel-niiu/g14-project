<div id="loginTemplate" tabindex="-1" class="hidden flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 md:h-full justify-center items-center bg-gray-900 bg-opacity-50">
	<div class="relative p-4 w-full max-w-lg h-full md:h-auto">

		<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
				
			<div class="py-6 px-6 lg:px-8">
				<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Sign in to the platform</h3>
				<form class="space-y-6">
					<div>
						<label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email Address</label>
						<input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="example@email.com" required="">
					</div>
					<div>
						<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
						<div class="flex">
							<input type="password" name="password" id="password" placeholder="••••••••" class="rounded-none border-r-0 rounded-l-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required=""> 
							
							<span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-l-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
								<button id="eye-toggle" type="button">
									<svg id="toggle-eye-on" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
								</button>
							</span>
						</div>
					</div>
					
					<div class="flex justify-between">
						<div class="flex items-start">
							<div class="flex items-center h-5">
								<input id="remember" type="checkbox" value="lsRememberMe" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
							</div>
							<label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
						</div>
						<div class="flex items-start">
							<a class="text-sm font-medium text-blue-700 dark:text-gray-300 hover:text-blue-800 dark:hover:text-white hover:underline cursor-pointer" data-modal-toggle="forget-popup-modal">Forget Password?</a>
						</div>
                    </div>
					
					<button id="btn_login" name="btn_submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="lsRememberMe()">Login to your account</button>
                    
					<div id="login_alert" class="hidden flex text-red-500 dark:text-red-400">
                        <i class="fa-solid fa-xmark"></i><p class="ml-2 text-xs">Login credentials are incorrect. Please try again.</p>
                    </div>	
					
				</form>
				
				<div id="forget-popup-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
					<div class="relative p-4 w-full max-w-md h-full md:h-auto">
						<div class="relative bg-gray-200 rounded-lg shadow dark:bg-gray-500">
							<button type="button" id="close_forgot_modal" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="forget-popup-modal">
								<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
							</button>
							<div class="py-6 px-6 lg:px-8">
								<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Forget Password</h3>
								<form class="space-y-6">
									<div>
										<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email Address</label>
										<input type="text" name="email" id="forgot_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Email Address" required="">
										<p class="mt-1 ml-1 text-xs text-gray-500 dark:text-gray-300">Please enter your email address to recover your password.</p>
									</div>
									<button id="btn_forgot_pass" type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
									
                                    <div id="email_pass1" class="hidden flex text-green-500 dark:text-green-400">
                                        <i class="fa-solid fa-check"></i>
                                        <p class="ml-2 text-xs">Recovery password has been sent to your email.</p>
                                    </div>	
                                    <div id="email_pass2" class="hidden flex text-red-500 dark:text-red-400">
                                        <i class="fa-solid fa-xmark"></i>
                                        <p class="ml-2 text-xs">Email address cannot be found. Please try again.</p>
                                    </div>	
								</form>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>

<script>
	var ToggleEyeOnIcon = document.getElementById('toggle-eye-on');	
	var eyeToggleBtn = document.getElementById('eye-toggle');
	var pass = document.getElementById("password");

	eyeToggleBtn.addEventListener('click', function() {
		
		if (pass.type === "password") {
			pass.type = "text";
		} 
		else {
			pass.type = "password";
		}
		
	});
</script>

<script>
	const rmCheck = document.getElementById("remember"),
		  emailInput = document.getElementById("username");

	if (localStorage.checkbox && localStorage.checkbox !== "") {
	  rmCheck.setAttribute("checked", "checked");
	  emailInput.value = localStorage.username;
	} else {
	  rmCheck.removeAttribute("checked");
	  emailInput.value = "";
	}

	function lsRememberMe() {
	  if (rmCheck.checked && emailInput.value !== "") {
		localStorage.username = emailInput.value;
		localStorage.checkbox = rmCheck.value;
	  } else {
		localStorage.username = "";
		localStorage.checkbox = "";
	  }
	}
</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$("#close_forgot_modal").on("click", function(e) { 
    $("#email_pass1").addClass("hidden");  
    $("#email_pass2").addClass("hidden"); 
});

$("#btn_login").on("click", function(e) {
    e.preventDefault();
    $.ajax({
    	type: "POST",
        url: "php/login.php",
        data: { 
        	do_login: "do_login",
        	username: $("#username").val(), 
        	password: $("#password").val() 
        },
        success:function(response) {
        	if(response=="success")
        	{
        		$("#login_alert").addClass("hidden"); 
        		window.location.href="index.php?lang=ch";
        	}
        	else
        	{
        		$("#login_alert").removeClass("hidden"); 
	  		}
  		}
    });
});

$("#btn_forgot_pass").on("click", function(e) {
    $("#btn_forgot_pass").attr("disabled", true);
    e.preventDefault();
    $.ajax({
    	type: "POST",
        url: "php/login.php",
        data: { 
        	do_forgot_password: "do_forgot_password",
        	email: $("#forgot_email").val()
        },
	    beforeSend: function() {
	        // setting a timeout
            //$("#btn_forgot_pass").attr("disabled", true); 
	    },
        success:function(response) { 
        	alert(response);
        	if(response=="success")
        	{
        		$("#email_pass1").removeClass("hidden");  
        		$("#email_pass2").addClass("hidden"); 
        	}
        	else
        	{
        		$("#email_pass1").addClass("hidden");  
        		$("#email_pass2").removeClass("hidden"); 
	  		}
            $("#btn_forgot_pass").attr("disabled", false);
  		}
    });
});
</script>
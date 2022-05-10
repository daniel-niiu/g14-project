<div tabindex="-1" class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 md:h-full justify-center items-center bg-gray-900 bg-opacity-50">
	<div class="relative p-4 w-full max-w-md h-full md:h-auto">

		<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
				
			<div class="py-6 px-6 lg:px-8">
				<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Sign in to the platform</h3>
				<form class="space-y-6" action="#">
					<div>
						<label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Username</label>
						<input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Username" required="">
					</div>
					<div>
						<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
						<input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
					</div>
					<div class="flex justify-between">
						<div class="flex items-start">
							<div class="flex items-center h-5">
								<input id="show" onclick="showPassword()" type="checkbox" value="" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
							</div>
							<label for="show" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Show password</label>
						</div>
						<div class="flex items-start">
							<div class="flex items-center h-5">
								<input id="remember" type="checkbox" value="" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
							</div>
							<label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
						</div>
                    </div>
					<button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
function showPassword(){
  var x = document.getElementById("password");
  	if (x.type === "password") {
    	x.type = "text";
  	} 
	else {
    	x.type = "password";
  	}
}
</script>
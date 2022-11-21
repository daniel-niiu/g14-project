<?php
	$aside = $_GET['aside'];
    session_start();
?>

<aside class="w-64 mx-auto mb-4 pr-4" aria-label="Sidebar">
    <div class="overflow-y-auto py-4 px-4 bg-gray-100 rounded dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
                <h3 class="flex items-center p-2 text-base font-semibold text-gray-900 rounded-lg dark:text-white">
                    <i class="fa-solid fa-user"></i>
                    <span class="ml-4"><?php echo $member['manage-membership']; ?></span>
                </h3>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 border-t border-gray-300 dark:border-gray-600">
            <li>
                <a href="create-member.php?name=member&aside=create-member&lang=<?php echo $_SESSION['lang']; ?>" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "create-member") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
                    <i class="fa-solid fa-plus"></i>
                    <span class="ml-4"><?php echo $title['create-member']; ?></span>
                </a>
            </li>
            <li>
                <a href="search-member.php?name=member&aside=search-member&lang=<?php echo $_SESSION['lang']; ?>" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "search-member") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span class="ml-4"><?php echo $title['search-member']; ?></span>
                </a>
            </li>
            <li>
                <a class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-white dark:text-gray-400 group cursor-pointer" data-modal-toggle="export-modal">
                    <i class="fa-solid fa-file-export"></i>
                    <span class="ml-3"><?php echo $export['export-record']; ?></span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<div id="export-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-lg p-4 md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="export-modal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-white"><?php echo $export['export-record-title']; ?></h3>
                <form action="../members/member-excel.php" method="post">	
    				<div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <input id="selectall" type="checkbox" onClick="toggle(this)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                            <label for="selectall"  class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['select-all']; ?></label>
                        </div>
                        <div>
                            <input id="id" type="checkbox" name="checkbox[]" value="member id" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                            <label for="id" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['member-id']; ?></label>
                        </div>
                        <div>
                            <input id="name" type="checkbox" name="checkbox[]" value="member eng name" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                            <label for="name" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['eng-name']; ?></label>
                        </div>
                        <div>
                            <input id="ic" type="checkbox" name="checkbox[]" value="member chi name" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                            <label for="ic" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['chi-name']; ?></label>
                        </div>
                        <div>
                            <input id="ic" type="checkbox" name="checkbox[]" value="member ic" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                            <label for="ic" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['nric']; ?></label>
                        </div>
                        <div>
                            <input id="age" type="checkbox" name="checkbox[]" value="member citizenship" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                            <label for="age" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['citizenship']; ?></label>
                        </div>
                        <div>
                            <input id="gender" type="checkbox" name="checkbox[]" value="member gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                            <label for="gender" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['gender']; ?></label>
                        </div>
                        <div>
                            <input id="dob" type="checkbox" name="checkbox[]" value="member dob" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                            <label for="dob" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['dob']; ?></label>
                        </div>
                        <div>
                            <input id="contact" type="checkbox" name="checkbox[]" value="member tel" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                            <label for="contact" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['contact']; ?></label>
                        </div>
                        <div>
                            <input id="job" type="checkbox" name="checkbox[]" value="member job" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                            <label for="job" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['occupation']; ?></label>
                        </div>
                        <div>
                            <input id="address" type="checkbox" name="checkbox[]" value="member address" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                            <label for="address" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['address']; ?></label>
                        </div>
                        <div>
                            <input id="member" type="checkbox" name="checkbox[]" value="member type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                            <label for="member" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['member-type']; ?></label>
                        </div>
                        <div>
                            <input id="accept-date" type="checkbox" name="checkbox[]" value="accept date" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                            <label for="accept-date" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['admission']; ?></label>
                        </div>
                        <div>
                            <input id="recommender-id" type="checkbox" name="checkbox[]" value="recommender id" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                            <label for="recommender-id" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['recommender-id']; ?></label>
                        </div>
                        <div>
                            <input id="recommender" type="checkbox" name="checkbox[]" value="recommender name" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                            <label for="recommender" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['recommender-name']; ?></label> 
                        </div>
                        <div>
                            <input id="remarks" type="checkbox" name="checkbox[]" value="remarks" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                            <label for="remarks" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $form['remarks']; ?></label>
                        </div>
                    </div>
                    <input type="submit" name="btn_export" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="<?php echo $export['export']; ?>">
                </form>
            </div>
        </div>
    </div>
</div> 

<script> 
document.getElementById('selectall').onclick = function allselect() {
    var checkboxes = document.getElementsByName('checkbox[]');

    for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
    }
}
</script>
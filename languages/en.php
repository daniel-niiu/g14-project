<?php
	$page = array(
		//navbar
		"portal" => "Tze Yin Membership <br/> Management Portal",
		"membership" => "Membership",
		"transaction" => "Transaction",
		"product" => "Product",
		"stock" => "Stock",
		"analytics" => "Analytics",
		//footer
		"footer" => "Disclaimer: This is a student work in progress for SWE40001/SWE40002 Software Engineering Project A/B of Swinburne University of Technology, Sarawak (2022).",
		//quick-export
		"quick-export" => "Quick Export",
		"quick-export-popout" => "Export a detailed record of 'Over Time Payment' from Tablet Transaction.",
		"quick-export-title" => "Are you sure you want to quick export?",
		//profile
		"profile-user" => "Welcome, ".$_SESSION['name'],
		"profile-acc-settings" => "Account Settings",
		"profile-password" => "Edit Password",
		"profile-signout" => "Sign Out",
		"profile-language" => "Display: EN"
	);

	$account = array(
		//edit-password
		"email-title" => "*You are not allowed to modify the email address.",
		"type-title" => "*You are not allowed to modify the account type.",
		"old-password" => "Current Password",
		"new-password" => "New Password",
		"confirm-password" => "Confirm Password",
		//form
		"full-name" => "Full Name",
		"email-address" => "Email Address",
		"account-status" => "Account Status",
		"status-active" => "Active",
		"status-inactive" => "Inactive",
		"account-type" => "Account Type",
		"type-admin" => "Administrator",
		"type-oper" => "Operator",
		"department" => "Department",
		"product-stock" => "Product & Stock",
		//placeholder
		"current-password-placeholder" => "Enter your current password here",
		"new-password-placeholder" => "Enter your new password here",
		"confirm-password-placeholder" => "Confirm your new password here"
	);

	$form = array(
		"confirm" => "Yes, I'm sure",
		"cancel" => "No, cancel",
		//form
		"remarks" => "Remarks",
		"submit" => "Submit",
		//receipt
		"receipt-num" => "Receipt Number",
		"receipt-date" => "Receipt Date",
		"receipt-amount" => "Receipt Amount",
		//search
		"btnedit" => "Edit",
		"search" => "Search",
		//view
		"edit-record" => "Edit Record",
		"delete-record" => "Delete Record",
		"delete-record-title" => "Are you sure you want to delete this record?",
		"recorded-by" => "Recorded By",
		"recorded-on" => "Recorded On",
		//warning 
		"id-warning" => "*Not allowed to include special characters or be left empty.",
		"word-warning" => "*Not allowed to include numbers, special characters or be left empty.",
		"number-warning" => "*Not allowed to include wordings, special characters or be left empty.",
		"empty-warning" => "*Not allowed to be left empty.",
		"no-record-warning" => "No records found. Please try again."
	);

	$title = array(
		"home" => "Home",
		//membership
		"create-member" => "Create Member",
		"search-member" => "Search Member",
		"view-member" => "View Member",
		"edit-member" => "Edit Member",
		//memorial tablet
		"create-tablet" => "Create Memorial Tablet",
		"search-tablet" => "Search Memorial Tablet",
		"view-tablet" => "View Memorial Tablet",
		"edit-tablet" => "Edit Memorial Tablet",
		"view-transactions-table" => "View Tablet Transactions",
		"add-tablet-transaction" => "Add Tablet Transaction",
		"view-tablet-transaction" => "View Tablet Transaction",
		"edit-tablet-transaction" => "Edit Tablet Transaction",
		//blessing lantern
		"create-blessing" => "Create Blessing Lantern",
		"search-blessing" => "Search Blessing Lantern",
		"view-blessing" => "View Blessing Lantern",
		"edit-blessing" => "Edit Blessing Lantern",
		//guang-ming light
		"create-light" => "Create Guang-Ming Light",
		"search-light" => "Search Guang-Ming Light",
		"view-light" => "View Guang-Ming Light",
		"edit-light" => "Edit Guang-Ming Light",
		//product
		"create-product" => "Create Product",
		"search-product" => "Search Product",
		"view-product" => "View Product",
		"edit-product" => "Edit Product",
		"view-product-stock-in" => "View Product Stock-Ins",
		"view-product-stock-out" => "View Product Stock-Outs",
		//stocks
		"stock-in" => "Stock In",
		"stock-out" => "Stock Out",
		"view-stock" => "View Stock",
		"edit-stock" => "Edit Stock",
		//account
		"create-account" => "Create Account",
		"search-account" => "Search Account",
		"edit-account" => "Edit Account"
	);

	$toast = array(
		//index
		"toast-success-password" => "帐户密码已顺利被修改。",
		"toast-add-reminder" => "新笔录已顺利被添加。",
		"toast-edit-reminder" => "笔录已顺利被修改。",
		"toast-delete-reminder" => "笔录已顺利被删除。",
		"toast-success-filter" => "经纪快捷已顺利被修改。",
		"toast-new-notification" => "新通知",
		"toast-notification-today" => "今日",
		//member
		"toast-success-create-record" => "记录已顺利被添加。",
		"toast-fail-create-record" => "记录已存在于档案中。",
		"toast-success-edit-record" => "记录已顺利被修改。",
		"toast-fail-edit-record" => "记录不顺利被修改。",
		"toast-success-delete-record" => "记录已顺利被删除。",
		"toast-fail-delete-record" => "记录不顺利被删除。"

	);

	$index = array(
		//titles
		"index-dashboard" => "Dashboard",
		"index-reminder" => "Reminder",
		"index-broadcast" => "Broadcast",
		"index-shortcuts" => "Administrative Shortcuts",
		"index-filter" => "Filter",
		//reminder  
		"index-reminder-create-title" => "Create Reminder", 
		"index-reminder-title" => "Title", 
		"index-reminder-date" => "Date", 
		"index-reminder-content" => "Content", 
		"index-reminder-null" => "Hello, ".$_SESSION['name']."!", 
		"index-reminder-null-title" => "Tap the 'Add Reminder' button above and start recording reminders!", 
		"index-reminder-edit-title" => "Edit Reminder",
		"index-reminder-delete-title" => "Delete Reminder",
		"index-reminder-delete" => "Are you sure you want to delete this reminder?", 
		//whatsapp broadcast
		"index-whatsapp-title" => "WhatsApp Broadcast", 
		"index-whatsapp-message" => "Message Content", 
		//filter preference
		"index-filter-title" => "Select 3 Preferences as Shortcuts",
		"body-create-member" => "Create a new member.",
		"body-search-member" => "Search for an existing member.",
		"body-create-tablet" => "Create a new tablet entry.",
		"body-search-tablet" => "Search for an existing tablet entry.",
		"body-create-blessing" => "Create a new lantern entry.",
		"body-search-blessing" => "Search for an existing lantern entry.",
		"body-create-light" => "Create a new light entry.",
		"body-search-light" => "Search for an existing light entry.",
		"body-create-product" => "Create a new product entry.",
		"body-search-product" => "Search for an existing product entry.",
		"body-stock-in" => "Create a new stock-in entry.",
		"body-stock-out" => "Create a new stock-out entry.",
		//placeholder
		"reminder-title-placeholder" => "Insert your title here",
		"reminder-content-placeholder" => "Insert your content here",
		"whatsapp-content-placeholder" => "What do you wish to write?"
	);

	$import = array(
		"import-record" => "Import Record",
		"import" => "Import",
		//import file
		"upload-file" => "Upload File",
		"upload-warning" => "**Only Excel (.xlsx) File is accepted.",
		//import: transaction
		"import-tablet" => "Import Tablet Record",
		"import-tablet-transaction" => "Import Transaction Record",
	);  

	$export = array(
		"export-record" => "Export Record",
		"export" => "Export",
		//export file
		"export-record-title" => "What would you like to export?",
		"choose-type" => "Choose a type",
		"choose-period" => "Choose a period",
		"period-from" => "Starting Date",
		"period-to" => "Ending Date",
		"choose-product" => "Choose a product",
		//export: transaction
		"tablet-transactions" => "Tablet Transactions"
	);  

	$member = array(
		"manage-membership" => "Manage Membership",
		//form: member
		"member-id" => "Member ID",
		"member-status" => "Member Status",
		"status-active" => "Active",
		"status-inactive" => "Inactive",
		"eng-name" => "Member Name (English)",
		"chi-name" => "Member Name (Chinese)",
		"nric" => "NRIC", 
		"citizenship" => "Citizenship",
		"age" => "Age",
		"gender" => "Gender",
		"gender-male" => "Male",
		"gender-female" => "Female",
		"dob" => "Date of Birth",
		"contact" => "Contact Number", 
		"occupation" => "Occupation",
		"address" => "Address",
		"member-type" => "Member Type", 
		"type-normal" => "Normal", 
		"type-permanent" => "Permanent", 
		"type-non-member" => "Non-member", 
		"admission" => "Date of Admission",
		"recommender-id" => "Recommender's ID",
		"recommender-name" => "Recommender's Name",
		"select-all" => "Select All"
	);

	$transaction = array(
		"manage-transaction" => "Manage Transactions",
		"memorial-tablet" => "Memorial Tablet",
		"blessing-lantern" => "Blessing Lantern",
		"guang-ming-light" => "Guang Ming Light",
		//form: memorial tablet
		"tablet-id" => "Tablet ID",
		"inst-date" => "Installation Date",
		"zone" => "Zone",
		"tier" => "Tier",
		"row" => "Row", 
		"price" => "Price",
		"contact-num1" => "Primary Contact",
		"contact-num2" => "Secondary Contact",
		"payment-type" => "Payment Type",
		"type-lump-sum" => "Lump Sum Payment", 
		"type-over-time" => "Over Time Payment",
		"anc-eng-name" => "Deceased's Name (English)",
		"anc-chi-name" => "Deceased's Name (Chinese)",
		//search: memorial tablet
		"search-anc-eng" => "Deceased's Name (EN)",
		"search-anc-chi" => "Deceased's Name (CH)",
		"search-mem-eng" => "Member Name (EN)",
		"search-mem-chi" => "Member Name (CH)",
		//form: blessing lantern
		"lantern-id" => "Lantern ID",
		"blessing-price" => "Blessing Price",
		"votive-price" => "Votive Price",
		"blessing-receipt" => "Blessing Receipt",
		"votive-receipt" => "Votive Receipt",
		//form: guang-ming light
		"light-id" => "Light ID"
	);

	$product = array(
		"manage-product" => "Manage Products",
		//form: product
		"product-id" => "Product ID",
		"product-status" => "Product Status",
		"status-available" => "Available",
		"status-unavailable" => "Unavailable",
		"eng-name" => "Product Name (English)",
		"chi-name" => "Product Name (Chinese)",
		"unit-price" => "Unit Price"
	);

	$stock = array(
		"manage-stock" => "Manage Stocks",
		//form: product
		"product-name" => "Product Name",
		"summary" => "Summary",
		"balance" => "Balance"
	);

	$analytics = array(
		"manage-analytics" => "Manage Analytics",
		"membership" => "Membership Analytics",
		"transaction" => "Transaction Analytics",
		"product" => "Stock Analytics",
		"category" => "Category"
	);
?>
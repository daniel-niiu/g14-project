<?php
	//header.php
	$header = array(
		//navbar
		"header_membership" => "Membership",
		"header_transaction" => "Transaction",
		"header_product" => "Product",
		"header_stock" => "Stock",
		"header_en" => "EN",
		"header_ch" => "CH",
		//profile
		"profile_user" => "Welcome, ".$_SESSION['username'],
		"profile_acc_setting" => "Account Settings",
		"profile_password" => "Edit Password",
		"profile_signout" => "Sign Out",
	);

	//index.php
	$index = array(
		//titles
		"index_dashboard" => "Dashboard",
		"index_reminder" => "Reminder",
		"index_broadcast" => "Broadcast",
		"index_shortcuts" => "Administrative Shortcuts",
		"index_filter" => "Filter",
		//reminder  
		"index_reminder_create_title" => "Create Reminder", 
		"index_reminder_title" => "Title", 
		"index_reminder_date" => "Date", 
		"index_reminder_content" => "Content", 
		"index_reminder_submit" => "Submit", 
		"index_reminder_edit_title" => "Edit Reminder",
		"index_reminder_delete" => "Are you sure you want to delete this reminder?", 
		"confirm" => "Yes, I'm sure",
		"cancel" => "No, cancel",
		//whatsapp broadcast
		"index_whatsapp_title" => "WhatsApp Broadcast", 
		//filter preference
		"index_filter" => "Filter",
		"index_filter_title" => "Select your Preferences",
		"index_filter_create_mem" => "Create Member",
		"index_filter_search_mem" => "Search Member",
		"index_filter_create_tablet" => "Create Memorial Tablet",
		"index_filter_search_tablet" => "Search Memorial Tablet",
		"index_filter_create_blessing" => "Create Blessing",
		"index_filter_search_blessing" => "Search Blessing",
		"index_filter_create_light" => "Create Guang-Ming Light",
		"index_filter_search_light" => "Search Guang-Ming Light",
		//toasts
		"toast_success_user" => "User details modified successfully.",
		"toast_add_reminder" => "Reminder created successfully.",
		"toast_edit_reminder" => "Reminder modified successfully.",
		"toast_delete_reminder" => "Reminder has been deleted.",
		"toast_success_filter" => "Shortcuts modified successfully.",
		"toast_new_notification" => "New notification",
		"toast_notification_today" => "Today",
		//footer
		"footer" => "Disclaimer: This is a student work in progress for SWE40001/SWE40002 Software Engineering Project A/B of Swinburne University of Technology, Sarawak (2022)."
	);
	// for create member sidebar
	$aside_member_lang = array(
		//index
		"header_membership" => "Manage Membership",
		"header_create" => "Create Member",
		"header_search" => "Search Member",
		"header_export" => "Export Record", 
		"header_title" => "What would you like to export?",
		"member_id" => "Member ID",
		"Eng_Name" => "English Name",
		"Chi_Name" => "Chinese Name",
		"NRIC" => "NRIC", 
		"Citizenship" => "Citizenship",
		"Gender" => "Gender",
		"DOB" => "Date of Birth",
		"Co_number" => "Contact Number", 
		"Occupation" => "Occupation",
		"Address" => "Address",
		"Member_Type" => "Member Type", 
		"Admission" => "Date of Admission",
		"Recommender_ID" => "Recommender ID",
		"Recommender_Name" => "Recommender Name",
		"Remarks" => "Remarks",
		"select" => "Select All",
	);  
	// for create and update member information
	$member_info = array(
		//index
		"home" => "Home",
		"Create Member" => "Create Member",
		"Import" => "Import Record",
		"Upload" => "Upload File",
		"excel" => "Excel (.xlsx) File only", 
		"btn_submit" => "Submit",
		"member_id" => "Member ID",
		"member_status" => "Member Status",
		"Eng_Name" => "Member Name (English)",
		"Chi_Name" => "Member Name (Chinese)",
		"NRIC" => "NRIC", 
		"Citizenship" => "Citizenship",
		"Gender" => "Gender",
		"Male" => "Male",
		"Female" => "Female",
		"DOB" => "Date of Birth",
		"Co_number" => "Contact Number", 
		"Occupation" => "Occupation",
		"Address" => "Address",
		"Member_Type" => "Member Type", 
		"Normal" => "Normal", 
		"Permanent" => "Permanent", 
		"Non-member" => "Non-member", 
		"Admission" => "Date of Admission",
		"Recommender_ID" => "Recommender's ID",
		"Recommender_Name" => "Recommender's Name",
		"Remarks" => "Remarks"
	);
	// search member information
	$search_member_info = array(
		//index 
		"home" => "Home",
		"title" => "Search Member",
		"search" => "Search",
		"member_id" => "Member id",
		"member_eng_name" => "Mem. name (en)", 
		"member_chi_name" => "Mem. name (ch)", 
		"member_type" => "Mem. type",
		"member_status" => "Mem. status",
		"btnedit" => "Edit"
	);
	// create product information
	$create_product = array(
		//index 
		"home" => "Home",
		"title" => "Create Product", 
		"Import" => "Import Record",
		"Upload" => "Upload File",
		"excel" => "Excel (.xlsx) File only", 
		"product_id" => "Product ID",
		"product_eng_name" => "Product Name (English)", 
		"product_chi_name" => "Product Name (Chinese)", 
		"product_status" => "Product Status",
		"unit_price" => "Unit Price",
		"remarks" => "Remarks",
		"submit" => "Submit"
	);
	// search product information
	$search_product = array(
		//index 
		"home" => "Home",
		"title" => "Search Product",  
		"search" => "Search",  
		"product_id" => "Product ID",
		"product_eng_name" => "Product Name (EN)", 
		"product_chi_name" => "Product Name (CH)", 
		"product_status" => "Product Status",
		"btnedit" => "Edit"
	);
	// search product information
	$view_product = array(
		//index 
		"home" => "Home",
		"title" => "Search Product",  
		"search" => "Search",  
		"product_id" => "Product ID",
		"product_eng_name" => "Product Name (EN)", 
		"product_chi_name" => "Product Name (CH)", 
		"product_status" => "Product Status",
		"btnedit" => "Edit"
	);
	//export product information
	$export_product = array(
		//index  
		"title" => "What would you like to export?",  
		"titile1" => "Choose a product",  
		"titile2" => "Choose a period",
		"btn_export" => "Export"
	);
	//product aside 
	$product_aside = array(
		//index  
		"title" => "Manage Products",  
		"title1" => "Create Product",  
		"title2" => "Search Product",
		"title3" => "Export Record"
	);
?>
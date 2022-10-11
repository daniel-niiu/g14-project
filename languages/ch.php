<?php
	//header.php
	$header = array(
		//navbar
		"header_membership" => "会员管理",
		"header_transaction" => "交易管理",
		"header_product" => "产品管理",
		"header_stock" => "库存管理",
		"header_en" => "英文",
		"header_ch" => "华文",
		//profile
		"profile_user" => "欢迎您, ".$_SESSION['username'],
		"profile_acc_setting" => "账号设置",
		"profile_password" => "修改密码",
		"profile_signout" => "登出",
		//quick export
		"quick-export-title" => "快速下载",
		"quick-export-popout" => "下载于交易选择“分期付款”的详细记录。",
		"quick-export-question" => "您确定要快速下载文件吗？"
	);

	$form = array(
		"confirm" => "是的, 确定",
		"cancel" => "不是, 取消",
		"remarks" => "备注",
		"submit" => "提交"
	);
	
	//account modules
	$account = array(
		//edit password
		"email-address" => "Email Address",
		"restrict-email" => "*You are not allowed to modify the email address.",
		"account-type" => "Account Type",
		"admin" => "Administrator",
		"oper" => "Operator",
		"restrict-type" => "*You are not allowed to modify the account type.",
		"new-password" => "New Password",
		"confirm-password" => "Confirm Password"
	);

	//index.php
	$index = array(
		//titles
		"index_dashboard" => "首页",
		"index_reminder" => "添加笔录",
		"index_broadcast" => "通讯传播",
		"index_shortcuts" => "经纪快捷",
		"index_filter" => "管理快捷",
		//reminder  
		"index_reminder_create_title" => "添加笔录", 
		"index_reminder_title" => "标题", 
		"index_reminder_date" => "日期", 
		"index_reminder_content" => "内容", 
		"index_reminder_submit" => "上传",  
		"index_reminder_edit_title" => "修改日记",
		"index_reminder_delete" => "您确定要删除此笔录吗？", 
		//whatsapp broadcast
		"index_whatsapp_title" => "WhatsApp 通讯传播", 
		//filter preference
		"index_filter_title" => "请做出您的选择",
		"index_filter_create_mem" => "添加用户",
		"index_filter_search_mem" => "搜索用户",
		"index_filter_create_tablet" => "添加神主牌",
		"index_filter_search_tablet" => "搜索神主牌",
		"index_filter_create_blessing" => "添加祈福灯",
		"index_filter_search_blessing" => "搜索祈福灯",
		"index_filter_create_light" => "添加光明灯",
		"index_filter_search_light" => "搜索光明灯",
		//toasts
		"toast_success_user" => "用户资料已顺利被修改。",
		"toast_add_reminder" => "新笔录已顺利被添加。",
		"toast_edit_reminder" => "笔录已顺利被修改。",
		"toast_delete_reminder" => "笔录已顺利被删除。",
		"toast_success_filter" => "经纪快捷已顺利被修改。",
		"toast_new_notification" => "新通知",
		"toast_notification_today" => "今日",
		//footer
		"footer" => "声明：此作品为斯威本科技大学生于 2022 年为 SWE40001/SWE40002 软件工程科（甲、丙）所制的在制品。"
	);

	// for export member sidebar
	$aside_member_lang = array(
		//index
		"header_membership" => "会员管理",
		"header_create" => "添加会员",
		"header_search" => "搜索会员",
		"header_export" => "资料下载", 
		"header_title" => "您想要下载哪些资料?",
		"member_id" => "会员编号",
		"Eng_Name" => "英文名字",
		"Chi_Name" => "华语名字",
		"NRIC" => "NRIC号码", 
		"Citizenship" => "国籍",
		"Gender" => "性别",
		"DOB" => "出生日期",
		"Co_number" => "联络号码", 
		"Occupation" => "职业",
		"Address" => "地址",
		"Member_Type" => "会员类型", 
		"Admission" => "入会日期",
		"Recommender_ID" => "推荐人编号",
		"Recommender_Name" => "推荐人名字",
		"select" => "选择全部"
	);
	// for create and update member information
	$member_info = array(
		//index
		"home" => "主页",
		"Create Member" => "添加会员",
		"Import" => "上传文件",
		"Upload" => "选择文件",
		"excel" => "仅能选择Excel (.xlsx) 文件", 
		"btn_submit" => "确认",
		"member_id" => "会员编号",
		"member_status" => "活跃状态",
		"Eng_Name" => "英文名字",
		"Chi_Name" => "华文名字",
		"NRIC" => "NRIC号码", 
		"Citizenship" => "国籍",
		"Gender" => "性别",
		"Male" => "男性",
		"Female" => "女性",
		"DOB" => "出生日期",
		"Co_number" => "联络号码", 
		"Occupation" => "职业",
		"Address" => "地址",
		"Member_Type" => "会员类型", 
		"Normal" => "普通型会员", 
		"Permanent" => "永久型会员", 
		"Non-member" => "非会员", 
		"Admission" => "入会日期",
		"Recommender_ID" => "推荐人编号",
		"Recommender_Name" => "推荐人名字"
	);
	// search member information
	$search_member_info = array(
		//index 
		"home" => "主页",
		"title" => "添加会员",
		"search" => "搜索",
		"member_id" => "会员编号",
		"member_eng_name" => "英文名字", 
		"member_chi_name" => "华文名字", 
		"member_type" => "会员类型",
		"member_status" => "活跃状态",
		"btnedit" => "编辑"
	);

	// product information
	$create_product = array(
		//index 
		"home" => "主页",
		"title" => "添加产品", 
		"Import" => "上传excel记录",
		"Upload" => "上传文件",
		"excel" => "只能选择Excel (.xlsx) 文件而已", 
		"product_id" => "产品编号",
		"product_eng_name" => "产品英文名字", 
		"product_chi_name" => "产品华文名字", 
		"product_status" => "产品状态",
		"unit_price" => "产品类型",
		"remarks" => "评论"
	);
	// search product information
	$search_product = array(
		//index 
		"home" => "主页",
		"title" => "搜索产品",  
		"search" => "搜索",  
		"product_id" => "产品编号",
		"product_eng_name" => "产品英文名字", 
		"product_chi_name" => "产品华文名字", 
		"product_status" => "产品状态",
		"btnedit" => "编辑"
	);
	// export product information
	$export_product = array(
		//index  
		"title" => "你想要输出excel哪些资料?",  
		"titile1" => "选择一个产品",  
		"titile2" => "选择一个时段",
		"btn_export" => "输出"
	);
	//product aside 
	$product_aside = array(
		//index  
		"title" => "管理产品",  
		"title1" => "添加产品",  
		"title2" => "搜索产品",
		"title3" => "输出excel文件"
	);
?>
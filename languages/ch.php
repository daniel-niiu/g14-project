<?php
	//index page
	$lang = array(
		//index file
		"header_membership" => "会员",
		"header_transaction" => "交易",
		"header_product" => "产品",
		"header_stock" => "库存",
		"header_en" => "英文",
		"header_ch" => "华文",
		"index_dashboard" => "仪表板",
		"index_reminder" => "日记",
		"index_broadcast" => "转播",
		"index_shortcuts" => "管理快捷方式",
		"index_filter" => "过滤",
		//reminder  
		"index_reminder_create_title" => "添加日记", 
		"index_reminder_title" => "主题", 
		"index_reminder_date" => "日期", 
		"index_reminder_content" => "内容", 
		"index_reminder_submit" => "上传",  
		"index_reminder_edit_title" => "修改日记",
		"index_reminder_delete" => "你确定要删除这个吗", 
		"index_reminder_delete_confirm" => "是的, 确定",
		"index_reminder_delete_cancel" => "不是, 取消",
		//whatsapp broadcast
		"index_whatsapp_title" => "WhatsApp转播", 
		//filter preference
		"index_filter" => "过滤",
		"index_filter_title" => "选您想要的选项",
		"index_filter_create_mem" => "添加用户",
		"index_filter_search_mem" => "搜索用户",
		"index_filter_create_tablet" => "添加神主牌",
		"index_filter_search_tablet" => "搜索神主牌",
		"index_filter_create_blessing" => "添加祈福灯",
		"index_filter_search_blessing" => "搜索祈福灯",
		"index_filter_create_light" => "添加光明灯",
		"index_filter_search_light" => "搜索光明灯",
		//profile
		"profile_user" => "欢迎您,".$_SESSION['username'],
		"profile_acc_setting" => "账号设置",
		"profile_password" => "修改密码",
		"profile_signout" => "登出",
		//profile edit password
		"profile_edit_title" => "修改用户密码"
	);
	// for create member sidebar
	$aside_member_lang = array(
		//index
		"header_membership" => "管理会员",
		"header_create" => "添加会员",
		"header_search" => "搜寻会员",
		"header_export" => "下载资料", 
		"header_title" => "你想要下载哪些资料?",
		"member_id" => "会员编号",
		"Eng_Name" => "英文名字",
		"Chi_Name" => "华语名字",
		"NRIC" => "会员登记号码", 
		"Citizenship" => "会员 号码",
		"Gender" => "性别",
		"DOB" => "出生日期",
		"Co_number" => "联络号码", 
		"Occupation" => "职业",
		"Address" => "地址",
		"Member_Type" => "会员类型", 
		"Admission" => "录取日期",
		"Recommender_ID" => "推荐人编号",
		"Recommender_Name" => "推荐人名字",
		"Remarks" => "评论",
		"select" => "选择全部",
	);
	// for create and update member information
	$member_info = array(
		//index
		"home" => "主页",
		"Create Member" => "添加会员",
		"Import" => "上传excel记录",
		"Upload" => "上传文件",
		"excel" => "只能选择Excel (.xlsx) 文件而已", 
		"btn_submit" => "确认",
		"member_id" => "会员编号",
		"member_status" => "会员状态",
		"Eng_Name" => "会员英文名字",
		"Chi_Name" => "会员华文名字",
		"NRIC" => "会员登记号码", 
		"Citizenship" => "会员国籍号码",
		"Gender" => "性别",
		"Male" => "男性",
		"Female" => "女性",
		"DOB" => "出生日期",
		"Co_number" => "联络号码", 
		"Occupation" => "职业",
		"Address" => "地址",
		"Member_Type" => "会员类型", 
		"Normal" => "普通", 
		"Permanent" => "永久", 
		"Non-member" => "非会员", 
		"Admission" => "录取日期",
		"Recommender_ID" => "推荐人编号",
		"Recommender_Name" => "推荐人名字",
		"Remarks" => "评论"
	);
	// search member information
	$search_member_info = array(
		//index 
		"home" => "主页",
		"title" => "添加会员",
		"search" => "搜索",
		"member_id" => "会员编号",
		"member_eng_name" => "会员英文名字", 
		"member_chi_name" => "会员华文名字", 
		"member_type" => "会员类型",
		"member_status" => "会员状态",
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
		"remarks" => "评论",
		"submit" => "提交"
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
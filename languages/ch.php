<?php
	$page = array(
		//navbar
		"portal" => "慈云会员管理中心",
		"membership" => "会员管理",
		"transaction" => "交易管理",
		"product" => "产品管理",
		"stock" => "库存管理",
		"analytics" => "统计管理",
		//footer
		"footer" => "声明：此作品为斯威本科技大学生于 2022 年为 SWE40001/SWE40002 软件工程科（甲、丙）所制的在制品。",
		//quick-export
		"quick-export" => "快速下载",
		"quick-export-popout" => "下载于<莲座交易>里选择“分期付款”的详细记录。",
		"quick-export-title" => "您确定要快速下载此文件吗？",
		//profile
		"profile-user" => "欢迎您, ".$_SESSION['name'],
		"profile-acc-settings" => "账号设置",
		"profile-password" => "修改密码",
		"profile-signout" => "登出",
		"profile-language" => "显示：中文"
	);

	$account = array(
		//edit-password
		"email-title" => "*不可修改您的电子邮件。",
		"type-title" => "*不可修改您的帐户类型。",
		"old-password" => "旧密码",
		"new-password" => "新密码",
		"confirm-password" => "确认密码",
		//form
		"full-name" => "完整姓名",
		"email-address" => "电子邮件",
		"account-status" => "帐户状态",
		"status-active" => "有效",
		"status-inactive" => "无效",
		"account-type" => "帐户类型",
		"type-admin" => "管理员",
		"type-oper" => "操作员",
		"department" => "部门",
		"product-stock" => "产品 & 库存管理",
		//placeholder
		"current-password-placeholder" => "请输入您的旧密码",
		"new-password-placeholder" => "请输入您的新密码",
		"confirm-password-placeholder" => "请确认您的新密码"
	);

	$form = array(
		"confirm" => "是的，确认",
		"cancel" => "不是，取消",
		//form
		"remarks" => "备注",
		"submit" => "提交",
		//receipt
		"receipt-num" => "收据编号",
		"receipt-date" => "收据日期",
		"receipt-amount" => "收据总额",
		//search
		"btnedit" => "编辑",
		"search" => "搜索",
		//view
		"edit-record" => "编辑记录",
		"delete-record" => "删除记录",
		"delete-record-title" => "您确定要删除此记录吗？",
		"recorded-by" => "记录者",
		"recorded-on" => "记录于",
		//warning
		"id-warning" => "*不允许包含标点符号或留空不填。",
		"word-warning" => "*不允许包含数字、标点符号或留空不填。",
		"number-warning" => "*不允许包含字符、数字、标点符号或留空不填。",
		"empty-warning" => "*不允许留空不填。",
		"no-record-warning" => "查无此记录。请再试一次。"
	);

	$title = array(
		"home" => "首页",
		//membership
		"create-member" => "添加会员",
		"search-member" => "搜索会员",
		"view-member" => "鉴别会员",
		"edit-member" => "编辑会员",
		//memorial tablet
		"create-tablet" => "添加莲座",
		"search-tablet" => "搜索莲座",
		"view-tablet" => "鉴别莲座",
		"edit-tablet" => "编辑莲座",
		"view-transactions-table" => "鉴别莲座交易",
		"add-tablet-transaction" => "添加莲座交易",
		"view-tablet-transaction" => "鉴别莲座交易",
		"edit-tablet-transaction" => "编辑莲座交易",
		//blessing lantern
		"create-blessing" => "添加祈福灯",
		"search-blessing" => "搜索祈福灯",
		"view-blessing" => "鉴别祈福灯",
		"edit-blessing" => "编辑祈福灯",
		//guang-ming light
		"create-light" => "添加光明灯",
		"search-light" => "搜索光明灯",
		"view-light" => "鉴别光明灯",
		"edit-light" => "编辑光明灯",
		//product
		"create-product" => "添加产品",
		"search-product" => "搜索产品",
		"view-product" => "鉴别产品",
		"edit-product" => "编辑产品",
		"view-product-stock-in" => "鉴别产品进货",
		"view-product-stock-out" => "鉴别产品出货",
		//stocks
		"stock-in" => "库存进货",
		"stock-out" => "库存出货",
		"view-stock" => "鉴别库存",
		"edit-stock" => "编辑库存",
		//account
		"create-account" => "添加帐户",
		"search-account" => "搜索帐户",
		"edit-account" => "编辑帐户"
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
		"toast-success-edit-record" => "记录已顺利被修改。"
	);

	$index = array(
		//titles
		"index-dashboard" => "首页",
		"index-reminder" => "添加笔录",
		"index-broadcast" => "通讯传播",
		"index-shortcuts" => "经纪快捷",
		"index-filter" => "快捷管理",
		//reminder  
		"index-reminder-create-title" => "添加笔录", 
		"index-reminder-title" => "标题", 
		"index-reminder-date" => "日期", 
		"index-reminder-content" => "内容", 
		"index-reminder-null" => "您好, ".$_SESSION['name']."！", 
		"index-reminder-null-title" => "点击上方的 “添加笔录” 按钮并开始记载笔录！", 
		"index-reminder-edit-title" => "修改笔录",
		"index-reminder-delete-title" => "删除笔录",
		"index-reminder-delete" => "您确定要删除此笔录吗？", 
		//whatsapp broadcast
		"index-whatsapp-title" => "WhatsApp 通讯传播", 
		"index-whatsapp-message" => "信息内容", 
		//filter preference
		"index-filter-title" => "请依次选择三个链接为快捷。",
		"body-create-member" => "添加新会员记录。",
		"body-search-member" => "搜索会员记录。",
		"body-create-tablet" => "添加新莲座记录。",
		"body-search-tablet" => "搜索连坐记录。",
		"body-create-blessing" => "添加新祈福灯记录。",
		"body-search-blessing" => "搜索祈福灯记录。",
		"body-create-light" => "添加新光明灯记录。",
		"body-search-light" => "搜索光明灯记录。",
		"body-create-product" => "添加新产品记录。",
		"body-search-product" => "搜索产品记录。",
		"body-stock-in" => "添加新进货记录。",
		"body-stock-out" => "添加新出货记录。",
		//placeholder
		"reminder-title-placeholder" => "请输入您的标题",
		"reminder-content-placeholder" => "请输入您的笔录内容",
		"whatsapp-content-placeholder" => "请输入您的信息内容"
	);

	$import = array(
		"import-record" => "上传资料",
		"import" => "上传",
		//import file
		"upload-file" => "选择文件",
		"upload-warning" => "**仅可上传 Excel (.xlsx) 文件而已。",
		//import: transaction
		"import-tablet" => "上传莲座资料",
		"import-tablet-transaction" => "上传交易资料"
	);  

	$export = array(
		"export-record" => "下载资料",
		"export" => "下载",
		//export file
		"export-record-title" => "您想要下载哪些资料?",
		"choose-type" => "请选择您想要的类型",
		"choose-period" => "请选择您想要的时间段",
		"period-from" => "开始日期",
		"period-to" => "结束日期",
		"choose-product" => "请选择您想要的产品",
		//export: transaction
		"tablet-transactions" => "莲座交易"
	);  

	$member = array(
		"manage-membership" => "会员管理",
		//form: member
		"member-id" => "会员编号",
		"member-status" => "会员状态",
		"status-active" => "活跃",
		"status-inactive" => "不活跃",
		"eng-name" => "英文姓名",
		"chi-name" => "中文姓名",
		"nric" => "身份证号", 
		"citizenship" => "国籍",
		"age" => "岁数",
		"gender" => "性别",
		"gender-male" => "男性",
		"gender-female" => "女性",
		"dob" => "出生日期",
		"contact" => "联络号码", 
		"occupation" => "职业",
		"address" => "地址",
		"member-type" => "会员类型", 
		"type-normal" => "普通会员", 
		"type-permanent" => "永久会员", 
		"type-non-member" => "非会员", 
		"admission" => "入会日期",
		"recommender-id" => "推荐人编号",
		"recommender-name" => "推荐人姓名",
		"select-all" => "选择全部",
		"select-null" => "请选择一个标题"
	);

	$transaction = array(
		"manage-transaction" => "交易管理",
		"memorial-tablet" => "祖先莲座",
		"blessing-lantern" => "祈福灯",
		"guang-ming-light" => "光明灯",
		//form: memorial tablet
		"tablet-id" => "莲座编号",
		"inst-date" => "安座日期",
		"zone" => "区号",
		"tier" => "层次",
		"row" => "编号", 
		"price" => "总额",
		"contact-num1" => "主要联络号码",
		"contact-num2" => "次要联络号码",
		"payment-type" => "付费类型",
		"type-lump-sum" => "一次性付款", 
		"type-over-time" => "分期付款",
		"anc-eng-name" => "逝者英文姓名",
		"anc-chi-name" => "逝者华文姓名",
		//search: memorial tablet
		"search-anc-eng" => "逝者英文姓名",
		"search-anc-chi" => "逝者华文姓名",
		"search-mem-eng" => "会员英文姓名",
		"search-mem-chi" => "会员中文姓名",
		//form: blessing lantern
		"lantern-id" => "祈福灯编号",
		"blessing-price" => "Blessing Price",
		"votive-price" => "Votive Price",
		"blessing-receipt" => "Blessing Receipt",
		"votive-receipt" => "Votive Receipt",
		//form: guang-ming light
		"light-id" => "光明灯编号"
	);

	$product = array(
		"manage-product" => "产品管理",
		//form: product
		"product-id" => "产品编号",
		"product-status" => "产品状态",
		"status-available" => "有货",
		"status-unavailable" => "无货",
		"eng-name" => "产品英文名称",
		"chi-name" => "产品华文名称",
		"unit-price" => "产品单价"
	);

	$stock = array(
		"manage-stock" => "库存管理",
		//form: product
		"product-name" => "产品名称",
		"summary" => "摘要",
		"balance" => "结存"
	);

	$analytics = array(
		"manage-analytics" => "统计管理",
		"membership" => "会员统计",
		"transaction" => "交易统计",
		"product" => "库存统计",
		"category" => "类别"
	);
?>
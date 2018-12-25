<?php
//后台路由
// Route::rule('manage','/index/Index/index');
Route::rule('manage','/admin/Index/index');
// Route::rule('index','index/Index/index');
//前台页面-cn
Route::rule('index','index/Index/index');
Route::rule('about','index/Index/about');
Route::rule('about_honor','index/Index/about_honor');
Route::rule('business','index/Index/business');
Route::rule('business_detail','index/Index/business_detail');
Route::rule('contact','index/Index/contact');
Route::rule('human','index/Index/human');
Route::rule('news','index/Index/news');
Route::rule('news_detail','index/Index/news_detail');
Route::rule('partner','index/Index/partner');

//前台页面-en
Route::rule('en_index','index/English/en_index');
Route::rule('en_about','index/English/en_about');
Route::rule('en_about_honor','index/English/en_about_honor');
Route::rule('en_business','index/English/en_business');
Route::rule('en_business_detail','index/English/en_business_detail');
Route::rule('en_contact','index/English/en_contact');
Route::rule('en_human','index/English/en_human');
Route::rule('en_news','index/English/en_news');
Route::rule('en_news_detail','index/English/en_news_detail');
Route::rule('en_partner','index/English/en_partner');
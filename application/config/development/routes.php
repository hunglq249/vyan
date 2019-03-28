<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'homepage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

//about
$route['ve-chung-toi/([a-zA-Z0-9-_]+)/([a-zA-Z0-9-_]+)'] = 'about/index/$1/$2';
$route['ve-chung-toi/([a-zA-Z0-9-_]+)'] = 'about/list/$1';
$route['ve-chung-toi'] = 'about/list_all';

//academy
$route['hoc-vien-vyan/([a-zA-Z0-9-_]+)/([a-zA-Z0-9-_]+)'] = 'academy/index/$1/$2';
$route['hoc-vien-vyan/([a-zA-Z0-9-_]+)'] = 'academy/list/$1';
$route['hoc-vien-vyan'] = 'academy/list_all';

//service
$route['dich-vu/([a-zA-Z0-9-_]+)/([a-zA-Z0-9-_]+)'] = 'service/index/$1/$2';
$route['dich-vu/([a-zA-Z0-9-_]+)'] = 'service/list/$1';
$route['dich-vu'] = 'service/list_all';

// news
$route['bai-viet'] = 'news/list_all';
$route['bai-viet/([a-zA-Z0-9-_]+)'] = 'news/index/$1';

//transform
$route['ket-qua/([a-zA-Z0-9-_]+)'] = 'transform/index/$1';

//why
$route['tai-sao-chon-vyan/([a-zA-Z0-9-_]+)'] = 'why/index/$1';

// $route['lien-he'] = 'contact/index';
// $route['(:any)/chi-tiet/(:any)'] = "blogs/detail/$2";

if($this->uri->segment(1) == "admin"){
	$route['admin'] = 'admin/user/login';
}

// $route['^vi/(.+)$'] = "$1";
// $route['^en/(.+)$'] = "$1";
// $route['^cn/(.+)$'] = "$1";

// $route['^vi$'] = $route['default_controller'];
// $route['^en$'] = $route['default_controller'];
// $route['^cn$'] = $route['default_controller'];



//else{
//	$route['([a-zA-Z0-9-_]+)'] = 'test/index/$1';
//	$route['([a-zA-Z0-9-_]+)/([a-zA-Z0-9-_]+)'] = 'test/index/$1/$2';
//}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['users/logout'] = 'users/logout';
$route['users/updateStatus'] = 'users/updateStatus';
$route['users/updateFAQ'] = 'users/updateFAQ';
$route['users/editFAQ'] = 'users/editFAQ';
$route['users/askQuestion'] = 'users/askQuestion';
$route['users/my_faq'] = 'users/my_faq';
$route['users/faq'] = 'users/faq';
$route['users/resetpassword'] = 'users/resetpassword';
$route['users/addCustomUser'] = 'users/addCustomUser';
$route['users/(:any)'] = 'users/view/$1';
$route['users'] = 'users/index';
$route['default_controller'] = 'pages/view';  // DEFAULT PAGE LOADER
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

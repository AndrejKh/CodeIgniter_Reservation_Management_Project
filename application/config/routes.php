<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['request/list'] = 'request/list';
$route['request/completed'] = 'request/list_completed';
$route['request/create'] = 'request/create';
$route['request/update'] = 'request/update';
$route['request/list-ip/(:any)'] = 'request/list_by_ip/$1';
$route['request/free-user'] = 'request/send_free_user_email';
$route['request/submited'] = 'request/request_submited';
$route['request/create-admin'] = 'request/create_by_admin';
$route['request/list-admin'] = 'request/admin_forms_list';
$route['request/submit/(:any)'] = 'request/submit_to_admin/$1';
$route['request/list-submited/(:any)'] = 'request/user_submited_list/$1';
$route['request/confirm-request'] = 'request/send_admin_to_user_email';
$route['request/wrong-username'] = 'request/send_wrong_username_email_admin';

// $route['request/(:any)'] = 'request/view/$1';
$route['request'] = 'request/index';

$route['default_controller'] = 'request/create';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

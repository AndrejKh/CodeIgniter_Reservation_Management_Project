<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['events/list'] = 'events/list';
$route['events/completed'] = 'events/list_completed';
$route['events/create'] = 'events/create';
$route['events/update'] = 'events/update';
$route['events/list-ip/(:any)'] = 'events/list_by_ip/$1';
$route['events/free-user'] = 'events/send_free_user_email';
$route['events/submited'] = 'events/event_submited';
$route['events/create-admin'] = 'events/create_by_admin';
$route['events/list-admin'] = 'events/admin_forms_list';
$route['events/submit/(:any)'] = 'events/submit_to_admin/$1';
$route['events/list-submited/(:any)'] = 'events/user_submited_list/$1';
$route['events/confirm-events'] = 'events/send_admin_to_user_email';
$route['events/wrong-username'] = 'events/send_wrong_username_email_admin';

// $route['events/(:any)'] = 'events/view/$1';
$route['events'] = 'events/index';

$route['default_controller'] = 'events/create';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

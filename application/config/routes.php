<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['events/list'] = 'events/list';
$route['events/create'] = 'events/create';
$route['events/update'] = 'events/update';
$route['events/(:any)'] = 'events/view/$1';
$route['events/(:any)/reservations'] = 'events/reservations/$1';
$route['reservations/create'] = 'reservations/create';
$route['reservations/submit/(:any)'] = 'reservations/submit_to_admin/$1';
$route['reservations/list-submited/(:any)'] = 'reservations/user_submited_list/$1';
$route['reservations/edit/(:any)'] = 'reservations/edit/$1';
$route['reservation/(:any)'] = 'reservations/get/$1';

$route['reservations/wrong-username'] = 'reservations/send_wrong_username_email_admin';

// $route['events/(:any)'] = 'events/view/$1';
$route['events'] = 'events/index';

$route['default_controller'] = 'events/create';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

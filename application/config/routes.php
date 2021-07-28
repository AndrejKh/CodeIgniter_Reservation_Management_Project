<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['events/list'] = 'events/list';
$route['events/create'] = 'events/create';
$route['events/update/(:any)'] = 'events/update/$1';
$route['events/thank-email/(:any)'] = 'events/thank_email/$1';
$route['events/(:any)'] = 'events/view/$1';
$route['events/(:any)/reservations'] = 'events/reservations/$1';
$route['reservations/create/(:any)'] = 'reservations/create/$1';
$route['reservations/register/(:any)'] = 'reservations/create_public/$1';
$route['reservations/update/(:any)'] = 'reservations/update/$1';
$route['reservations/list-submited/(:any)'] = 'reservations/user_submited_list/$1';
$route['reservations/edit/(:any)'] = 'reservations/edit/$1';
$route['reservation/(:any)'] = 'reservations/get/$1';

$route['reservations/wrong-username'] = 'reservations/send_wrong_username_email_admin';

// $route['events/(:any)'] = 'events/view/$1';
$route['events'] = 'events/index';

$route['default_controller'] = 'events/list';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

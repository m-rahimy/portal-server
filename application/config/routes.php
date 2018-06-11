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
$route['default_controller'] = 'user/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* ADMIN */
$route['admin'] = 'user/index';
$route['admin/signup'] = 'user/signup';
$route['admin/create_member'] = 'user/create_member';
$route['admin/login'] = 'user/index';
$route['admin/logout'] = 'user/logout';
$route['admin/login/validate_credentials'] = 'user/validate_credentials';

/* ADMIN edits marks */
$route['admin/marks'] = 'admin_marks/index';
$route['admin/marks/add'] = 'admin_marks/add';
$route['admin/marks/update'] = 'admin_marks/update';
$route['admin/marks/update/(:any)'] = 'admin_marks/update/$1';
$route['admin/marks/delete/(:any)'] = 'admin_marks/delete/$1';
$route['admin/marks/(:any)'] = 'admin_marks/index/$1';

/* ADMIN edits marks */
$route['admin/indicator_tables'] = 'admin_indicator_tables/index';
$route['admin/indicator_tables/add'] = 'admin_indicator_tables/add';
$route['admin/indicator_tables/update'] = 'admin_indicator_tables/update';
$route['admin/indicator_tables/update/(:any)'] = 'admin_indicator_tables/update/$1';
$route['admin/indicator_tables/delete/(:any)'] = 'admin_indicator_tables/delete/$1';
$route['admin/indicator_tables/(:any)'] = 'admin_indicator_tables/index/$1';

/* ADMIN edits cols */
$route['admin/cols'] = 'admin_col_titles/index';
$route['admin/cols/add'] = 'admin_col_titles/add';
$route['admin/cols/export'] = 'admin_col_titles/export_csv';
$route['admin/cols/update'] = 'admin_col_titles/update';
$route['admin/cols/update/(:any)'] = 'admin_col_titles/update/$1';
$route['admin/cols/delete/(:any)'] = 'admin_col_titles/delete/$1';
$route['admin/cols/(:any)'] = 'admin_col_titles/index/$1';

/* ADMIN edits rows */
$route['admin/row_titles'] = 'admin_row_titles/index';
$route['admin/row_titles/add'] = 'admin_row_titles/add';
$route['admin/row_titles/update'] = 'admin_row_titles/update';
$route['admin/row_titles/update/(:any)'] = 'admin_row_titles/update/$1';
$route['admin/row_titles/delete/(:any)'] = 'admin_row_titles/delete/$1';
$route['admin/row_titles/(:any)'] = 'admin_row_titles/index/$1';

/* ADMIN edits units */
$route['admin/units'] = 'admin_units/index';
$route['admin/units/add'] = 'admin_units/add';
$route['admin/units/update'] = 'admin_units/update';
$route['admin/units/update/(:any)'] = 'admin_units/update/$1';
$route['admin/units/delete/(:any)'] = 'admin_units/delete/$1';
$route['admin/units/(:any)'] = 'admin_units/index/$1';

/* ADMIN edits indicators */
$route['admin/indicators'] = 'admin_indicators/index';
$route['admin/indicators/add'] = 'admin_indicators/add';
$route['admin/indicators/update'] = 'admin_indicators/update';
$route['admin/indicators/update/(:any)'] = 'admin_indicators/update/$1';
$route['admin/indicators/delete/(:any)'] = 'admin_indicators/delete/$1';
$route['admin/indicators/(:any)'] = 'admin_indicators/index/$1';

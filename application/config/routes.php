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
$route['default_controller'] = 'Front';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['assets/(:any)'] = 'assets/$1';

/* Admin Routes */
$route['admin'] = 'Admin_main/index'; // main admin route
// Admin user main functions
$route['admin/login'] = 'Admin_main/login';
$route['admin/logout'] = 'Admin_main/logout';
$route['admin/register'] = 'Admin_main/register';
// Year table
$route['admin/years'] = 'Admin_year/read';
$route['admin/add-year'] = 'Admin_year/create';
$route['admin/edit-year/(:any)'] = 'Admin_year/update/$1';
$route['admin/delete-year'] = 'Admin_year/delete';
// Day schedule
$route['admin/days'] = 'Admin_day/read';
$route['admin/add-day'] = 'Admin_day/create';
$route['admin/edit-day/(:any)'] = 'Admin_day/update/$1';
$route['admin/delete-day'] = 'Admin_day/delete';
$route['admin/days-of-atlantykron/(:any)'] = 'Admin_day/get_days/$1';
// Locations
$route['admin/locations'] = 'Admin_location/read';
$route['admin/add-location'] = 'Admin_location/create';
$route['admin/edit-location/(:any)'] = 'Admin_location/update/$1';
$route['admin/delete-location'] = 'Admin_location/delete';
// Teachers
$route['admin/teachers'] = 'Admin_teacher/read';
$route['admin/add-teacher'] = 'Admin_teacher/create';
$route['admin/edit-teacher/(:any)'] = 'Admin_teacher/update/$1';
$route['admin/delete-teacher'] = 'Admin_teacher/delete';
// Classes
$route['admin/classes'] = 'Admin_class/read';
$route['admin/add-class'] = 'Admin_class/create';
$route['admin/edit-class/(:any)'] = 'Admin_class/update/$1';
$route['admin/delete-class'] = 'Admin_class/delete';
// Class schedules
$route['admin/class-schedules'] = 'Admin_class_schedule/read';
$route['admin/add-class-schedule'] = 'Admin_class_schedule/create';
$route['admin/edit-class-schedule/(:any)'] = 'Admin_class_schedule/update/$1';
$route['admin/delete-class-schedule'] = 'Admin_class_schedule/delete';
$route['admin/classes-of-atlantykron/(:any)'] = 'Admin_class_schedule/get_classes/$1';
$route['admin/download-schedule/(:any)/(:any)'] = 'Admin_class_schedule/get_schedule_as_pdf/$1/$2';

/* Front Routes */
$route['daily-schedule/(:any)'] = 'Front/daily_schedule/$1';
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
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'home';

$route['user/setting/setting_email'] = 'user/setting_email';
$route['user/setting/setting_password'] = 'user/setting_password';
$route['user/resume/resume_setting'] = 'user/resume_setting';

$route['user/experience/add'] = 'user/experience_add';
$route['user/experience/edit/(:any)'] = 'user/experience_edit/$1';
$route['user/skills/add'] = 'user/skills_add';
$route['user/education/add'] = 'user/education_add';
$route['user/education/edit/(:any)'] = 'user/education_edit/$1';

$route['companies/jobs_offer/detail/(:any)'] = 'companies/jobs_offer_detail/$1';

$route['otp'] = 'register/otp';
$route['validate_company'] = 'companies/validate_company';

$route['admin'] = 'admin/dashboard';

$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8

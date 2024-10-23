<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'index';
$route['404_override'] = 'error404';
$route['translate_uri_dashes'] = FALSE;

// Hide the User and Admin

$route['dashboard'] = 'admin/dashboard'; // Maps website/file-management to the admin/FileManagement controller
$route['FileManagement'] = 'admin/FileManagement'; // Maps website/file-management to the admin/FileManagement controller
$route['UserManagement'] = 'admin/UserManagement'; // Maps website/user-management to the admin/UserManagement controller
$route['SaldoUsers'] = 'admin/SaldoUser';
$route['RunningText'] = 'admin/RunningText';
$route['Banner'] = 'admin/Banner'; // Maps website/file-management to the admin/FileManagement controller
$route['Team'] = 'admin/Team'; // Maps website/file-management to the admin/FileManagement controller

// Routing for User Controllers
$route['SaldoUser'] = 'user/SaldoUser';
$route['Formulir_Iuran'] = 'formulir/Formulir_Iuran';
$route['Formulir_Permohonan'] = 'formulir/Formulir_Permohonan';
$route['Formulir'] = 'formulir/All_Formulir';
$route['Detail_Formulir/(:num)'] = 'formulir/Detail_Formulir/$1';
$route['Detail/(:any)'] = 'Detail/index/$1';
$route['Detail/PDP/(:any)'] = 'Detail/PDP/$1';
$route['PDP'] = 'Admin/Laporan/PDP';
$route['Laporan_Triwulan'] = 'Admin/Laporan/Triwulan';
$route['Laporan_Tahunan'] = 'Admin/Laporan/Tahunan';

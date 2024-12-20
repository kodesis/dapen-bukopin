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

$route['dashboard'] = 'Admin/dashboard'; // Maps website/file-management to the admin/FileManagement controller
$route['FileManagement'] = 'Admin/FileManagement'; // Maps website/file-management to the admin/FileManagement controller
$route['UserManagement'] = 'Admin/UserManagement'; // Maps website/user-management to the admin/UserManagement controller
$route['SaldoUsers'] = 'Admin/SaldoUser';
$route['RunningText'] = 'Admin/RunningText';
$route['Banner'] = 'Admin/Banner'; // Maps website/file-management to the admin/FileManagement controller
$route['Team'] = 'Admin/Team'; // Maps website/file-management to the admin/FileManagement controller

// Routing for User Controllers
$route['SaldoUser'] = 'User/SaldoUser';
$route['Formulir_Iuran'] = 'Formulir/Formulir_Iuran';
$route['Formulir_Permohonan'] = 'Formulir/Formulir_Permohonan';
$route['Formulir'] = 'Formulir/All_Formulir';
$route['Detail_Formulir/(:num)'] = 'Formulir/Detail_Formulir/$1';
$route['Detail/(:any)'] = 'Detail/index/$1';
$route['Detail/PDP/(:any)'] = 'Detail/PDP/$1';
$route['PDP'] = 'Admin/Laporan/Detail_PDP';
$route['Laporan_Triwulan'] = 'Admin/Laporan/Triwulan';
$route['Laporan_Tahunan'] = 'Admin/Laporan/Tahunan';
$route['PDP_Bank_KB_Bukopin'] = 'Admin/Laporan/PDP';
$route['Detail_Laporan/Triwulan/(:any)'] = 'Admin/Laporan/Detail/Laporan Triwulan/$1';
$route['Detail_Laporan/Tahunan/(:any)'] = 'Admin/Laporan/Detail/Laporan Tahunan/$1';
$route['Detail_Laporan/PDP/(:any)'] = 'Admin/Laporan/Detail/PDP Bank KB Bukopin/$1';

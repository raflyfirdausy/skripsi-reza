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
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['auth/login']['post']      = 'auth/prosesLogin';
$route['ganti-password']['post']  = 'Ganti_password/ubah_password';

$route['auth/register']['post']   = 'auth/proses_register';
$route['dokumen-pegawai/detail/(:any)']['post'] = "dokumen-pegawai/hapus";

$route['tanah/tambah']['post']          = 'tanah/proses_tambah';
$route['tanah/edit/(:any)']['post']     = 'tanah/proses_edit';

$route['peralatan/tambah']['post']      = 'peralatan/proses_tambah';
$route['peralatan/edit/(:any)']['post'] = 'peralatan/proses_edit';

$route['bangunan/tambah']['post']       = 'bangunan/proses_tambah';
$route['bangunan/edit/(:any)']['post']  = 'bangunan/proses_edit';

$route['jalan/tambah']['post']          = 'jalan/proses_tambah';
$route['jalan/edit/(:any)']['post']     = 'jalan/proses_edit';

$route['lain/tambah']['post']           = 'lain/proses_tambah';
$route['lain/edit/(:any)']['post']      = 'lain/proses_edit';

$route['peminjaman/tambah']['post']     = 'peminjaman/proses_tambah';

$route['pengembalian']['post']          = 'pengembalian/cek';
$route['pengembalian/detail/(:any)']['post']          = 'pengembalian/proses_kembali/$1';
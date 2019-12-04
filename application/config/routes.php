<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'controllerPegawai/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['keluar'] = 'controllerPegawai/logout';
$route['register'] = 'controllerPegawai/register';
$route['admin/dashboard'] = 'controllerAdmin/dashboard';
$route['admin/ajaxSurat/(:any)'] = 'controllerSurat/data_ajax/$1';
$route['admin/hapusSurat/(:any)'] = 'controllerSurat/hapusSurat/$1';
$route['lihatSurat/(:any)'] = 'controllerSurat/lihatSurat/$1';
$route['admin/suratMasuk'] = 'controllerSurat/daftarSuratMasuk';
$route['admin/suratKeluar'] = 'controllerSurat/daftarSuratKeluar';
$route['admin/ubahSuratMasuk'] = 'controllerSurat/editSuratMasuk';
$route['admin/ubahSuratKeluar'] = 'controllerSurat/editSuratKeluar';
$route['admin/undangan'] = 'controllerSurat/daftarUndangan';
$route['admin/ubahUndangan'] = 'controllerSurat/ubahUndangan';
$route['admin/pengaturan'] = 'controllerAdmin/pengaturan';
$route['admin/ajaxPegawai/(:any)'] = 'controllerAdmin/data_ajax/$1';
$route['admin/ubahPegawai'] = 'controllerAdmin/ubahStatusPegawai';
$route['admin/hapusPegawai/(:any)'] = 'controllerAdmin/hapusPegawai/$1';
$route['suratmasuk'] = 'controllerSurat/daftarSuratMasuk';
$route['suratkeluar'] = 'controllerSurat/daftarSuratKeluar';
$route['dashboard'] = 'controllerPegawai/dashboard';
$route['admin/csmasuk'] = 'controllerSurat/print_suratmasuk';
$route['admin/cskeluar'] = 'controllerSurat/print_suratkeluar';
$route['kepala/k_dashboard'] = 'controllerKepala/dashboardkepala';
$route['kepala/k_suratMasuk'] = 'controllerSurat/daftarSuratMasuk';
$route['kepala/k_suratKeluar'] = 'controllerSurat/daftarSuratKeluar';
$route['admin/cetakSurat/(:any)'] = 'controllerSurat/viewDisposisi/$1';


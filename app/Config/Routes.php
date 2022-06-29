<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->group('', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    //aset
    $routes->get('/aset', 'AsetController::index');
    $routes->post('/aset/simpan', 'AsetController::saveAset');
    $routes->post('/aset/update/(:num)', 'AsetController::updateAset/$1');
    $routes->post('/aset/delete/(:num)', 'AsetController::deleteAset/$1');
    //kebun
    $routes->get('/kebun', 'KebunController::index');
    $routes->post('/kebun/simpan', 'KebunController::saveKebun');
    $routes->post('/kebun/update/(:num)', 'KebunController::updateKebun/$1');
    $routes->post('/kebun/delete/(:num)', 'KebunController::deleteKebun/$1');
    //kategori
    $routes->get('/kategori', 'KategoriController::index');
    $routes->post('/kategori/simpan', 'KategoriController::saveKategori');
    $routes->post('/kategori/update/(:num)', 'KategoriController::updateKategori/$1');
    $routes->post('/kategori/delete/(:num)', 'KategoriController::deleteKategori/$1');
    //satuan
    $routes->get('/satuan', 'SatuanController::index');
    $routes->post('/satuan/simpan', 'SatuanController::saveSatuan');
    $routes->post('/satuan/update/(:num)', 'SatuanController::updateSatuan/$1');
    $routes->post('/satuan/delete/(:num)', 'SatuanController::deleteSatuan/$1');
    //masuk
    $routes->get('/masuk', 'MasukController::index');
    $routes->get('/masuk/addmasuk', 'MasukController::simpanMasuk');
    $routes->post('/masuk/simpan', 'MasukController::storeMasuk');
    $routes->post('/masuk/delete/(:num)', 'MasukController::deleteMasuk/$1');
    //keluar
    $routes->get('/keluar', 'KeluarController::index');
    $routes->get('/keluar/addkeluar', 'KeluarController::simpanKeluar');
    $routes->post('/keluar/simpan', 'KeluarController::storeKeluar');
    $routes->post('/keluar/delete/(:num)', 'KeluarController::deleteKeluar/$1');
    //karyawan
    $routes->get('/karyawan', 'KaryawanController::index');
    $routes->get('/karyawan/addkaryawan', 'KaryawanController::addKaryawan');
    $routes->post('/karyawan/simpan', 'KaryawanController::simpanKaryawan');
    $routes->get('/karyawan/editkaryawan/(:num)', 'KaryawanController::editKaryawan/$1');
    $routes->post('/karyawan/edit/(:num)', 'KaryawanController::storeKaryawan/$1');
    $routes->post('/karyawan/delete/(:num)', 'KaryawanController::deleteKaryawan/$1');
    $routes->get('/karyawan/print', 'KaryawanController::printKaryawan');
    $routes->post('/karyawan/exportexcel', 'KaryawanController::exportExcel');
    //salary
    $routes->get('/salary', 'SalaryController::index');
    $routes->get('/salary/addsalary', 'SalaryController::addSalary');
    $routes->post('/salary/simpan', 'SalaryController::simpanSalary');
    $routes->get('/salary/editsalary/(:num)', 'SalaryController::editSalary/$1');
    $routes->post('/salary/update/(:num)', 'SalaryController::updateSalary/$1');
    $routes->post('/salary/delete/(:num)', 'SalaryController::deleteSalary/$1');
    $routes->get('/salary/print', 'SalaryController::printSalary');
    //absensi
    $routes->get('/absensi', 'AbsensiController::index');
    $routes->post('/absensi/simpan', 'AbsensiController::simpanAbsensi');
    //panen
    $routes->get('/panen', 'PanenController::index');
    $routes->post('/panen/simpan', 'PanenController::simpanPanen');
    $routes->post('/panen/update/(:num)', 'PanenController::updatePanen/$1');
    $routes->post('/panen/delete/(:num)', 'PanenController::deletePanen/$1');
    //laba
    $routes->get('/laba', 'LabaController::index');
    $routes->get('/laba/print', 'LabaController::printAllLaba');
    $routes->post('/laba/printfilter', 'LabaController::printFilterLaba');
    $routes->post('/laba/exportexcel', 'LabaController::excelLaba');
    $routes->post('/laba/excelfilter', 'LabaController::excelLabaFilter');
    //cost
    $routes->get('/cost', 'CostController::index');
    $routes->get('/cost/print', 'CostController::printAllCost');
    $routes->post('/cost/printfilter', 'CostController::printFilterCost');
    $routes->post('/cost/exportexcel', 'CostController::excelCost');
    $routes->post('/cost/excelfilter', 'CostController::excelCostFilter');

    $routes->get('/report', 'ReportController::index');
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

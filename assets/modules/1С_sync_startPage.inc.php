<?php
/**
 * 1С_sync_startPage
 * Плагин для старта синхронизации с 1С
 *
 * @category    plugin
 * @version    	0.01
 * @author      Tanzirev <tanzirev@mail.ru>
 * @internal    @events         OnPageNotFound
 * @internal    @category       Shop
 * @internal    @code           include MODX_BASE_PATH."assets/modules/catalogFill_1C/1С_sync_startPage.inc.php";
 */
$e =&$modx->event;
switch ($e->name) {
    case 'OnPageNotFound':
	require MODX_BASE_PATH."assets/modules/catalogFill_1C/settings/settings.conf.php"; // Подключаем файл конфигурации синхронизации с 1С
	$url=$_SERVER['REQUEST_URI']; // Узнаем по какой ссылке перешли
	$url_settings = $settings['link_settings']; // Узнаем адрес ссылки заданой в настройках
	if($url == $url_settings){
		$start1Csync = true;
		require_once MODX_BASE_PATH."assets/modules/catalogFill_1C/catalog_fill_1C.inc.php";
	}
}
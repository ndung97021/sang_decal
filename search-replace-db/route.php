<?php

require_once __DIR__ . "/srdb.class.php";
use \Slim\Http\Request;

function handleDbUpdateUrl() {
	$app = \Slim\Slim::getInstance();
	$module = 'Tools';
	$controller = 'DbUpdateUrl';
	if( $app->request()->getMethod() == Request::METHOD_POST ) {
		$action = 'Update';
	} else {
		$action = 'Index';
	}

	$fullAction = strtolower("{$module}-{$controller}-{$action}");

	profiler_start('mage_checker_action:'.$fullAction);

	// Modules\Tools\Controller\BackupRestoreController.php
	$controllerName = "\\modules\\{$module}\\Controller\\{$controller}Controller";
	$fullName = str_replace('\\', DIRECTORY_SEPARATOR, MAGE_CHECKER_PATH . $controllerName . '.php');
	if( file_exists( $fullName ) ) {
		include_once $fullName;
	}
	try {
		if( class_exists($controllerName) ) {
			$app->container->set('module_name', $module);
			$app->container->set('controller_name', $controller);
			$app->container->set('action_name', $action);
			$app->container->set('full_action', $fullAction);
			$app->container->set('subrequest', false);

			$__controllers = $app->container->get('__controllers');
			if( !isset($_controllers[$controllerName]) ) {
				$__controllers[$controllerName] = new $controllerName($module);
				$app->container->set('__controllers', $__controllers);
			}
			$_controller = $__controllers[$controllerName];

			$app->container->set('controller', $_controller);
			$result = $_controller->dispatch($action, $args);
		} else {
			$result = false;
		}
	} catch ( \Slim\Exception\Stop $ex ) {
	} catch ( Exception $ex ) {
	}
}
$app->any('/db-update-url(/)', 'handleDbUpdateUrl');
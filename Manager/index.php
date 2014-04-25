<?php
include 'UIBundleLibrary.php';
include 'UIComponentDependencyManager.php';

$library = new UIBundleLibrary();
$library->name = 'jQueryUI';
$library->path = 'jquery-ui-1.10.1.custom';
$library->excludedDependencies = array('jquery');
$library->dependencyFilesPath = $library->path . '/development-bundle';
$library->dependencyExtension = 'json';
$library->dependencyAliasPattern =  "/([a-zA-Z\-\.]*?).jquery.json/";
$library->srcFilesPath = $library->dependencyFilesPath .'/ui';
$library->srcExtension = 'js';
$library->srcAliasPattern = '/jquery\.([a-zA-Z\-\.]*)\.js/';
$library->minifiedFilesPath = $library->srcFilesPath .'/minified';
$library->minifiedExtension = 'js';
$library->minifiedAliasPattern = '/jquery\.([a-zA-Z\-\.]*)\.min\.js/';



$manager = UIComponentDependencyManager::getInstance();

$manager->addLibrary($library);
$manager->includeComponent('ui.slider');
$components=$manager->getComponents();
echo "If I want to load ui.slider I need:\n";
print_r($components);

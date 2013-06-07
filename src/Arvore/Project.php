<?php
namespace Arvore;

use Doctrine\ORM\Tools\Setup;

/**
 * Project class
 *
 * @author Glauber Portella <glauberportella@gmail.com>
 */
class Project {
	const ENV = 'dev'; // dev, prod, test
	const TEMPLATE_PATH = 'View';
	const TEMPLATE_CACHE_PATH = '../../app/cache';

	// database configuration parameters
	public static $conn = array(
			'driver'	=> 'pdo_mysql',
			'host'		=> 'localhost',
			'dbname'	=> 'arvorephp',
			'user'		=> 'root',
			'password'	=> ''
		);

	public static $config;

	public static function setup()
	{
		self::$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/Model"), self::ENV === 'dev');
		// or if you prefer yaml or XML
		//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/../config/xml"), self::ENV === 'dev');
		//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/../config/yml"), self::ENV === 'dev');
	}
}
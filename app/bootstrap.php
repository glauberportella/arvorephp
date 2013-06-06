<?php
/**
 * Project Bootstrap
 * Purpose: Initialize Doctrine 2 EntityManager and any intial setup for project
 * 
 * @author Glauber Portella <glauberportella@gmail.com>
 */
require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Project.php";

Project::setup();
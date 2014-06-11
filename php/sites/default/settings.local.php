<?php

/**
 * For maximum portability, use the OpenShift environment variables.
 */

// Only pull the database information from the environment if it's present.
if (isset($_ENV['OPENSHIFT_APP_NAME']) || isset($_SERVER['OPENSHIFT_APP_NAME'])) {
  // When run from Drush, only $_ENV is available.
  if (array_key_exists('OPENSHIFT_APP_NAME', $_SERVER)) {
    $src = $_SERVER;
  } else {
    $src = $_ENV;
  }

  $databases = array (
    'default' => 
    array (
      'default' => 
      array (
        'database' => $src['OPENSHIFT_APP_NAME'],
        'username' => $src['OPENSHIFT_MYSQL_DB_USERNAME'],
        'password' => $src['OPENSHIFT_MYSQL_DB_PASSWORD'],
        'host' => $src['OPENSHIFT_MYSQL_DB_HOST'],
        'port' => $src['OPENSHIFT_MYSQL_DB_PORT'],
        'driver' => 'mysql',
        'prefix' => '',
      ),
    ),
  );
}
else {
  // Put your own local database information here.
}


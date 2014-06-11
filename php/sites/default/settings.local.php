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

  // Configure the config directories in the ephemeral data directory.
  $config_directories = array(
    CONFIG_ACTIVE_DIRECTORY => $src['OPENSHIFT_DATA_DIR'] . 'active-config',
    CONFIG_STAGING_DIRECTORY => $src['OPENSHIFT_DATA_DIR'] . 'staging-config',
  );

  // Also set up a hash salt if none has been set.
  if (!isset($settings['hash_salt']) || $settings['hash_salt'] === '') {
    $settings['hash_salt'] = md5(strval($databases));
  }
}
else {
  // Put your own local database information here.
}


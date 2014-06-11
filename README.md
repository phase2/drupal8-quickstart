## Drupal 8.x on OpenShift

### Starting up an application

```
rhc app create drupal8 php-5.4 mysql-5.5 cron \
  https://cartreflect-claytondev.rhcloud.com/reflect?github=phase2/openshift-community-drush-master \
  --from-code=git://github.com/phase2/drupal8-quickstart.git
```

Once this has been done, navigate to /core/install.php and install Drupal. The
database information will be pre-filled for you based on OpenShift's
environmental variables.

Please note that you will probably be presented with a settings screen that
has a blank "Database password" field. Just hit "Save and continue" and the
Drupal 8 installer will continue.

(insert image of Drupal 8 installer once the image is uploaded)

### Troubleshooting

#### Ack! I'm getting a error about "Additional uncaught exception!"

You probably went right to the app homepage, and not to /core/install.php.

That's fine - just visit /core/install.php to run the installer. After
installing the site, you may have to visit /update.php in order to clear
the site's caches to continue using it.

##### Updating Drupal 8 via OpenShift's git repository

This repo was made with the following commands.

```
git remote add -f drupal http://git.drupal.org/project/drupal.git
git subtree add --prefix php drupal 8.x --squash
```

You can update it by pulling down the latest from drupal.org using the following commands.

```
git remote add -f drupal http://git.drupal.org/project/drupal.git
git subtree pull --prefix php drupal 8.x --squash
```

Then just push to your OpenShift app and continue working!

If you don't want to mess around with complex git commands, you can also just
expand a .zip or .tar.gz download of Drupal 8 and commit the changes and push.

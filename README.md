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

### Updating git

This repo was made with the following commands.

```
git remote add -f drupal http://git.drupal.org/project/drupal.git
git subtree add --prefix php drupal 8.x --squash
```


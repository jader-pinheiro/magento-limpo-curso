### How to install:

1 First add repo to composer.json of magento.

"repositories": [
        {
            "type": "vcs",
            "url": "http://products.git.devoffice.com/magento/Zemez_AjaxCatalog.git"
        }
    ],

2 Run command:

bin/magento cache:disable

composer require zemez/ajax-catalog:dev-default

3 Run command:

bin/magento module:enable --clear-static-content Zemez_AjaxCatalog

bin/magento setup:upgrade


### How to remove module:

1 Run command:

bin/magento module:disable --clear-static-content Zemez_AjaxCatalog

2 Run command:

composer remove zemez/ajax-catalog



### How to configure module:

1 Go to Admin Panel:

2 After modification:

Clear magento cache.

Clear browser cache.
Description
===========
Magento2 parallax implementation.

Install
=======

1. Add repo to composer.json file:
```json
{
    "repositories": [
            {
                "type": "composer",
                "url": "https://repo.magento.com/"
            },
            {
                "type": "vcs",
                "url": "http://products.git.devoffice.com/magento/magento2-parallax.git"
            }
        ]
}
```

2. Add the module to composer:
```bash
composer require zemez/magento2-parallax:dev-master
```

3. Enable the module:
```bash
bin/magento module:enable --clear-static-content Zemez_Parallax
bin/magento setup:upgrade
```

Configure
=========

Please navigate to the **Stores -> Settings -> Configuration -> Zemez -> Parallax** in order to configure the module.

Uninstall
=========

1. Disable the module:
```bash
bin/magento module:disable --clear-static-content Zemez_Parallax
```

2. Remove the module from composer:
```bash
composer remove zemez/magento2-parallax
```
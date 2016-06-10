BeelabRecaptcha2Bundle
======================

1. [Installation](#1-installation)
2. [Configuration](#2-configuration)
3. [Usage](#3-usage)

### 1. Installation

Run from terminal:

```bash
$ php composer.phar require beelab/mailchimp-bundle
```

Enable bundle in the kernel:

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Beelab\MailchimpBundle\BeelabMailchimpBundle(),
    );
}
```

### 2. Configuration

Add following lines in your configuration:

``` yaml
# app/config/config.yml

beelab_mailchimp:
    api_key: "%mailchimp_api_key%"
```

You should define ``mailchimp_api_key`` parameters in your ``app/config/parameters.yml`` file.

### 3. Usage

TODO

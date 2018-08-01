Gui
=====================

[![Build Status](https://travis-ci.org/xervice/gui).svg?branch=master)](https://travis-ci.org/xervice/gui)


Installation
-----------------
Register gui twig extension for atomic design in the TwigDependencyProvider.

```php
<?php

namespace App\Twig;

use Xervice\Gui\Business\Twig\AtomicTwigExtension;
use Xervice\Twig\TwigDependencyProvider as XerviceTwigDependencyProvider;

class TwigDependencyProvider extends XerviceTwigDependencyProvider
{
    /**
     * @return array
     */
    protected function getTwigExtensions(): array
    {
        return [
            new AtomicTwigExtension()
        ];
    }
}
```

Configuration
-----------------


Using
-----------------
After using the extension, you can define the following folder structure in your module:
* MyModule
    * Presentation
        * Theme
            * atomic
                * atoms
                * molecules
                * organisms
            * templates
            * pages

***Settings***
You can define settings in your twig template to overwrite them, by embedding components:
```
    {% setting data = {
        name: 'default'
    } %}

    {{ data.name }}
```


***Example atom***
MyModule/Presentation/Theme/atomic/atoms/example/example.twig
```
    {% setting data = {
        name: 'default'
    } %}
    {% block body %}{% endblock %}
```

***Use example atom***
```
    {% embed atom('example', 'MyModule') with {
        data: {
            name: 'Test'
        }
    } %}
        {% block body %}{{ data.name }}{% endblock %}
    {% endembed %}
```
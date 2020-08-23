# ConsoleBundle

Interact with Symfony's container through the command line. Uses [Psysh](http://psysh.org/)
for the console.

## Installation

    composer require --dev mlo/console-bundle

If you aren't using Symfony Flex, you will need to register the bundle in
`AppKernel.php` in the `dev` and/or `test` environment.

```php
if (in_array($this->getEnvironment(), array('dev', 'test'))) {
    $bundles[] = new Mlo\ConsoleBundle\MloConsoleBundle();
}
```

If you are using Symfony 4 or lower, require the [v1](https://github.com/mloberg/ConsoleBundle/tree/v1)
version of this package.

    composer require --dev mlo/console-bundle:^1.0

## Usage

    bin/console tinker

This will drop you in a Psysh shell with the variables `$container`, `$kernel`
and `$this`, which references the container.

## Adding Variables

You can add custom variables to the shell scope with the following config:

```yaml
mlo_console:
    variables:
        debug: "%kernel.debug%"
        em: "@doctrine.orm.entity_manager"
```

Now you will have a `$debug` variable with the value of the _kernel.debug_
parameter and `$em` with your entity manager.

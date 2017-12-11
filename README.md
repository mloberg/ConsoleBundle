# ConsoleBundle

Interact with Symfony's container through the command line. Uses [Psysh][psysh]
for the console.

## Installation

    composer require --dev mlo/console-bundle

If you aren't using Symfony Flex, you will need to register the bundle in
`app/AppKernel.php` in the `dev` and/or `test` environment.

```
if (in_array($this->getEnvironment(), array('dev', 'test'))) {
    $bundles[] = new Mlo\ConsoleBundle\MloConsoleBundle();
}
```

## Usage

    bin/console console
    # OR
    bin/console tinker
    
This will drop you in a Psysh shell with the variables `$container`, `$kernel`
and `$this` which is mapped to the container.

## Adding Variables

If you have a service or parameter you access a lot, you can add them as a
variable in the shell. In your `config_dev.yml` file add these lines:

```yaml
mlo_console:
    variables:
        debug: %kernel.debug%
        em: "@doctrine.orm.entity_manager"
```

Now you will have a `$debug` variable with the value of the _kernel.debug_
parameter and `$em` with your entity manager.

[psysh]: http://psysh.org/

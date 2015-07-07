# ConsoleBundle

Interact with Symfony's container through the command line. Uses
[Psysh](http://psysh.org/) for the console.

## Installation

    composer require mlo/console-bundle

## Usage

Register the bundle in `app/AppKernel.php` in the `dev` environment.

```
if (in_array($this->getEnvironment(), array('dev', 'test'))) {
    $bundles[] = new Mlo\ConsoleBundle\MloConsoleBundle();
}
```

Once it's registered `app/console console` will start a new interactive shell.
From here you can access `$container` and `$kernel`.

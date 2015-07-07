# ConsoleBundle

Interact with Symfony's container through the command line. Uses
[Psysh](http://psysh.org/) for the console.

## Installation

_Coming Soon_

## Usage

Register the bundle in `app/AppKernel.php` in the `dev` environment.

```
if (in_array($this->getEnvironment(), array('dev', 'test'))) {
    $bundles[] = new Mlo\ConsoleBundle\MloConsoleBundle();
}
```

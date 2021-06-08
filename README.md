# kw-cyfra

This package can be used to calculate a control number for polish mortgage register identificator
(https://pl.wikipedia.org/wiki/Nowa_Ksi%C4%99ga_Wieczysta)

## Instalation

Via Composer

```sh
    $ composer require kleczewsky/kw-cyfra
```

## Usage

```php

    use kleczewsky\kwCyfra\Generator;

    Generator::getControl('cikw', 124363); // returns 5

```

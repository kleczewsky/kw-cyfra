# kw-cyfra

A composer package that contains means to calculate a control number for given kw

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

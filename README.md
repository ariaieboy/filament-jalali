# Filament Jalali/Shamsi Support

![Ariaieboy Filament Jalali](https://preview.dragon-code.pro/Ariaieboy/Filament-Jalali.svg?brand=laravel)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/ariaieboy/filament-jalali.svg?style=flat-square)](https://packagist.org/packages/ariaieboy/filament-jalali)
![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/ariaieboy/filament-jalali/php-cs-fixer.yml?label=styling)
[![Total Downloads](https://img.shields.io/packagist/dt/ariaieboy/filament-jalali.svg?style=flat-square)](https://packagist.org/packages/ariaieboy/filament-jalali)

This package adds Jalali/Shamsi support to filament v3.

We have Jalali/Shamsi support for `DatePicker`,`DateTimePicker`,`TextColumn`, `TextEntry` and `DateConstraint`.


It's a replacement for [ariaieboy/filament-jalali-datetime](https://github.com/ariaieboy/jalali-filament-datetime) and [ariaieboy/filament-jalali-datetimepicker](https://github.com/ariaieboy/filament-jalali-datetimepicker).

## Installation

You can install the package via composer:

```bash
composer require ariaieboy/filament-jalali
```

## Usage

```php
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;

DatePicker::make('birth_date')->jalali();
DateTimePicker::make('birth_date')->jalali(weekdaysShort: true);
```
For more information check the default [DateTimePicker Docs](https://filamentphp.com/docs/3.x/forms/fields#date-time-picker)
```php
use Filament\Tables\Columns\TextColumn;

TextColumn::make('created_at')->jalaliDate();
TextColumn::make('created_at')->jalaliDateTime();
```
For more information check the default [TextColumn Docs](https://filamentphp.com/docs/3.x/tables/columns/text)
```php
use Filament\Infolists\Components\TextEntry;

TextEntry::make('created_at')->jalaliDate();
TextEntry::make('created_at')->jalaliDateTime();
TextEntry::make('created_at')->since()->jalaliDateTooltip();
TextEntry::make('created_at')->since()->jalaliDateTimeTooltip();
```
For more information check the default [TextEntry Docs](https://filamentphp.com/docs/3.x/infolists/entries/text)
```php

use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Ariaieboy\FilamentJalali\DateConstraint\Operators\IsJalaliAfterOperator;
use Ariaieboy\FilamentJalali\DateConstraint\Operators\IsJalaliBeforeOperator;
use Ariaieboy\FilamentJalali\DateConstraint\Operators\IsJalaliDateOperator;
use Ariaieboy\FilamentJalali\DateConstraint\Operators\IsJalaliYearOperator;

DateConstraint::make('created_at')->jalali();
//Or you can use any operations that you like
DateConstraint::make('created_at')->operators([
        IsJalaliAfterOperator::class,
        IsJalaliBeforeOperator::class,
        IsJalaliDateOperator::class,
        IsJalaliYearOperator::class
]);
```
For more information check the default [DateConstraint Docs](https://filamentphp.com/docs/3.x/tables/filters/query-builder#date-constraints)

> We don't support `IsJalaliMonthOperator` since there is not and efficient way to query georgian month according to the jalali/shamsi month.

> Fill free to open a PR that adds `IsJalaliMonthOperator` if you have an algorithm to convert jalali/shamsi month to georgian month.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Upgrading

### from `ariaieboy/filament-jalali-datetimepicker`

If you are using the V3 of the jalali-datetimepicker you don't need to do anything just replace `ariaieboy/filament-jalali-datetimepicker` with `ariaieboy/filament-jalali`

### from `ariaieboy/filament-jalali-datetime`

If you use the `jalaliDate()` and `jalaliDateTime()` on the `TextColumn` you can upgrade without any problem.

But if you use the `JalaliDateTimeColumn` you need to change it to `TextColumn` and convert `dateTime() to jalaliDateTime()` and `date() to jalaliDate()`

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [ariaieboy](https://github.com/ariaieboy)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

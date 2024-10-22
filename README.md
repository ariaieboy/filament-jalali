# Filament Jalali/Shamsi Support

![Ariaieboy Filament Jalali](https://preview.dragon-code.pro/Ariaieboy/Filament-Jalali.svg?brand=laravel)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/ariaieboy/filament-jalali.svg?style=flat-square)](https://packagist.org/packages/ariaieboy/filament-jalali)
![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/ariaieboy/filament-jalali/php-cs-fixer.yml?label=styling)
[![Total Downloads](https://img.shields.io/packagist/dt/ariaieboy/filament-jalali.svg?style=flat-square)](https://packagist.org/packages/ariaieboy/filament-jalali)

This package adds Jalali/Shamsi support to filament v3.

We have Jalali/Shamsi support for `DatePicker`,`DateTimePicker` and `TextColumn`.


It's a replacement for [ariaieboy/filament-jalali-datetime](https://github.com/ariaieboy/jalali-filament-datetime) and [ariaieboy/filament-jalali-datetimepicker](https://github.com/ariaieboy/filament-jalali-datetimepicker).

## Installation

You can install the package via composer:

```bash
composer require ariaieboy/filament-jalali
```

## Usage

```php
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;

DatePicker::make('birth_date')->jalali();
DateTimePicker::make('birth_date')->jalali(weekdaysShort: true);

TextColumn::make('created_at')->jalaliDate();
TextColumn::make('created_at')->jalaliDateTime();
```

for more information check the default DateTimePicker
Docs : https://filamentphp.com/docs/3.x/forms/fields#date-time-picker

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

<?php

namespace Ariaieboy\FilamentJalaliDatetimepicker;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentJalaliDatetimepickerServiceProvider extends PackageServiceProvider
{
    public function bootingPackage(): void
    {
        FilamentAsset::register([
            AlpineComponent::make('jalali-datetime-picker', __DIR__ . '/../resources/dist/js/jalali-date-time-picker.js'),
        ], package: "ariaieboy/jalali");
        DatePicker::macro('jalali', function (bool $weekdaysShort = false) {
            /** @var DatePicker $this */
            $this->view = "filament-jalali::components.jalali-datetimepicker";
            $this->extraAttributes(['data-weekdays-short' => ($weekdaysShort ? 'short' : 'long')], true);
            $this->firstDayOfWeek(6);
            $this->displayFormat('Y/m/d');

            return $this;
        });
        DateTimePicker::macro('jalali', function (bool $weekdaysShort = false) {
            /** @var DateTimePicker $this */

            $this->view = "filament-jalali::components.jalali-datetimepicker";
            $this->extraAttributes(['data-weekdays-short' => ($weekdaysShort ? 'short' : 'long')], true);
            $this->firstDayOfWeek(6);
            $this->displayFormat('Y/m/d H:i:s');

            return $this;
        });
        TextColumn::macro('jalaliDate', function (?string $format = null, ?string $timezone = null): static {
            $format ??= config('filament-jalali.date_format');

            $this->formatStateUsing(static function (Column $column, $state) use ($format, $timezone): ?string {
                /** @var TextColumn $column */

                if (blank($state)) {
                    return null;
                }

                return Jalali::fromCarbon(Carbon::parse($state)
                    ->setTimezone($timezone ?? $column->getTimezone()))
                    ->format($format);
            });

            return $this;
        });

        TextColumn::macro('jalaliDateTime', function (?string $format = null, ?string $timezone = null): static {
            $format ??= config('filament-jalali.date_time_format');

            $this->jalaliDate($format, $timezone);

            return $this;
        });
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-jalali')
            ->hasTranslations()
            ->hasConfigFile()
            ->hasViews();
    }
}

<?php

namespace Filament\Forms\Components {

    use Ariaieboy\FilamentJalaliDatetimepicker\FilamentJalaliServiceProvider;

    class DatePicker
    {
        /**
         * @source FilamentJalaliDatetimepickerServiceProvider.php:21
         */
        public function jalali(bool $weekdaysShort = false): self
        {
            return $this;
        }
    }

    class DateTimePicker
    {
        /**
         * @source FilamentJalaliDatetimepickerServiceProvider.php:25
         */
        public function jalali(bool $weekdaysShort = false): self
        {
            return $this;
        }
    }
}

<?php

namespace Filament\Forms\Components {
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
namespace Filament\Tables\Columns {
    class TextColumn
    {
        /**
         * @source packages/filament-jalali-datetime/src/FilamentJalaliDatetimeServiceProvider.php:28
         */
        public function jalaliDate(?string $format = null, ?string $timezone = null): self
        {
            return $this;
        }

        /**
         * @source packages/filament-jalali-datetime/src/FilamentJalaliDatetimeServiceProvider.php:46
         */
        public function jalaliDateTime(?string $format = null, ?string $timezone = null): self
        {
            return $this;
        }
    }
}
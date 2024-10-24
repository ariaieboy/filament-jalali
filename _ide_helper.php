<?php

namespace Filament\Forms\Components {
    class DatePicker
    {
        /**
         * @source FilamentJalaliServiceProvider.php:21
         */
        public function jalali(bool $weekdaysShort = false): self
        {
            return $this;
        }
    }

    class DateTimePicker
    {
        /**
         * @source FilamentJalaliServiceProvider.php:25
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
         * @source packages/filament-jalali/src/FilamentJalaliServiceProvider.php
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
namespace Filament\Infolists\Components{
    class TextEntry
    {
        /**
         * @source packages/filament-jalali-datetime/src/FilamentJalaliDatetimeServiceProvider.php:46
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
        /**
         * @source packages/filament-jalali-datetime/src/FilamentJalaliDatetimeServiceProvider.php:46
         */
        public function jalaliDateTooltip(?string $format = null, ?string $timezone = null): self
        {
            return $this;
        }
        /**
         * @source packages/filament-jalali-datetime/src/FilamentJalaliDatetimeServiceProvider.php:46
         */
        public function jalaliDateTimeTooltip(?string $format = null, ?string $timezone = null): self
        {
            return $this;
        }
    }
}
namespace Filament\Tables\Filters\QueryBuilder\Constraints{
    class DateConstraint
    {
        public function jalali(): self
        {
            return $this;
        }
    }
}
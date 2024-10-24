<?php

namespace Ariaieboy\FilamentJalali\DateConstraint\Operators;

use Ariaieboy\Jalali\Jalali;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint\Operators\IsBeforeOperator;
use Illuminate\Support\Carbon;

class IsJalaliBeforeOperator extends IsBeforeOperator
{
    public function getSummary(): string
    {
        return __(
            $this->isInverse() ?
                'filament-tables::filters/query-builder.operators.date.is_before.summary.inverse' :
                'filament-tables::filters/query-builder.operators.date.is_before.summary.direct',
            [
                'attribute' => $this->getConstraint()->getAttributeLabel(),
                'date' => Jalali::fromCarbon(Carbon::parse($this->getSettings()['date']))->toFormattedDateString(),
            ],
        );
    }

    /**
     * @return array<Component>
     */
    public function getFormSchema(): array
    {
        return [
            DatePicker::make('date')
                ->jalali()
                ->reactive()
                ->label(__('filament-tables::filters/query-builder.operators.date.form.date.label'))
                ->required(),
        ];
    }
}

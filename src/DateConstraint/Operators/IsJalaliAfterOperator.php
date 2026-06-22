<?php

namespace Ariaieboy\FilamentJalali\DateConstraint\Operators;

use Ariaieboy\Jalali\Jalali;
use Carbon\Carbon;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint\Operators\IsAfterOperator;

class IsJalaliAfterOperator extends IsAfterOperator
{
    public function getSummary(): string
    {
        return __(
            $this->isInverse() ?
                'filament-query-builder::query-builder.operators.date.is_after.summary.inverse' :
                'filament-query-builder::query-builder.operators.date.is_after.summary.direct',
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
                ->hasToday()
                ->reactive()
                ->label(__('filament-query-builder::query-builder.operators.date.form.date.label'))
                ->required(),
        ];
    }
}

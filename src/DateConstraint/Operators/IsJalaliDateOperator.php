<?php

namespace Ariaieboy\FilamentJalali\DateConstraint\Operators;

use Ariaieboy\Jalali\Jalali;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint\Operators\IsDateOperator;
use Illuminate\Support\Carbon;

class IsJalaliDateOperator extends IsDateOperator
{
    public function getSummary(): string
    {
        return __(
            $this->isInverse() ?
                'filament-tables::filters/query-builder.operators.date.is_date.summary.inverse' :
                'filament-tables::filters/query-builder.operators.date.is_date.summary.direct',
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

    public function apply(\Illuminate\Database\Eloquent\Builder $query, string $qualifiedColumn): \Illuminate\Database\Eloquent\Builder
    {
        $date = $this->getSettings()['date'];

        return $query->whereDate($qualifiedColumn, $this->isInverse() ? '!=' : '=', Carbon::parse($date)->format('Y-m-d'));
    }
}

<?php

namespace Ariaieboy\FilamentJalali\DateConstraint\Operators;

use Ariaieboy\Jalali\Jalali;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint\Operators\IsYearOperator;

class IsJalaliYearOperator extends IsYearOperator
{
    public function apply(\Illuminate\Database\Eloquent\Builder $query, string $qualifiedColumn): \Illuminate\Database\Eloquent\Builder
    {
        $year = $this->getSettings()['year'];
        $start = new Jalali($year,1,1);
        $days_of_last_month = $start->getDaysOf(12);
        $end = new Jalali($year,12,$days_of_last_month);
        if (!$this->isInverse())
            return $query->whereBetween($qualifiedColumn, [$start->toCarbon(),$end->toCarbon()]);
        return $query->whereNotBetween($qualifiedColumn, [$start->toCarbon(),$end->toCarbon()]);
    }
}
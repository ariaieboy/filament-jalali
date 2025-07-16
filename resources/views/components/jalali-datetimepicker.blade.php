@php
    $fieldWrapperView = $getFieldWrapperView();
    $datalistOptions = $getDatalistOptions();
    $disabledDates = $getDisabledDates();
    $extraAlpineAttributes = $getExtraAlpineAttributes();
    $extraAttributeBag = $getExtraAttributeBag();
    $extraInputAttributeBag = $getExtraInputAttributeBag();
    $hasTime = $hasTime();
    $id = $getId();
    $isDisabled = $isDisabled();
    $isAutofocused = $isAutofocused();
    $isPrefixInline = $isPrefixInline();
    $isSuffixInline = $isSuffixInline();
    $maxDate = $getMaxDate();
    $minDate = $getMinDate();
    $prefixActions = $getPrefixActions();
    $prefixIcon = $getPrefixIcon();
    $prefixIconColor = $getPrefixIconColor();
    $prefixLabel = $getPrefixLabel();
    $suffixActions = $getSuffixActions();
    $suffixIcon = $getSuffixIcon();
    $suffixIconColor = $getSuffixIconColor();
    $suffixLabel = $getSuffixLabel();
    $statePath = $getStatePath();
    $placeholder = $getPlaceholder();
    $isReadOnly = $isReadOnly();
    $isRequired = $isRequired();
    $isConcealed = $isConcealed();
    $step = $getStep();
    $type = $getType();
    $livewireKey = $getLivewireKey();
    $months = trans('filament-jalali-datetimepicker::months');
    $dayLabels = trans('filament-jalali-datetimepicker::days.long');
    $dayShortLabels = trans('filament-jalali-datetimepicker::days.short');
@endphp

<x-dynamic-component
        :component="$fieldWrapperView"
        :field="$field"
        :inline-label-vertical-alignment="\Filament\Support\Enums\VerticalAlignment::Center"
>
    <x-filament::input.wrapper
            :disabled="$isDisabled"
            :inline-prefix="$isPrefixInline"
            :inline-suffix="$isSuffixInline"
            :prefix="$prefixLabel"
            :prefix-actions="$prefixActions"
            :prefix-icon="$prefixIcon"
            :prefix-icon-color="$prefixIconColor"
            :suffix="$suffixLabel"
            :suffix-actions="$suffixActions"
            :suffix-icon="$suffixIcon"
            :suffix-icon-color="$suffixIconColor"
            :valid="! $errors->has($statePath)"
            :attributes="\Filament\Support\prepare_inherited_attributes($extraAttributeBag)->class(['fi-fo-date-time-picker'])"
    >

        <div
                x-load
                x-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('jalali-datetime-picker',package: "ariaieboy/jalali") }}"
                x-data="jalaliDateTimePickerFormComponent({
                            displayFormat:
                                '{{ convert_date_format($getDisplayFormat())->to('day.js') }}',
                            firstDayOfWeek: {{ $getFirstDayOfWeek() }},
                            isAutofocused: @js($isAutofocused),
                            locale: @js($getLocale()),
                            shouldCloseOnDateSelection: @js($shouldCloseOnDateSelection()),
                            state: $wire.{{ $applyStateBindingModifiers("\$entangle('{$statePath}')") }},
                            months:@js($months),
                            dayLabel:@js($dayLabels),
                            dayShortLabel:@js($dayShortLabels)
                        })"
                wire:ignore
                wire:key="{{ $livewireKey }}.{{
                    substr(md5(serialize([
                        $disabledDates,
                        $isDisabled,
                        $isReadOnly,
                        $maxDate,
                        $minDate,
                    ])), 0, 64)
                }}"
                x-on:keydown.esc="isOpen() && $event.stopPropagation()"
                {{ $getExtraAlpineAttributeBag() }}
        >
            <input x-ref="maxDate" type="hidden" value="{{ $maxDate }}"/>

            <input x-ref="minDate" type="hidden" value="{{ $minDate }}"/>

            <input
                    x-ref="disabledDates"
                    type="hidden"
                    value="{{ json_encode($disabledDates) }}"
            />

            <button
                    x-ref="button"
                    x-on:click="togglePanelVisibility()"
                    x-on:keydown.enter.prevent.stop="
                        if (! $el.disabled) {
                            isOpen() ? selectDate() : togglePanelVisibility()
                        }
                    "
                    x-on:keydown.arrow-left.prevent.stop="if (! $el.disabled) focusPreviousDay()"
                    x-on:keydown.arrow-right.prevent.stop="if (! $el.disabled) focusNextDay()"
                    x-on:keydown.arrow-up.prevent.stop="if (! $el.disabled) focusPreviousWeek()"
                    x-on:keydown.arrow-down.prevent.stop="if (! $el.disabled) focusNextWeek()"
                    x-on:keydown.backspace.prevent.stop="if (! $el.disabled) clearState()"
                    x-on:keydown.clear.prevent.stop="if (! $el.disabled) clearState()"
                    x-on:keydown.delete.prevent.stop="if (! $el.disabled) clearState()"
                    aria-label="{{ $placeholder }}"
                    type="button"
                    tabindex="-1"
                    @disabled($isDisabled || $isReadOnly)
                    {{
                        $getExtraTriggerAttributeBag()->class([
                            'fi-fo-date-time-picker-trigger',
                        ])
                    }}
            >
                <input
                        @disabled($isDisabled)
                        readonly
                        placeholder="{{ $placeholder }}"
                        wire:key="{{ $livewireKey }}.display-text"
                        x-model="displayText"
                        dir="ltr"
                        @if ($id = $getId()) id="{{ $id }}" @endif
                        @class([
                            'fi-fo-date-time-picker-display-text-input',
                        ])
                />
            </button>

            <div
                    x-ref="panel"
                    x-cloak
                    x-float.placement.bottom-start.offset.flip.shift="{ offset: 8 }"
                    wire:ignore
                    wire:key="{{ $livewireKey }}.panel"
                    @class([
                        'fi-fo-date-time-picker-panel',
                    ])
            >
                @if ($hasDate())
                    <div class="fi-fo-date-time-picker-panel-header">
                        <select
                                x-model="focusedMonth"
                                class="fi-fo-date-time-picker-month-select"
                        >
                            <template x-for="(month, index) in months">
                                <option
                                        x-bind:value="index"
                                        x-text="month"
                                ></option>
                            </template>
                        </select>

                        <input
                                type="number"
                                inputmode="numeric"
                                x-model.debounce="focusedYear"
                                class="fi-fo-date-time-picker-year-input"
                        />
                    </div>

                    <div class="fi-fo-date-time-picker-calendar-header">
                        <template
                                x-for="(day, index) in dayLabels"
                                x-bind:key="index"
                        >
                            <div
                                    x-text="day"
                                    class="fi-fo-date-time-picker-calendar-header-day"
                            ></div>
                        </template>
                    </div>

                    <div
                            role="grid"
                            class="fi-fo-date-time-picker-calendar"
                    >
                        <template
                                x-for="day in emptyDaysInFocusedMonth"
                                x-bind:key="day"
                        >
                            <div></div>
                        </template>

                        <template
                                x-for="day in daysInFocusedMonth"
                                x-bind:key="day"
                        >
                            <div
                                    x-text="day"
                                    x-on:click="dayIsDisabled(day) || selectDate(day)"
                                    x-on:mouseenter="setFocusedDay(day)"
                                    role="option"
                                    x-bind:aria-selected="focusedDate.date() === day"
                                    x-bind:class="{
                                        'fi-fo-date-time-picker-calendar-day-today': dayIsToday(day),
                                        'fi-focused': focusedDate.date() === day,
                                        'fi-selected': dayIsSelected(day),
                                        'fi-disabled': dayIsDisabled(day),
                                    }"
                                    class="fi-fo-date-time-picker-calendar-day"
                            ></div>
                        </template>
                    </div>
                @endif

                @if ($hasTime)
                    <div class="fi-fo-date-time-picker-time-inputs">
                        <input
                                max="23"
                                min="0"
                                step="{{ $getHoursStep() }}"
                                type="number"
                                inputmode="numeric"
                                x-model.debounce="hour"
                        />

                        <span
                                class="fi-fo-date-time-picker-time-input-separator"
                        >
                                :
                            </span>

                        <input
                                max="59"
                                min="0"
                                step="{{ $getMinutesStep() }}"
                                type="number"
                                inputmode="numeric"
                                x-model.debounce="minute"
                        />

                        @if ($hasSeconds())
                            <span
                                    class="fi-fo-date-time-picker-time-input-separator"
                            >
                                    :
                                </span>

                            <input
                                    max="59"
                                    min="0"
                                    step="{{ $getSecondsStep() }}"
                                    type="number"
                                    inputmode="numeric"
                                    x-model.debounce="second"
                            />
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </x-filament::input.wrapper>

    @if ($datalistOptions)
        <datalist id="{{ $id }}-list">
            @foreach ($datalistOptions as $option)
                <option value="{{ $option }}"/>
            @endforeach
        </datalist>
    @endif
</x-dynamic-component>

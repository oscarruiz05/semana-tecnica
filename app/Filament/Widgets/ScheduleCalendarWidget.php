<?php

namespace App\Filament\Widgets;

use App\Models\ScheduleItem;
use Guava\Calendar\Enums\CalendarViewType;
use Guava\Calendar\Filament\CalendarWidget;
use Guava\Calendar\ValueObjects\CalendarEvent;
use Illuminate\Support\Collection;

class ScheduleCalendarWidget extends CalendarWidget
{
    protected CalendarViewType $calendarView = CalendarViewType::TimeGridWeek;

    public function getHeading(): string|\Illuminate\Support\HtmlString|null
    {
        return null;
    }

    protected bool $eventClickEnabled = true;

    protected function getEvents(\Guava\Calendar\ValueObjects\FetchInfo $info): Collection|array
    {
        $typeColors = [
            'apertura' => '#22c55e',
            'charla'   => '#3b82f6',
            'taller'   => '#06b6d4',
            'receso'   => '#9ca3af',
            'almuerzo' => '#f59e0b',
            'clausura' => '#16a34a',
            'otro'     => '#6b7280',
        ];

        return ScheduleItem::with('speaker')
            ->orderBy('day')
            ->orderBy('time_start')
            ->get()
            ->map(function (ScheduleItem $item) use ($typeColors) {
                $start = $item->day->format('Y-m-d') . 'T' . $item->time_start;
                $end   = $item->time_end
                    ? $item->day->format('Y-m-d') . 'T' . $item->time_end
                    : $item->day->format('Y-m-d') . 'T' . $item->time_start;

                $title = $item->title;
                if ($item->speaker) {
                    $title .= "\n" . $item->speaker->name;
                }

                return CalendarEvent::make($item)
                    ->title($title)
                    ->start($start)
                    ->end($end)
                    ->backgroundColor($typeColors[$item->type] ?? '#6b7280');
            });
    }

    public function getOptions(): array
    {
        return [
            'locale'         => 'es',
            'slotMinTime'    => '07:00:00',
            'slotMaxTime'    => '20:00:00',
            'allDaySlot'     => false,
            'nowIndicator'   => true,
            'eventTimeFormat' => [
                'hour'   => '2-digit',
                'minute' => '2-digit',
                'hour12' => false,
            ],
            'slotLabelFormat' => [
                'hour'   => '2-digit',
                'minute' => '2-digit',
                'hour12' => false,
            ],
            'headerToolbar' => [
                'left'   => 'prev,next today',
                'center' => 'title',
                'right'  => 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
            ],
            'buttonText' => [
                'today'   => 'Hoy',
                'month'   => 'Mes',
                'week'    => 'Semana',
                'day'     => 'Día',
                'list'    => 'Lista',
            ],
        ];
    }
}

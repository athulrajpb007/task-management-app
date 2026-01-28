<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TasksExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Task::with('project')->latest()->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Project',
            'Title',
            'Description',
            'Assigned To',
            'Status',
            'Due Date',
            'Created At',
        ];
    }

    public function map($task): array
    {
        return [
            $task->id,
            $task->project?->name,
            $task->title,
            $task->description,
            $task->assigned_to,
            $task->status,
            $task->due_date,
            $task->created_at,
        ];
    }
}

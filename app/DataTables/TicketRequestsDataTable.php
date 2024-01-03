<?php

namespace App\DataTables;

use App\Models\Sport;
use App\Models\Ticket;
use App\Models\TicketRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TicketRequestsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

        ->addColumn('action', function (Ticket $model) {
            return view('admin.tickets.action',['model'=>$model,'route_name'=>'ticket-requests']);
        })
        ->editColumn('updated_at', function($data){
            return Carbon::parse($data->updated_at)->toDateTimeString();
        })
        ->editColumn('user_id', function(Ticket $model){
            return $model->user->name;
        })
        ->editColumn('event_id', function(Ticket $model){
            return $model->event->name;
        })

        ->editColumn('updated_at', function($data){
            return Carbon::parse($data->updated_at)->toDateTimeString();
        })
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Ticket $model): QueryBuilder
    {
        return $model->with(['event', 'transportation', 'entertainment', 'hotel', 'airlinecountry'])

            ->has('editTicket')->orderByDesc('updated_at')->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('table')
            ->columns($this->getColumns())
            ->minifiedAjax()
//                    ->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('user_id')->title('user name'),
            Column::make('event_id')->title('event name'),

//            Column::make('name'),
//            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
//                ->width(60)
//                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'TicketRequests_' . date('YmdHis');
    }
}

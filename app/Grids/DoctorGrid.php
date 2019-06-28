<?php

namespace App\Grids;

use Closure;
use Leantony\Grid\Grid;
use App\Specialization;

class DoctorGrid extends Grid implements DoctorGridInterface
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Doctor';

    /**
     * List of buttons to be generated on the grid
     *
     * @var array
     */
    protected $buttonsToGenerate = [
        'view', 'refresh', 'export'
    ];

    /**
     * Specify if the rows on the table should be clicked to navigate to the record
     *
     * @var bool
     */
    protected $linkableRows = false;

    /**
    * Set the columns to be displayed. Check `docs/customize_columns.md` for more information
    *
    * @return void
    * @throws \Exception if an error occurs during parsing of the data
    */
    public function setColumns()
    {
        $this->columns = [
		    "id" => [
		        "label" => "ID",
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ],
		        "styles" => [
		            "column" => "col-md-2"
		        ]
            ],
            "spec_id" => [
                "label" => "Specialization",
                'export' => true,
                "search" => ["enabled" => false],
                'presenter' => function ($columnData, $columnName) {
                    return $columnData->specialization->name;
                },
                "filter" => ["enabled" => true, 
                            'type' => 'select',
                            'data' => Specialization::query()->pluck('name', 'id')]
            ],
            "name" => [
                "search" => ["enabled" => true],
                "filter" => ["enabled" => true, "operator" => "="]
            ],
            "email" => [
                "search" => ["enabled" => true],
                "filter" => ["enabled" => true, "operator" => "="],
                "styles" => ["column" => "success"]
            ],
            "phone" => [
                "search" => ["enabled" => true],
                "filter" => ["enabled" => true, "operator" => "="],
                "styles" => ["column" => "success"]
            ],
            "address" => [
                "search" => ["enabled" => true],
                "filter" => ["enabled" => true, "operator" => "="],
                "styles" => ["column" => "success"]
            ],
		    "created_at" => [
		        "sort" => false,
		        "date" => "true",
		        "filter" => [
		            "enabled" => true,
		            "type" => "date",
		            "operator" => "<="
		        ]
		    ]
		];
    }

    /**
     * Set the links/routes. This are referenced using named routes, for the sake of simplicity
     *
     * @return void
     */
    public function setRoutes()
    {
        // searching, sorting and filtering
        $this->sortRouteName = 'home';
        $this->searchRoute = 'home';

        // crud support
        $this->indexRouteName = 'home';
        // $this->createRouteName = 'doctors.create';
        // $this->viewRouteName = 'doctors.show';
        // $this->deleteRouteName = 'doctors.destroy';
        // crud support
    }

    /**
    * Return a closure that is executed per row, to render a link that will be clicked on to execute an action
    *
    * @return Closure
    */
    public function getLinkableCallback(): Closure
    {
        $view = $this->viewRouteName;

        return function ($gridName, $item) use ($view) {
            return route($view, [$gridName => $item->id]);
        };
    }

    /**
    * Configure rendered buttons, or add your own
    *
    * @return void
    */
    public function configureButtons()
    {
        //
    }

    /**
    * Returns a closure that will be executed to apply a class for each row on the grid
    * The closure takes two arguments - `name` of grid, and `item` being iterated upon
    *
    * @return Closure
    */
    public function getRowCssStyle(): Closure
    {
        return function ($gridName, $item) {
            return $item->id % 3 === 0 ? 'table-success' : '';
        };
    }
}
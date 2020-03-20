<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EpochRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EpochCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EpochCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Epoch');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/epoch');
        $this->crud->setEntityNameStrings('época', 'Épocas');


    }

    protected function setupListOperation()
    {

        $this->crud->setTitle('Épocas','list');
        $this->crud->addColumn([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Nome',
        ]);

        $this->crud->addColumn([
            'name' => 'description',
            'type' => 'text',
            'label' => 'Descrição',
        ]);

        $this->crud->addColumn([
            'name' => 'start_at',
            'type' => 'date',
            'label' => 'Data de Início',
        ]);


        $this->crud->addColumn([
            'name' => 'end_at',
            'type' => 'date',
            'label' => 'Data Final',
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(EpochRequest::class);

        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Nome',
        ]);

        $this->crud->addField([
            'name' => ['start_at', 'end_at'],
            'type' => 'date_range',
            'label' => 'Duração',
            'default' => ['2020-03-28', '2020-04-05']
        ]);

        $this->crud->addField([
            'name' => 'description',
            'type' => 'textarea',
            'label' => 'Descrição',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}

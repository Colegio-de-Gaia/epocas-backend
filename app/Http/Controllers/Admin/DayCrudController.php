<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DayRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DayCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DayCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Day');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/day');
        $this->crud->setEntityNameStrings('dia', 'dias');
    }

    protected function setupListOperation()
    {

        $this->crud->setTitle('Dias','list');
        $this->crud->addColumn([
            // 1-n relationship
            'label' => "Época", // Table column heading
            'type' => "select",
            'name' => 'epoch_id', // the column that contains the ID of that connected entity;
            'entity' => 'epoch', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => "App\Models\Epoch", // foreign key model
        ]);

        $this->crud->addColumn([
            'name' => "date", // The db column name
            'label' => "Data", // Table column heading
            'type' => "date",
        ]);

        $this->crud->addColumn([
            'name' => "sentence", // The db column name
            'label' => "Reflexão", // Table column heading
            'type' => "text",
        ]);


        $this->crud->addColumn([
            'name' => "sentence_author", // The db column name
            'label' => "Autor da Reflexão", // Table column heading
            'type' => "text",
        ]);

        $this->crud->addColumn([
            'name' => "pray", // The db column name
            'label' => "Oração", // Table column heading
            'type' => "text",
        ]);


        $this->crud->addColumn([
            'name' => "photo_path", // The db column name
            'label' => "Imagem", // Table column heading
            'type' => "image",
        ]);

        $this->crud->addColumn([
            'name' => "photo_author", // The db column name
            'label' => "Autor da imagem", // Table column heading
            'type' => "text",
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(DayRequest::class);

        $this->crud->addField([  // Select
            'label' => "Época",
            'type' => 'select',
            'name' => 'epoch_id', // the db column for the foreign key
            'entity' => 'epoch', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user

            // optional
            'model' => "App\Models\Epoch",
            'options'   => (function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ]);
        $this->crud->addField(
            [   // date_picker
                'name' => 'date',
                'type' => 'date_picker',
                'label' => 'Data',
                // optional:
                'date_picker_options' => [
                    'todayBtn' => 'linked',
                    'format' => 'dd-mm-yyyy',
            ],
        ]);

        $this->crud->addField(
            [
                'name' => 'sentence',
                'type' => 'textarea',
                'label' => 'Reflexão',
            ]);


        $this->crud->addField(
            [
                'name' => 'sentence_author',
                'type' => 'text',
                'label' => 'Autor da Reflexão',
            ]);


        $this->crud->addField(
            [
                'name' => 'pray',
                'type' => 'textarea',
                'label' => 'Oração',
            ]);


        $this->crud->addField([
            'label' => "Desenho",
            'name' => "photo_path",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 0, // ommit or set to 0 to allow any aspect ratio
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);


        $this->crud->addField(
        [
            'name' => 'photo_author',
            'type' => 'text',
            'label' => 'Autor do desenho (Nome, Ano, Turma)',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}

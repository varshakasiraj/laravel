<?php

namespace App\Http\Controllers\Admin;
use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;
use App\Models\customerAddress;
use  Illuminate\Database\Eloquent;
//use App\Http\Controllers\Admin\
/**
 * Class CustomerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CustomerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Customer::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/customer');
        CRUD::setEntityNameStrings('customer', 'customers');
        CRUD::operation('list', function() {
           
        });
        CRUD::operation(['create', 'update'], function() {
        });
          $this->crud->addField([
            'label' => "address",
            // 'model' =>customerAddress::class,
            'name' => 'customer_id',
            // 'entity' => 'structure',
            // //'attribute' => 'customer_id', 
        ]);
       
    }
    
    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.
        $customer_count = Customer::count();
         Widget::add()->to('before_content')->type('div')->class('row')->content([
            Widget::make(
                [
                    'type'       => 'card',
                    'class'   => 'customer_card',
                    'wrapper' => ['class' => 'customer_card_container'],
                    'content'    => [
                        'header' => 'Number of customer : ' .$customer_count,
                    ]
                ]
            ),
         ]
        );
        Widget::add()->type('style')->stack('after_styles')->content('http://127.0.0.1:8000/css/customer.css');

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CustomerRequest::class);
        CRUD::setFromDb(); // set fields from db columns.
        
        $rules = ['name' => 'required|min:3',
        'email'=>'required|email|unique:users,email',
        'age'=>'required'];
        $messages = [
            'name.required' => 'You gotta give it a name, man.',
            'name.min' => 'You came up short. Try more than 3 characters.',
        ];
        $this->crud->setValidation($rules, $messages);
      
        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }
   
    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    // public function index()
    // {
    //     $this->crud->hasAccessOrFail('list');
    
    //     $this->data['address'] = customerAddress::select('address')->get();
    //    // $this->data['title'] = ucfirst($this->crud->entity_name_plural);
    
    //     // get all entries if AJAX is not enabled
    //     // if (! $this->data['address']->ajaxTable()) {
    //     //   $this->data['entries'] = $this->data['address'];
    //     // }
    // //   var_dump($this->crud->getListView());
    // //   die();
    //     // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
    //     // $this->crud->getListView() returns 'list' by default, or 'list_ajax' if ajax was enabled
    //     return view('vendor.backpack.crud.list',  $this->data);
    // }
}

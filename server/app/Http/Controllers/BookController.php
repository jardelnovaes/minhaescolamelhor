<?php 

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use App\Book;
use Input;
use Response;

class BookController extends Controller
{
	public $entityName = "book";
	
	/**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['except' => ['getEdit', 'getNewItem', 'getDelete']]);
		$this->middleware('auth');
    }
	
	public function index()
    {
		return Response::json(array('error' => false, $this->entityName.'s' => Book::all()->toArray()), 200);		
    }
	
	public function show($id)
    {
		return Response::json(array('error' => false, $this->entityName => Book::find($id)), 200);		
    }
	
	public function getComplete($id)
    {
		return Response::json(array('error' => false, $this->entityName => Book::with('lessons')->find($id)), 200);		
    }
	
    public function getIndex()
    {
		return view($this->entityName.".index", ['model' => Book::all()]);
    }
	
	public function getNewItem()
    {
		return view($this->entityName.".edit", ['model' => new Book()]);
    }
	
	public function getEdit($id)
    {
        return view($this->entityName.".edit", ['model' => Book::findOrfail($id)]);
    }
	
	public function postEdit()
    {
		if(Input::get('id') > 0){
			$item = Book::findOrfail(Input::get('id'));		
		}
		else{
			$item = new Book();
		}
		
		$item->name = Input::get('name');		
		$item->save();
		return view($this->entityName.".edit", ['model' => $item, 'message' => 'The $this->entityName was saved!']);
    }
	
	public function getDelete($id)
    {
        return view($this->entityName.".edit", ['model' => Book::findOrfail($id), 'IsDelete' => true, 'message' => 'Do you want to delete this record?']);
    }
	
	public function postDelete()
    {
		Book::destroy(Input::get('id'));
		return view($this->entityName.".deleteConfirmed", ['id' => Input::get('id'), 'name' => Input::get('name')]);
	}
}
/*
foreach(Input::all() as $key => $value) {
	if ( $value != "" ) {
		$book->name .= "$key - $value :: ";
	}
}*/
?>
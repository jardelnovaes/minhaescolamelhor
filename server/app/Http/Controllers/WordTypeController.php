<?php 

namespace App\Http\Controllers;

use App\WordType;
use Input;
use Response;

class WordTypeController extends Controller
{
	private $entityName = "wordtype";
	
	public function __construct()
    {
     	$this->middleware('auth');
    }
	
	public function index()
    {
		return Response::json(array('error' => false, $this->entityName.'s' => WordType::all()->toArray()), 200);		
    }
	
	public function show($id)
    {
		return Response::json(array('error' => false, $this->entityName => WordType::find($id)), 200);		
    }
	
    public function getIndex()
    {
		return view($this->entityName.".index", ['model' => WordType::all()]);
    }
	
	public function getNewItem()
    {
		return view($this->entityName.".edit", ['model' => new WordType()]);
    }
	
	public function getEdit($id)
    {
        return view($this->entityName.".edit", ['model' => WordType::findOrfail($id)]);
    }
	
	public function postEdit()
    {
		if(Input::get('id') > 0){
			$item = WordType::findOrfail(Input::get('id'));		
		}
		else{
			$item = new WordType();
		}
		
		$item->name = Input::get('name');		
		$item->save();
		return view($this->entityName.".edit", ['model' => $item, 'message' => 'The word type was saved!']);
    }
	
	public function getDelete($id)
    {
        return view($this->entityName.".edit", ['model' => WordType::findOrfail($id), 'IsDelete' => true, 'message' => 'Do you want to delete this record?']);
    }
	
	public function postDelete()
    {
		WordType::destroy(Input::get('id'));
		return view($this->entityName.".deleteConfirmed", ['id' => Input::get('id'), 'name' => Input::get('name')]);
	}
}

?>
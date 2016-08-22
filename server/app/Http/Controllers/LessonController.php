<?php 

namespace App\Http\Controllers;

use App\Lesson;
use App\Book;
use Input;
use Response;

class LessonController extends Controller
{
	private $entityName = "lesson";
	
	public function __construct()
    {
     	$this->middleware('auth');
    }
	
	public function index()
    {
		return Response::json(array('error' => false, $this->entityName.'s' => Lesson::all()->toArray()), 200);		
    }
	
	public function show($id)
    {
		return Response::json(array('error' => false, $this->entityName => Lesson::find($id)), 200);		
    }
	
    public function getIndex()
    {	
		return view($this->entityName.".index", ['model' => Lesson::all()]);
    }
	
	public function getNewItem()
    {
		return view($this->entityName.".edit", ['model' => new Lesson(), 'books' => Book::all('name', 'id')]);
    }
	
	public function getEdit($id)
    {
        return view($this->entityName.".edit", ['model' => Lesson::findOrfail($id), 'books' => Book::all('name', 'id')]);
    }
	
	public function postEdit()
    {
		if(Input::get('id') > 0){
			$item = Lesson::findOrfail(Input::get('id'));		
		}
		else{
			$item = new Lesson();
		}
		
		$item->name = Input::get('name');
		$item->book_id = Input::get('book_id');
		$item->save();
		return view($this->entityName.".edit", ['model' => $item, 'message' => 'The '.$this->entityName.' was saved!', 'books' => Book::all('name', 'id')]);
    }
	
	public function getDelete($id)
    {
        return view($this->entityName.".edit", ['model' => Lesson::findOrfail($id), 'IsDelete' => true, 'message' => 'Do you want to delete this record?']);
    }
	
	public function postDelete()
    {
		Lesson::destroy(Input::get('id'));
		return view($this->entityName.".deleteConfirmed", ['id' => Input::get('id'), 'name' => Input::get('name')]);
	}
}

?>

<?php 

namespace App\Http\Controllers;

use App\Word;
use App\Lesson;
use App\WordType;
use App\Book;
use Input;
use Response;

class WordController extends Controller
{
	private $entityName = "word";
	
	public function index()
    {
		return Response::json(array('error' => false, $this->entityName.'s' => Word::all()->toArray()), 200);		
    }
	
	public function show($id)
    {
		return Response::json(array('error' => false, $this->entityName => Word::find($id)), 200);		
    }
	
    public function getIndex()
    {	
		return view($this->entityName.".index", ['model' => Word::all()]);
    }
	
	public function getNewItem()
    {
		return view($this->entityName.".edit", [
						'model' => new Word(), 
						'books' => Book::all('name', 'id'), 
						'lessons' => Lesson::all('name', 'id'), 
						'wordtypes' => WordType::all('name', 'id')
					]);
    }
	
	public function getEdit($id)
    {
        return view($this->entityName.".edit", [
						'model' => Word::findOrfail($id), 
						'books' => Book::all('name', 'id'), 
						'lessons' => Lesson::all('name', 'id'), 
						'wordtypes' => WordType::all('name', 'id')
					]);
    }
	
	public function postEdit()
    {
		if(Input::get('id') > 0){
			$item = Word::findOrfail(Input::get('id'));		
		}
		else{
			$item = new Word();
		}
		
		$item->english = Input::get('english');
		$item->portuguese = Input::get('portuguese');
		$item->lesson_id = Input::get('lesson_id'); //Input::old('lesson_id') => the old value
		$item->wordtype_id = Input::get('wordtype_id');
		$item->save();
		return view($this->entityName.".edit", [
						'model' => $item, 
						'message' => 'The '.$this->entityName.' was saved!', 
						'books' => Book::all('name', 'id'), 
						'lessons' => Lesson::all('name', 'id'), 
						'wordtypes' => WordType::all('name', 'id')						
					]);
    }
	
	public function getDelete($id)
    {
        return view($this->entityName.".edit", ['model' => Word::findOrfail($id), 'IsDelete' => true, 'message' => 'Do you want to delete this record?']);
    }
	
	public function postDelete()
    {
		Word::destroy(Input::get('id'));
		return view($this->entityName.".deleteConfirmed", ['id' => Input::get('id'), 'name' => Input::get('name')]);
	}
}

?>

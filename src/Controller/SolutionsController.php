<?php // src/Controller/SolutionsController.php

namespace App\Controller;

class SolutionsController extends AppController
{
    public function index()
    {
        $solutions = $this->Solutions->find('all');
        $this->set(compact('solutions'));
    }
    
	public function view($id = null)
	{
		$solution = $this->Solutions->get($id);
		$this->set(compact('solution'));
	}

	public function add()
	{
		$solution = $this->Solutions->newEntity();
        if ($this->request->is('post')) {
            $solution = $this->Solutions->patchEntity($solution, $this->request->getData());
            if ($this->Solutions->save($solution)) {
                $this->Flash->success(__('Your solution has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add your solution.'));
        }
        $this->set('solution', $solution);
	}
}
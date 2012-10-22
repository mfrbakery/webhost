<?php
App::uses('AppController', 'Controller');
/**
 * RequestRecords Controller
 *
 * @property RequestRecord $RequestRecord
 */
class RequestRecordsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->RequestRecord->recursive = 0;
		$this->set('requestrecords', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->RequestRecord->id = $id;
		if (!$this->RequestRecord->exists()) {
			throw new NotFoundException(__('Invalid request record'));
		}
		$this->set('requestrecord', $this->RequestRecord->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RequestRecord->create();
			if ($this->RequestRecord->save($this->request->data)) {
				$this->Session->setFlash(__('The request record has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The request record could not be saved. Please, try again.'));
			}
		}
		$users = $this->RequestRecord->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->RequestRecord->id = $id;
		if (!$this->RequestRecord->exists()) {
			throw new NotFoundException(__('Invalid request record'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RequestRecord->save($this->request->data)) {
				$this->Session->setFlash(__('The request record has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The request record could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->RequestRecord->read(null, $id);
		}
		$users = $this->RequestRecord->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->RequestRecord->id = $id;
		if (!$this->RequestRecord->exists()) {
			throw new NotFoundException(__('Invalid request record'));
		}
		if ($this->RequestRecord->delete()) {
			$this->Session->setFlash(__('Request record deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Request record was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

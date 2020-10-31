<?php

class tareasController {

    public $filetxt;

    /**
     * Constructor
     */
    function __construct($filetxt) {
        $this->filetxt = $filetxt;
    }
	
	/**
	 * Método para ordenar y crear un identificador para
	 * las tareas que no tienen, en este caso se identifican
	 * con la key id, y tendrán un campo nombre_tarea donde se almacenará el nombre
	 */
    public function orderTask() {
		foreach($this->filetxt as $index => &$task) {
			if(!isset($task['id'])){
				$task = array('id' => ($index+1), 'nombre_tarea' => $task);
			}
		}
		$serializedFiletxt = serialize($this->filetxt);
		file_put_contents('db.txt', $serializedFiletxt);
		return $this->filetxt;
    }
	
	/**
	 * Método para eliminar tarea y bajar el orden de los posteriores a su identificador
	 */
    public function deleteTask($taskId) {
		$taskIndex = $this->getTaskIndexById($taskId);
		unset($this->filetxt[$taskIndex]);
		$this->filetxt = array_values($this->filetxt);
		foreach($this->filetxt as $index => $task) {
			if($task['id'] >= $taskId) {
				$this->filetxt[$index]['id'] = $task['id']-1;
			}
		}
		$serializedFiletxt = serialize($this->filetxt);
		file_put_contents('db.txt', $serializedFiletxt);
		return $this->filetxt;
    }
	
	/**
	 * Método para crear tarea cuyo id es el último identificador
	 */
	public function createTask($taskName) {
		$this->filetxt[] = array('id' => (count($this->filetxt)+1), 'nombre_tarea' => $taskName);
		$serializedFiletxt = serialize($this->filetxt);
		file_put_contents('db.txt', $serializedFiletxt);
		return $this->filetxt;
	}
	
	/**
	 * Método para subir el orden de la tarea con su identificador
	 */
	public function goUpTask($taskId) {
		$taskIndex = $this->getTaskIndexById($taskId);
		$taskNewId = $this->filetxt[$taskIndex]['id']-1;
		if($taskNewId != 0) {
			$taskAuxIndex = $this->getTaskIndexById($taskNewId);
			$this->filetxt[$taskIndex]['id'] = $taskNewId;
			$this->filetxt[$taskAuxIndex]['id'] = $taskId;
			
			$serializedFiletxt = serialize($this->filetxt);
			file_put_contents('db.txt', $serializedFiletxt);
		}
		return $this->filetxt;
	}
	
	/**
	 * Método para bajar el orden de la tarea con su identificador
	 */
	public function goDownTask($taskId) {
		$taskIndex = $this->getTaskIndexById($taskId);
		$taskNewId = $this->filetxt[$taskIndex]['id']+1;
		if($taskNewId <= count($this->filetxt)) {
			$taskAuxIndex = $this->getTaskIndexById($taskNewId);
			$this->filetxt[$taskIndex]['id'] = $taskNewId;
			$this->filetxt[$taskAuxIndex]['id'] = $taskId;
			
			$serializedFiletxt = serialize($this->filetxt);
			file_put_contents('db.txt', $serializedFiletxt);
		}
		return $this->filetxt;
	}
	
	/**
	 * Método para encontrar el index del array que contiene la tarea por su identificador
	 */
	private function getTaskIndexById($taskId) {
		foreach($this->filetxt as $index => $task) {
			if($task['id'] == $taskId){
				return $index;
			}
		}
		return false;
	}

}

<?php
/**
 * Implements magic setter methods for each property of the Tasks model 
 */

require_once APPPATH . 'core/Entity.php';

class Task extends Entity {

	/**
	 * Evaluates and sets the Task property
	 */

	private $task;
    private $priority;
    private $size;
    private $group;

	public function __setTask($value)
	{
		if(!ctype_alpha(str_replace(' ', '', $value)))
		{
            return false;
        }
		if(strlen($value) > 64)
        {
            return false;
		}
		$this -> task = $value;
		return true;
	}

	/**
	 * Evaluates and sets the Priority property
	 */
	public function __setPriority($value) 
	{
		if(!is_int($value))
		{
			return false;
		}
		if($value < 1 || $value > 4)
		{
			return false;
		}
		$this -> priority = $value;
		return true;
	}

	/**
	 * Evaluates and sets the Size property
	 */
	public function __setSize($value) 
	{
		if(!is_int($value))
		{
			return false;
		}
		if($value < 1 || $value > 4)
		{
			return false;
		}
		$this -> size = $value;
		return true;
	}

	/**
	 * Evaluates and sets the Group property
	 */
	public function __setGroup($value)
	{
		if(!is_int($value))
		{
			return false;
		}
		if($value < 1 || $value > 5)
		{
			return false;
		}
		$this -> group = $value;
		return true;
	}

    public function getTask() {
        return $this->task;
    }

    public function getPriority() {
        return $this->priority;
    }

    public function getSize() {
        return $this->size;
    }

    public function getGroup() {
        return $this->group;
    }

} 
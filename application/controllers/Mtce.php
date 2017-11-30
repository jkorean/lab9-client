<?php
/**
 * Maintenance controller displays pages under the /mtce target link.
 * Displays all tasks with statuses in a pagination format using view fragments.
 */
class Mtce extends Application {

        private $items_per_page = 10;

        // displays the maintenance landing page
        public function index()
        {
            $this->page(1);
        }

        // Initiate adding a new task (10.2)
        public function add()
        {
            $task = $this->tasks->create();
            $this->session->set_userdata('task', $task);
            $this->showit();
        }

        // initiate editing of a task (10.3)
        public function edit($id = null)
        {
            if ($id == null)
                redirect('/mtce');
            $task = $this->tasks->get($id);
            $this->session->set_userdata('task', $task);
            $this->showit();
        }

        // Render the current DTO (10.4)
        private function showit()
        {
            $this->load->helper('form');
            $task = $this->session->userdata('task');
            $this->data['id'] = $task->id;

            // if no errors, pass an empty message
            if ( ! isset($this->data['error']))
                $this->data['error'] = '';

            $fields = array(
                'ftask'      => form_label('Task description') . form_input('task', $task->task),
                'fpriority'  => form_label('Priority') . form_dropdown('priority', $this->app->priority(), $task->priority),
                //job 11 start
                'size' => form_label("Size") . form_dropdown('size', $this->app->size(), $task->size),
                'group' => form_label("Group") . form_dropdown('group', $this ->app->group(), $task->group),
                'status' => form_label("Status") . form_dropdown('status', $this->app->status(), $task->status),
                //job 11 end
                'zsubmit'    => form_submit('submit', 'Update the TODO task'),

            );
            $this->data = array_merge($this->data, $fields);

            $this->data['pagebody'] = 'itemedit';
            $this->render();
        }


    // handle form submission (10.5)
    public function submit()
    {
        // setup for validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->tasks->rules());

        // retrieve & update data transfer buffer
        $task = (array) $this->session->userdata('task');
        $task = array_merge($task, $this->input->post());
        $task = (object) $task;  // convert back to object
        $this->session->set_userdata('task', (object) $task);

        // validate away
        if ($this->form_validation->run())
        {
            if (empty($task->id))
            {
                $task->id = $this->tasks->highest() + 1;
                $this->tasks->add($task);
                $this->alert('Task ' . $task->id . ' added', 'success');
            } else
            {
                $this->tasks->update($task);
                $this->alert('Task ' . $task->id . ' updated', 'success');
            }
        } else
        {
            $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
        }
        $this->showit();
    }

    // build a suitable error message (10.5)
    private function alert($message) {
        $this->load->helper('html');
        $this->data['error'] = heading($message,3);
    }

    // Forget about this edit (10.6)
    function cancel() {
        $this->session->unset_userdata('task');
        redirect('/mtce');
    }

    // Delete this item altogether (10.7)
    function delete()
    {
        $dto = $this->session->userdata('task');
        $task = $this->tasks->get($dto->id);
        $this->tasks->delete($task->id);
        $this->session->unset_userdata('task');
        redirect('/mtce');
    }

        
        private function show_page($tasks)
        {
            $role = $this->session->userdata('userrole');
            $this->data['pagetitle'] = 'TODO List Maintenance ('. $role . ')';
            // build the task presentation output
            $result = ''; // start with an empty array

            foreach ($tasks as $task)
            {
                // INSERT the next three lines. The fourth is already there
                if ($role == ROLE_OWNER)
                    $result .= $this->parser->parse('oneitemx', (array) $task, true);
                else
                    $result .= $this->parser->parse('oneitem', (array) $task, true);
            }
            $this->data['display_tasks'] = $result;

            // and then pass them on
            $this->data['pagebody'] = 'itemlist';
            $this->render();
        }

        // Extract & handle a page of items, defaulting to the beginning
        public function page($num = 1)
        {
            $records = $this->tasks->all(); // get all the tasks
            $tasks = array(); // start with an empty extract

            // use a foreach loop, because the record indices may not be sequential
            $index = 0; // where are we in the tasks list
            $count = 0; // how many items have we added to the extract
            $start = ($num - 1) * $this->items_per_page;
            foreach($records as $task) {
                    if ($index++ >= $start)
                    {
                            $tasks[] = $task;
                            $count++;
                    }
                    if ($count >= $this->items_per_page) break;
            }
            $this->data['pagination'] = $this->pagenav($num);
            // INSERT next three lines
            $role = $this->session->userdata('userrole');
            if ($role == ROLE_OWNER)
                $this->data['pagination'] .= $this->parser->parse('itemadd',[], true);
            $this->show_page($tasks);
        }

        // Build the pagination navbar
        private function pagenav($num) {
            $lastpage = ceil($this->tasks->size() / $this->items_per_page);
            $parms = array(
                    'first' => 1,
                    'previous' => (max($num-1,1)),
                    'next' => min($num+1,$lastpage),
                    'last' => $lastpage
            );
            return $this->parser->parse('itemnav',$parms,true);
        }
}
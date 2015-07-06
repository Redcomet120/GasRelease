<?php
    namespace App\Controller;
    use App\Controller\AppController;
    use Cake\Event\Event;
    use Cake\Network\Exception\NotException;

    class UsersController extends AppController
    {
        public function beforeFilter(Event $event)
        {
            parent::beforeFilter($event);
            //uncomment this line to add initial user
            //$this->Auth->allow('add');
        }
        public function isAuthorized($user)
        {
            if(in_array($this->request->action, ['edit', 'delete',' add']))
            {
                if(isset($user['role'])&& $user['role'] === 'admin')
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return true;
            }
        }

        public function index()
        {
            $this->set('users', $this->Users->find('all'));
        }

        public function add()
        {
            $user = $this->Users->newEntity();
            if($this->request->is('post'))
            {
                $user = $this->Users->patchEntity($user, $this->request->data);
                if($this->Users->save($user))
                {
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action'=>'add']);
                }
                $this->Flash->error(__('Unable to add User.'));
            }
            $this->set('user', $user);
        }

        public function edit($id = null)
        {
            $usr = $this->Users->get($id);
            if($this->request->is('post'))
            {
                $this->Users->patchEntity($usr, $this->request->data);
                if($this->Users->save($usr))
                {
                    $this->Flash->success(__('User Updated'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__("Error: cannot update user"));
            }
            $this->set('user', $usr);
        }

        public function login()
        {
            if($this->request->is('post'))
            {
                $user = $this->Auth->identify();
                if($user)
                {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectURL());
                }
                $this->Flash->error(__('Invalid username or password, try again'));
            }
        }

        public function logout()
        {
            return $this->redirect($this->Auth->logout());
        }
    }
?>

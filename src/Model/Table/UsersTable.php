<?php
    namespace App\Model\Table;
    use Cake\ORM\Table;
    use Cake\Validation\Validator;

    class UsersTable extends Table
    {
        public function validationDefault(Validator $validator)
        {
            return $validator
                ->notEmpty('username', 'a username is required')
                ->notEmpty('password','a password is required')
                ->notEmpty('role', 'A role is required')
                ->add('role', 'inlist',[
                    'rule' => ['inlist',['admin', 'user']],
                    'message'=> ' Please eneter a valid role'
                ]);
        }
    }

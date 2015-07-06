<?php

    namespace App\Model\Table;
    use Cake\ORM\Table;
    use Cake\Validation\Validator;
    use Cake\ORM\Query;

    class ReleasesTable extends Table
    {
        public function initialize(array $config)
        {
            $this->addBehavior('Timestamp');
        }
        public function validationDefault(Validator $validator)
        {
            $validator
                    ->notEmpty('streetno')
                    ->requirePresence('streetno')
                    ->add('streetno',array([
                        'rule' => 'numeric',
                        'message' => 'must be a Number',
                        'rule'=> ['maxlength',5],
                        'message' => 'invalid Street Number',
                    ]))
                    ->requirePresence('street')
                    ->notEmpty('street','A street name is required')
                    ->add('street', 'validFormat', [
                            'rule' => array('custom','/^[a-z0-9 ]*$/i'),
                            'message' => 'Letters, spaces, and numbers only'
                        ])
                    ->requirePresence('city')
                    ->notEmpty('city', 'A city or zip code is required')
                    ->add('city','validFormat',[
                            'rule' =>array('custom','/^[a-z ]*$/i'),
                                'message' => 'Letters and spaces only'
                        ])
                    ->requirePresence('tract')
                    ->requirePresence('lot')
                    ->requirePresence('inspector')
                    ->notEmpty('inspector','An inspector Name is required')
                    ->add('inspector', 'validFormat',[
                            'rule' => 'alphaNumeric',
                            'message' => 'Letters and numbers only'
                        ]);
            return $validator;
        }
    }
?>

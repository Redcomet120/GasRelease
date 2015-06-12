<!-- File: src/Template/Releases/add.ctp -->

<h1>Add Release</h1>
<p><?= $this->Html->link('Compile', ['action' => 'sesh'])?></p>
<?php
    echo $this->Form->create($release);
    echo $this->Form->input('streetno');
    echo $this->Form->input('street');
    echo $this->Form->input('city');
    echo $this->Form->input('tract');
    echo $this->Form->input('lot');
    echo $this->Form->date('rdate', ['label'=>'Release Date', 'minYear' => date('Y') - 5,'required' => true, 'default' => date("'Y','d','m'") ]);
    echo $this->Form->input('inspector');
    echo "please include units here";
    echo $this->Form->input('note');
    echo $this->Form->button(__('Submit Release'));
    echo $this->Form->end();
?>

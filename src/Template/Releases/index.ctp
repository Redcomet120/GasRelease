<!-- File: src/Template/Releases/index.ctp-->
<h1> Gas Release Search Results</h1>
<p><?= $this->Html->link('Add Release', ['action' => 'add']) ?></p>
<?php
    echo date("m/d/Y");
    echo $this->Form->create('false', array('action' => 'search'));
    echo $this->Form->input('search');
    echo $this->Form->radio('searchtype',
        [
            ['value' => 'streetno', 'text' => 'Street #'],
            ['value' => 'street', 'text' => 'Street Name'],
        ]);
    echo $this->Form->button('Search');
    echo $this->Form->end();
?>
<table>
    <tr>
        <th>Address</th>
        <th>City</th>
        <th>Inspector</th>
        <th>Date</th>
    </tr>
<!-- here we display ech of the releases -->
<?php foreach($releases as $release): ?>
<tr>
    <td><?= $this->Html->link($release->streetno." ".$release->street,
        ['action' => 'view', $release->id])?></td>
    <td><?=$release->city?></td>
    <td><?=$release->inspector?></td>
    <td><?=$release->rdate?></td>
</tr>
<?php endforeach; ?>
</table>

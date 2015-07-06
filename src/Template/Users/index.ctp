<!-- File: src/Template/Users/index.ctp -->

<h1>Users</h1
<p><?= $this->Html->link('Add User',['action' => 'add'],['class' => 'button']);?>
<?= $this->Html->link('Logout',['action' => 'logout'],['class' => 'button']);?>
</p>
<table>
<?php foreach($users as $usr): ?>
<tr>
    <td><?=$usr->username?></td>
    <td><?=$usr->role?></td>
    <td><?=$this->Html->link('Edit',['action' => 'edit', $usr->id]);?></td>
</tr>
<?php endforeach;?>
</table>


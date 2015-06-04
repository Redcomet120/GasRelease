<!-- File: src/Template/Releases/search.ctp-->
<h1> Gas Releases Search Results</h1>
<p> <?=$this->Html->link('Add Release', ['action' => 'add']); ?></p>
<p> <?=$this->Html->link('Home', ['action' => 'index']);?></p>
<?php
    echo date("m/d/Y");
?>
<table>
    <tr>
        <th>Address</th>
        <th>City</th>
        <th>Inspector</th>
        <th>Date</th>
    </tr>
<!-- here we display each of the releases -->
<?php foreach ($query as $release): ?>
<tr>
    <td><?=$this->Html->link($release->streetno." ".$release->street,
        ['action' => 'view', $release->id])?></td>
    <td><?=$release->city?></td>
    <td><?=$release->inspector?></td>
    <td><?=$release->rdate?></td>
</tr>
<?php endforeach; ?>
</table>

<!-- File: src/Template/Releases/sesh.ctp-->
<!--<p><?=$this->Html->link('Back Home', ['action' => 'clear']) ?></p> -->
<h1> LADBS Gas Releases </h1>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 18pt;
    }
    th, td {
        padding: 5px;
    }
</style>
<div id="staticHead">
    <table style=width 95%>
    <tr>
        <td><right>To:</right>
            <center>The Gas Company</center>
            <center>Call Center Set Desk - Redlands</center>
            <center>Phone: (800) 228-7377</center>
            <center>Email: setdesk@socalgas.com</center>
        </td>
        <td><right>From:</right>
            <center>City Of Los Angeles</center>
            <center>Department Of Building and Safety</center>
            <center>Inspection Bureau</center>
            <center>6262 Van Nuys Blvd. Room 200</center>
            <center>Phone: (818) 374-1101</center>
    </tr>
    </table>
    </div>
<div id="releaseInfo">
    <table style="font-size: 14pt">
        <tr>
            <th width="10%">Tract</th>
            <th width="10%">Lot</th>
            <th width="10%">Street#</th>
            <th width="20%">Street Name</th>
            <th width="10%">City</th>
            <th width="40%">Notes</th>
        </tr>
<?php foreach($data as $address): ?>
        <tr>
        <td><?= $address[4] ?></td>
        <td><?= $address[5] ?></td>
        <td><?= $address[1] ?></td>
        <td><?= $address[2] ?></td>
        <td><?= $address[3] ?></td>
        <td><?= $address[10]?></td>
        </tr>
<?php endforeach; ?>
    </table>
</div>

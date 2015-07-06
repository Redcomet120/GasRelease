<!-- File: src/Template/Releases/pdf/sesh.ctp-->
<!--<p><?=$this->Html->link('Back Home', ['action' => 'clear']) ?></p> -->
<h1> LADBS Gas Releases <?php echo date("m/d/Y");?> </h1>
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
            <th>Tract</th>
            <th>Lot</th>
            <th>Street#</th>
            <th>Street Name</th>
            <th>City</th>
            <th>Notes</th>
        </tr>
    </table>
</div>

<div id="menu">
     <h2><span class="fontawesome-lock"></span>SERVER INFO</h2>
     <fieldset>
<table class="menu-table">         
       <thead></thead>
       <tbody>
    <tr>
    <td><b>Server Name</b></td>
    <td><?php echo $server ?></td>
  </tr>
   <tr>
    <td><b>Version</b></td>
    <td><?php echo $serverVer ?></td>
  </tr>
     <tr>
    <td><b>Exp&Drop</b></td>
    <td><?php echo $serverExpDrop ?></td>
  </tr>
    <tr>
    <td><b>Accounts</b></td>
    <td><?php echo count_rows('SELECT Count (*) as count from memb_info'); ?></td>
  </tr>
    <tr>
    <td><b>Characters</b></td>
    <td><?php echo count_rows('SELECT Count (*) as count from Character'); ?></td>
  </tr>
    </tr>
    <tr>
    <td><b>Guilds</b></td>
    <td><?php echo count_rows('SELECT Count (*) as count from Guild');  ?></td>
  </tr>
    </tr>
    <tr>
    <td><b>In Game</b></td>
    <td><?php echo count_rows('SELECT Count (*) as count from memb_stat where ConnectStat=1'); ?></td>
  </tr>
    <tr>
        <td><b>Status</b></td>
    <td><?php echo $serstats ?></td>
  </tr>
  </tbody>
  <tfoot></tfoot>
</table>
     </fieldset>
     
     
</div>
     

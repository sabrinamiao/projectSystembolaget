<?php include "templates/include/header.php" ?>

      <ul id="headlines">
	  <li>          
            <a href="./?action=sortimentlista">S&ouml;k dryck</a> | <a href=".?action=archive&amp;categoryId=1">Fakta & nyheter</a> | <a href=".?action=archive&amp;categoryId=2">Om alkohol</a> | <a href=".?action=archive&amp;categoryId=3">Vad passar till?</a> |
			<a href=".?action=archive&amp;categoryId=4">V&aring;rt uppdrag</a> |
			<a href=".?action=storeslista">&Ouml;ppettider</a>
                     
      </li>
      </ul>
        <div class="col-md-6 store">
            <h2><?php echo $results['stores']->Address1 ?></h2>
            <p><?php echo $results['stores']->Namn ?></p>
            <p><?php echo $results['stores']->Address1 ?></p>
            <p><?php echo $results['stores']->Address3 ?></p>
            <p><?php echo $results['stores']->Address4 ?></p>
            <p><?php echo $results['stores']->Telefon ?></p>
            <p><?php if (!empty($results['stores']->Tjanster)){ echo "<span class='extra'>{$results['stores']->Tjanster}</span>";} ?></p>
            <table class="table-responsive storetable">
                <th colspan="2">Öppettider</th>
                <tr>
                    <td>Måndag - Fredag</td>
                    <td>10:00 - 20:00</td>
                </tr>
                <tr>
                    <td>Lördag</td>
                    <td>10:00 - 15:00</td>
                </tr>
                <tr>
                    <td>Söndag</td>
                    <td>Stängt</td>
                </tr>
            </table>
        </div>
        <div class="col-md-6"> 
                <iframe class="map" src='//www.hitta.se/kartan/partner#controls=zoom&amp;center=<?php echo $results['stores']->RT90y ?>:<?php echo $results['stores']->RT90x ?>&amp;zl=11&amp;mp=[{"t":"<?php echo $results['stores']->Address1.'<br>'; echo $results['stores']->Address5 ;?>","y":"<?php echo $results['stores']->RT90y ?>","x":"<?php echo $results['stores']->RT90x ?>"}]' scrolling="no">
                </iframe>				
        </div>
      <p><a href="./">Hem</a></p>

<?php include "templates/include/footer.php" ?>


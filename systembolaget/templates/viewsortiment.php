<?php include "templates/include/header.php" ?>
      <ul id="headlines">
	  <li>          
            <a href="./?action=sortimentlista">S&ouml;k dryck</a> | <a href=".?action=archive&amp;categoryId=1">Fakta & nyheter</a> | <a href=".?action=archive&amp;categoryId=2">Om alkohol</a> | <a href=".?action=archive&amp;categoryId=3">Vad passar till?</a> |
			<a href=".?action=archive&amp;categoryId=4">V&aring;rt uppdrag</a> |
			<a href=".?action=storeslista">&Ouml;ppettider</a>
                     
      </li>

      </ul>
      <h1 style="width: 75%;"><?php echo $results['Sortiment']->Namn ?> <sub>(<?php echo $results['Sortiment']->Varnummer ?>)</sub></h1>
	  <h1 style="width: 75%;"><?php echo $results['Sortiment']->Varugrupp ?></h1>
	  <p>Tillverkad i <?php echo $results['Sortiment']->Ursprung ?>, <?php echo $results['Sortiment']->Ursprunglandnamn ?></p>
      <div style="width: 75%;">
	  <?php if ( $imagePath = $results['Sortiment']->getImagePath() ) { ?>
      <img id="SortimentImageFullsize" src="<?php echo $imagePath?>" alt="Sortiment Image" />
      <?php } ?>
	  </div>
      <table>
		  <thead>
		   <tr >
		     <th colspan="2" >Beskrivning</th>			 
		   </tr>
		  </thead>
		  <tr><td>RavarorBeskrivning</td><td><?php echo $results['Sortiment']->RavarorBeskrivning ?></td></tr>
		  <tr><td>Prisinklmoms</td><td><?php echo $results['Sortiment']->Prisinklmoms ?> Kr</td></tr>
		  <tr><td>PrisPerLiter</td><td><?php echo $results['Sortiment']->PrisPerLiter ?> Kr</td></tr>
		  <tr><td>Pant</td><td><?php echo $results['Sortiment']->Pant ?> </td></tr>
		  <tr><td>Volymiml</td><td><?php echo $results['Sortiment']->Volymiml ?> ml</td></tr>		  
		  <tr><td>Saljstart</td><td><?php echo $results['Sortiment']->Saljstart ?></td></tr>
		  <tr><td>Slutlev</td><td><?php echo $results['Sortiment']->Slutlev ?></td></tr>
		  <tr><td>Forpackning</td><td><?php echo $results['Sortiment']->Forpackning ?></td></tr>
		  <tr><td>Forslutning</td><td><?php echo $results['Sortiment']->Forslutning ?></td></tr>
		  <tr><td>Producent</td><td><?php echo $results['Sortiment']->Producent ?></td></tr>
		  <tr><td>Leverantor</td><td><?php echo $results['Sortiment']->Leverantor ?></td></tr>
		  <tr><td>Argang</td><td><?php echo $results['Sortiment']->Argang ?></td></tr>
		  <tr><td>Alkoholhalt</td><td><?php echo $results['Sortiment']->Alkoholhalt ?></td></tr>
		  </table>

      <p><a href="./">Hem</a></p>

<?php include "templates/include/footer.php" ?>
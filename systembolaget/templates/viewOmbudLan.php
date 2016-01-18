<?php include "templates/include/header.php" ?>

      <ul id="headlines">

	  <li>
          
            <a href="./?action=sortimentlista">S&ouml;k dryck</a> | <a href=".?action=archive&amp;categoryId=1">Fakta & nyheter</a> | <a href=".?action=archive&amp;categoryId=2">Om alkohol</a> | <a href=".?action=archive&amp;categoryId=3">Vad passar till?</a> |
			<a href=".?action=archive&amp;categoryId=4">V&aring;rt uppdrag</a> |
			<a href=".?action=storeslista">&Ouml;ppettider</a>
            
          
        </li>

      </ul>
      <table>
		  <thead>
		   <tr >
		     <th colspan="4" >Ombud i <?php echo $_GET['Lan'];?>
                <a href=".?action=viewStoresLan&amp;Lan=<?php echo $_GET['Lan'];?>" class="ombud">Visa butiker</a>     
            </th>			 
		   </tr>
		  </thead>
		  <?php
                $date_array = getdate();
                $status = "";

                    if (($date_array[wday]<6) && ($date_array[hours] < 20 && $date_array[hours] > 10)){
                        $status = "Öppet nu";
                    }
                    else if (($date_array[wday]===6) && ($date_array[hours] < 15 && $date_array[hours] > 10)){
                        $status = "Öppet nu";
                    }
                    else {
                        $status =  "Stängt";
                    }
                foreach($results['stores'] as $Stores) {
                    echo "<tr><td><a href='.?action=viewStore&storeId={$Stores->Id}'>{$Stores->Address1}</a></td><td>{$Stores->Address4}</td><td>{$status}</td></tr>";
                }
          ?>

      </table>

<?php include "templates/include/footer.php" ?>
<?php include "templates/include/header.php" ?>

      <ul id="headlines">

	  <li>
          
            <a href="./?action=sortimentlista">S&ouml;k dryck</a> | <a href=".?action=archive&amp;categoryId=1">Fakta & nyheter</a> | <a href=".?action=archive&amp;categoryId=2">Om alkohol</a> | <a href=".?action=archive&amp;categoryId=3">Vad passar till?</a> |
			<a href=".?action=archive&amp;categoryId=4">V&aring;rt uppdrag</a> |
			<a href=".?action=storeslista">&Ouml;ppettider</a>
            
          
        </li>

</ul>

        <input type="text" id="search" placeholder="Type to search..." /><br>
        <table>
	  <thead>
		   <tr >
		     <th  colspan="3" >Hela Sortimentet</th>			 
		   </tr>
		  </thead>
		   
<?php foreach ( $results['Sortiments'] as $Sortiment ) { ?>
          <tr>
		     <td>
			 <?php if ( $imagePath = $Sortiment->getImagePath( IMG_TYPE_THUMB ) ) { ?>
             <a href=".?action=viewsortiment&amp;SortimentId=<?php echo $Sortiment->id?>"><img class="SortimentImageThumb" src="<?php echo $imagePath?>" alt="Sortiment Thumbnail" /></a>
             <?php } ?>
			 </td>
			 <td><strong><a href=".?action=viewsortiment&amp;SortimentId=<?php echo $Sortiment->id?>"><?php echo $Sortiment->Namn ?></a> <sub>(<?php echo $Sortiment->Varnummer ?>)</sub></strong><br> <br>Tillverkad i <?php echo $Sortiment->Ursprunglandnamn ?> </td>
			 <td><strong><?php echo $Sortiment->Prisinklmoms ?> Kr</strong><br><br> <?php echo $Sortiment->Forpackning ?>, <?php echo $Sortiment->Volymiml  ?>ml</td>
		   </tr>

<?php } ?>
      </table>
	  
      </ul>

      <p><?php echo $results['totalRows']?> sortiment<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> Totalt.</p>

      <p><a href="./">Hem</a></p>

<?php include "templates/include/footer.php" ?>
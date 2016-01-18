<?php include "templates/include/header.php" ?>
<?php include "templates/admin/include/header.php" ?>

      <ul id="headlines">
	  <li>          
            <a href="./?action=sortimentlista">S&ouml;k dryck</a> | <a href=".?action=archive&amp;categoryId=1">Fakta & nyheter</a> | <a href=".?action=archive&amp;categoryId=2">Om alkohol</a> | <a href=".?action=archive&amp;categoryId=3">Vad passar till?</a> |
			<a href=".?action=archive&amp;categoryId=4">V&aring;rt uppdrag</a>
                     
      </li>

      </ul>

      <h1>Sortiments</h1>

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>


<?php if ( isset( $results['statusMessage'] ) ) { ?>
        <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
<?php } ?>

      <table>
        <tr>
          <th>Varnummer</th>
          <th>Namn</th>
          <th>Varugrupp</th>
        </tr>

<?php foreach ( $results['Sortiments'] as $Sortiment ) { ?>

        <tr onclick="location='admin.php?action=editSortiment&amp;SortimentId=<?php echo $Sortiment->id?>'">
          <td><?php echo  $Sortiment->Varnummer ?></td>
          <td>
            <?php echo $Sortiment->Namn ?>
          </td>
          <td>
            <?php echo $Sortiment->Varugrupp ?>
          </td>
        </tr>

<?php } ?>

      </table>

      <p><?php echo $results['totalRows']?> Sortiment<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> Totalt.</p>

      <p><a href="admin.php?action=newSortiment">Lägg till Sortiment</a></p>

<?php include "templates/include/footer.php" ?>


<?php include "templates/include/header.php" ?>
<?php include "templates/admin/include/header.php" ?>

<script>

      // Prevents file upload hangs in Mac Safari
      // Inspired by http://airbladesoftware.com/notes/note-to-self-prevent-uploads-hanging-in-safari

      function closeKeepAlive() {
        if ( /AppleWebKit|MSIE/.test( navigator.userAgent) ) {
          var xhr = new XMLHttpRequest();
          xhr.open( "GET", "/ping/close", false );
          xhr.send();
        }
      }

      </script>

      <h1><?php echo $results['pageTitle']?></h1>

      <form action="admin.php?action=<?php echo $results['formAction']?>" method="post" enctype="multipart/form-data" onsubmit="closeKeepAlive()">
        <input type="hidden" name="SortimentId" value="<?php echo $results['Sortiment']->id ?>"/>

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>

        <ul>

          <li>
            <label>Artikelid</label>
            <input type="text" name="Artikelid"  placeholder="Artikelid" required autofocus maxlength="255" value="<?php echo  $results['Sortiment']->Artikelid ?>" />
          </li>
		  <li>
            <label>Varnummer</label>
            <input type="text" name="Varnummer"  placeholder="Varnummer" required maxlength="255" value="<?php echo  $results['Sortiment']->Varnummer?>" />
          </li>
		  <li>
            <label>Namn</label>
            <input type="text" name="Namn"  placeholder="Namn"  maxlength="255" value="<?php echo  $results['Sortiment']->Namn ?>" />
          </li>
		  <li>
            <label>Namn2</label>
            <input type="text" name="Namn2"  placeholder="Namn2"  maxlength="255" value="<?php echo  $results['Sortiment']->Namn2 ?>" />
          </li>
		  <li>
            <label>Prisinklmoms</label>
            <input type="text" name="Prisinklmoms"  placeholder="Prisinklmoms"  maxlength="255" value="<?php echo  $results['Sortiment']->Prisinklmoms ?>" />
          </li>
		  <li>
            <label>Pant</label>
            <input type="text" name="Pant"  placeholder="Pant"  maxlength="255" value="<?php echo  $results['Sortiment']->Pant ?>" />
          </li>
		  <li>
            <label>Volymiml</label>
            <input type="text" name="Volymiml"  placeholder="Volymiml" required maxlength="255" value="<?php echo  $results['Sortiment']->Volymiml ?>" />
          </li>
		  <li>
            <label>PrisPerLiter</label>
            <input type="text" name="PrisPerLiter"  placeholder="PrisPerLiter" required maxlength="255" value="<?php echo  $results['Sortiment']->PrisPerLiter ?>" />
          </li>
		  <li>
            <label>Saljstart</label>
            <input type="text" name="Saljstart"  placeholder="Saljstart" required maxlength="255" value="<?php echo  $results['Sortiment']->Saljstart ?>" />
          </li>
		  <li>
            <label>Slutlev</label>
            <input type="text" name="Slutlev" id="Slutlev" placeholder="Slutlev"  maxlength="255" value="<?php echo  $results['Sortiment']->Slutlev ?>" />
          </li>
		  <li>
            <label>Varugrupp</label>
            <input type="text" name="Varugrupp"  placeholder="Varugrupp" required maxlength="255" value="<?php echo  $results['Sortiment']->Varugrupp ?>" />
          </li>
		  <li>
            <label>Forpackning</label>
            <input type="text" name="Forpackning"  placeholder="Forpackning" required maxlength="255" value="<?php echo  $results['Sortiment']->Forpackning ?>" />
          </li>
		  <li>
            <label>Forslutning</label>
            <input type="text" name="Forslutning"  placeholder="Forslutning"  maxlength="255" value="<?php echo  $results['Sortiment']->Forslutning ?>" />
          </li>
		  <li>
            <label>Ursprung</label>
            <input type="text" name="Ursprung"  placeholder="Ursprung" required maxlength="255" value="<?php echo  $results['Sortiment']->Ursprung ?>" />
          </li>
		  <li>
            <label>Ursprunglandnamn</label>
            <input type="text" name="Ursprunglandnamn"  placeholder="Ursprunglandnamn" required maxlength="255" value="<?php echo  $results['Sortiment']->Ursprunglandnamn ?>" />
          </li>
		  <li>
            <label>Producent</label>
            <input type="text" name="Producent"  placeholder="Producent" required maxlength="255" value="<?php echo  $results['Sortiment']->Producent ?>" />
          </li>
		  <li>
            <label>Leverantor</label>
            <input type="text" name="Leverantor"  placeholder="Leverantor" required maxlength="255" value="<?php echo  $results['Sortiment']->Leverantor ?>" />
          </li>
		  <li>
            <label>Argang</label>
            <input type="text" name="Argang"  placeholder="Argang" required maxlength="255" value="<?php echo  $results['Sortiment']->Argang ?>" />
          </li>
		  <li>
            <label>Alkoholhalt</label>
            <input type="text" name="Alkoholhalt"  placeholder="Alkoholhalt" required maxlength="255" value="<?php echo  $results['Sortiment']->Alkoholhalt ?>" />
          </li>
		  <li>
            <label>Sortiment</label>
            <input type="text" name="Sortiment"  placeholder="Sortiment" required maxlength="255" value="<?php echo  $results['Sortiment']->Sortiment ?>" />
          </li>
		  <li>
            <label>Ekologisk</label>
            <input type="text" name="Ekologisk"  placeholder="Ekologisk" required maxlength="255" value="<?php echo  $results['Sortiment']->Ekologisk ?>" />
          </li>
		  <li>
            <label>Koscher</label>
            <input type="text" name="Koscher"  placeholder="Koscher" required maxlength="255" value="<?php echo  $results['Sortiment']->Koscher ?>" />
          </li>
		  <li>
            <label>RavarorBeskrivning</label>
            <input type="text" name="RavarorBeskrivning"  placeholder="RavarorBeskrivning" required maxlength="255" value="<?php echo  $results['Sortiment']->RavarorBeskrivning ?>" />
          </li>




		  <?php if ( $results['Sortiment'] && $imagePath = $results['Sortiment']->getImagePath() ) { ?>
          <li>
            <label>Bild</label>
            <img id="SortimentImage" src="<?php echo $imagePath ?>" alt="Sortiment Image" />
          </li>

          <li>
            <label></label>
            <input type="checkbox" name="deleteImage" id="deleteImage" value="yes"/ > <label for="deleteImage">Ta bort</label>
          </li>
          <?php } ?>

          <li>
            <label for="image">Ny Bild</label>
            <input type="file" name="image" id="image" placeholder="Choose an image to upload" maxlength="255" />
          </li>


        </ul>

        <div class="buttons">
          <input type="submit" name="saveChanges" value="Save Changes" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>

      </form>

<?php if ( $results['Sortiment']->id ) { ?>
      <p><a href="admin.php?action=deleteSortiment&amp;SortimentId=<?php echo $results['Sortiment']->id ?>" onclick="return confirm('Delete This Sortiment?')">Ta bort Sortimentet</a></p>
<?php } ?>

<?php include "templates/include/footer.php" ?>


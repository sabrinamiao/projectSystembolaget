<?php include "templates/include/header.php" ?>

      <ul id="headlines">
	  <li>          
            <a href="./?action=sortimentlista">S&ouml;k dryck</a> | <a href=".?action=archive&amp;categoryId=1">Fakta & nyheter</a> | <a href=".?action=archive&amp;categoryId=2">Om alkohol</a> | <a href=".?action=archive&amp;categoryId=3">Vad passar till?</a> |
			<a href=".?action=archive&amp;categoryId=4">V&aring;rt uppdrag</a> |
			<a href=".?action=storeslista">&Ouml;ppettider</a>
                     
      </li>

      </ul>

      <h1 style="width: 75%;"><?php echo $results['article']->title ?></h1>
      <div style="width: 75%; font-style: italic;"><?php echo  $results['article']->summary?></div>
      <div style="width: 75%;">
	  <?php if ( $imagePath = $results['article']->getImagePath() ) { ?>
      <img id="articleImageFullsize" src="<?php echo $imagePath?>" alt="Article Image" />
      <?php } ?>
	  <?php echo $results['article']->content?></div>
      <p class="pubDate"><?php echo date('j F Y', $results['article']->publicationDate)?>
<?php if ( $results['category'] ) { ?>
        <a href="./?action=archive&amp;categoryId=<?php echo $results['category']->id?>"><?php echo $results['category']->name ?></a>
<?php } ?>
      </p>

      <p><a href="./">Hem</a></p>

<?php include "templates/include/footer.php" ?>


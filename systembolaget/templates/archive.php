<?php include "templates/include/header.php" ?>

      <ul id="headlines">
	  <li>          
            <a href="./?action=sortimentlista">S&ouml;k dryck</a> | <a href=".?action=archive&amp;categoryId=1">Fakta & nyheter</a> | <a href=".?action=archive&amp;categoryId=2">Om alkohol</a> | <a href=".?action=archive&amp;categoryId=3">Vad passar till?</a> |
			<a href=".?action=archive&amp;categoryId=4">V&aring;rt uppdrag</a> |
			<a href=".?action=storeslista">&Ouml;ppettider</a>
                     
      </li>

      </ul>

      <h1><?php echo  $results['pageHeading'] ?></h1>
<?php if ( $results['category'] ) { ?>
      <h3 class="categoryDescription"><?php echo $results['category']->description ?></h3>
<?php } ?>

      <ul id="headlines" class="archive">

<?php foreach ( $results['articles'] as $article ) { ?>

        <li>
          <h2>
            <span class="pubDate"><?php echo date('j F Y', $article->publicationDate)?></span><a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>"><?php echo  $article->title ?></a>
<?php if ( !$results['category'] && $article->categoryId ) { ?>
            <span class="category"><a href=".?action=archive&amp;categoryId=<?php echo $article->categoryId?>"><?php echo  $results['categories'][$article->categoryId]->name  ?></a></span>
<?php } ?>            
          </h2>
          <p class="summary">            
		  <?php if ( $imagePath = $article->getImagePath( IMG_TYPE_THUMB ) ) { ?>
              <a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>"><img class="articleImageThumb" src="<?php echo $imagePath?>" alt="Article Thumbnail" /></a>
            <?php } ?><?php echo $article->summary ?>
			</p>
        </li>

<?php } ?>

      </ul>

      <p><?php echo $results['totalRows']?> article<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> Totalt.</p>

      <p><a href="./">Hem</a></p>

<?php include "templates/include/footer.php" ?>


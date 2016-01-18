<?php include "include/header.php" ?>

      <ul id="headlines">
	  <li> 
            <a href="./?action=sortimentlista">S&ouml;k dryck</a> | <a href=".?action=archive&amp;categoryId=1">Fakta & nyheter</a> | <a href=".?action=archive&amp;categoryId=2">Om alkohol</a> | <a href=".?action=archive&amp;categoryId=3">Vad passar till?</a> |
			<a href=".?action=archive&amp;categoryId=4">V&aring;rt uppdrag</a> |
			<a href=".?action=storeslista">&Ouml;ppettider</a>
      </li>
	  </ul>
	        <h2>Sök bland 17 000 drycker</h2>
	        <form role="form" method="post">
		    <div class="form-group">
			<input type="text"  id="keyword" placeholder="Sök dryck..">
		    </div>
		    </form>
		    <table id="content"></table>

<?php foreach ( $results['articles'] as $article ) { ?>
       <li>
          <h2>
            <span class="pubDate"><?php echo date('j F', $article->publicationDate)?></span><br><a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>"><?php echo $article->title ?></a>
            <?php if ( $article->categoryId ) { ?>
            <span class="category"><a href=".?action=archive&amp;categoryId=<?php echo $article->categoryId?>"><?php echo $results['categories'][$article->categoryId]->name ?></a></span>
            <?php } ?>
          </h2>
          <p class="summary">
		    <?php if ( $imagePath = $article->getImagePath( IMG_TYPE_THUMB ) ) { ?>
            <a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>"><img class="articleImageThumb" src="<?php echo $imagePath?>" alt="Article Thumbnail" /></a>
            <?php } ?>
		  <?php echo $article->summary ?></p>
        </li>
<?php } ?>
      </ul>
      <p><a href="./?action=archive">Archive</a></p>

<?php include "include/footer.php" ?>
<?php
ini_set( "display_errors", true );
date_default_timezone_set( "Europe/Stockholm" ); 
define( "DB_DSN", "mysql:host=u1779428.fsdata.se.mysql.fsdata.se;dbname=u1779428_a;charset=utf8" );
define( "DB_USERNAME", "u1779428" );
define( "DB_PASSWORD", "ea(ky22sDZqT" );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "templates" );
define( "HOMEPAGE_NUM_ARTICLES", 3 );
define( "SORTIMENT_NUM_SORTIMENTS", 10 );
define( "STORES_NUM_STORES", 10 );
define( "ADMIN_USERNAME", "admin" );
define( "ADMIN_PASSWORD", "mypass" );
define( "ARTICLE_IMAGE_PATH", "images/articles" );
define( "SORTIMENT_IMAGE_PATH", "images/sortiments" );
define( "IMG_TYPE_FULLSIZE", "fullsize" );
define( "IMG_TYPE_THUMB", "thumb" );
define( "ARTICLE_THUMB_WIDTH", 120 );
define( "SORTIMENT_THUMB_WIDTH", 120 );
define( "JPEG_QUALITY", 85 );
require( CLASS_PATH . "/Article.php" );
require( CLASS_PATH . "/Category.php" );
require( CLASS_PATH . "/Sortiment.php" );
require( CLASS_PATH . "/Stores.php" );

function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>

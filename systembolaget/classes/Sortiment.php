<?php

/**
 * Class to handle Sortiments
 */

class Sortiment
{
  // Properties
public $id  = null;
public $Artikelid = null;
public $Varnummer = null;
public $Namn = null;
public $Namn2 = null;
public $Prisinklmoms = null;
public $Pant  = null;
public $Volymiml  = null ;
public $PrisPerLiter  = null ;
public $Saljstart  = null ;
public $Slutlev  = null ;
public $Varugrupp = null ;
public $Forpackning  = null;
public $Forslutning  = null;
public $Ursprung  = null;
public $Ursprunglandnamn  = null;
public $Producent  = null;
public $Leverantor  = null;
public $Argang  = null ;
public $Alkoholhalt  = null;
public $Sortiment  = null;
public $Ekologisk  = null;
public $Koscher = null;
public $RavarorBeskrivning  = null;

public $imageExtension = "";
  /**
  * Sets the object's properties using the values in the supplied array
  *
  * @param assoc The property values
  */

 public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
	if ( isset( $data['Artikelid'] ) ) $this->Artikelid = $data['Artikelid'];
	if ( isset( $data['Varnummer'] ) ) $this->Varnummer =  $data['Varnummer'];
	if ( isset( $data['Namn'] ) ) $this->Namn =  $data['Namn'];
	if ( isset( $data['Namn2'] ) ) $this->Namn2 =  $data['Namn2'];
	if ( isset( $data['Prisinklmoms'] ) ) $this->Prisinklmoms =  $data['Prisinklmoms'];
	if ( isset( $data['Pant'] ) ) $this->Pant =  $data['Pant'];
	if ( isset( $data['Volymiml'] ) ) $this->Volymiml =  $data['Volymiml'];
	if ( isset( $data['PrisPerLiter'] ) ) $this->PrisPerLiter =  $data['PrisPerLiter'];
	if ( isset( $data['Saljstart'] ) ) $this->Saljstart =  $data['Saljstart'];
	if ( isset( $data['Slutlev'] ) ) $this->Slutlev =  $data['Slutlev'];
	if ( isset( $data['Varugrupp'] ) ) $this->Varugrupp =  $data['Varugrupp'];
	if ( isset( $data['Forpackning'] ) ) $this->Forpackning =  $data['Forpackning'];
	if ( isset( $data['Forslutning '] ) ) $this->Forslutning  =  $data['Forslutning '];
	if ( isset( $data['Ursprung'] ) ) $this->Ursprung =  $data['Ursprung'];
	if ( isset( $data['Ursprunglandnamn'] ) ) $this->Ursprunglandnamn =  $data['Ursprunglandnamn'];
	if ( isset( $data['Producent'] ) ) $this->Producent =  $data['Producent'];
	if ( isset( $data['Leverantor'] ) ) $this->Leverantor =  $data['Leverantor'];
	if ( isset( $data['Argang'] ) ) $this->Argang=  $data['Argang'];
	if ( isset( $data['Alkoholhalt'] ) ) $this->Alkoholhalt =  $data['Alkoholhalt'];
	if ( isset( $data['Sortiment'] ) ) $this->Sortiment =  $data['Sortiment'];
	if ( isset( $data['Ekologisk'] ) ) $this->Ekologisk =  $data['Ekologisk'];
	if ( isset( $data['Koscher'] ) ) $this->Koscher =  $data['Koscher'];
	if ( isset( $data['RavarorBeskrivning'] ) ) $this->RavarorBeskrivning =  $data['RavarorBeskrivning'];

    if ( isset( $data['imageExtension'] ) ) $this->imageExtension = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\$ a-zA-Z0-9()]/", "", $data['imageExtension'] );
  }


  /**
  * Sets the object's properties using the edit form post values in the supplied array
  *
  * @param assoc The form post values
  */

  public function storeFormValues( $params ) {

    // Store all the parameters
    $this->__construct( $params );

  }


  /**
  * Stores any image uploaded from the edit form
  *
  * @param assoc The 'image' element from the $_FILES array containing the file upload data
  */

  public function storeUploadedImage( $image ) {

    if ( $image['error'] == UPLOAD_ERR_OK )
    {
      // Does the Sortiment object have an ID?
      if ( is_null( $this->id ) ) trigger_error( "Sortiment::storeUploadedImage(): Attempt to upload an image for an Sortiment object that does not have its ID property set.", E_USER_ERROR );

      // Delete any previous image(s) for this Sortiment
      $this->deleteImages();

      // Get and store the image filename extension
      $this->imageExtension = strtolower( strrchr( $image['name'], '.' ) );

      // Store the image

      $tempFilename = trim( $image['tmp_name'] ); 

      if ( is_uploaded_file ( $tempFilename ) ) {
        if ( !( move_uploaded_file( $tempFilename, $this->getImagePath() ) ) ) trigger_error( "Sortiment::storeUploadedImage(): Couldn't move uploaded file.", E_USER_ERROR );
        if ( !( chmod( $this->getImagePath(), 0666 ) ) ) trigger_error( "Sortiment::storeUploadedImage(): Couldn't set permissions on uploaded file.", E_USER_ERROR );
      }

      // Get the image size and type
      $attrs = getimagesize ( $this->getImagePath() );
      $imageWidth = $attrs[0];
      $imageHeight = $attrs[1];
      $imageType = $attrs[2];

      // Load the image into memory
      switch ( $imageType ) {
        case IMAGETYPE_GIF:
          $imageResource = imagecreatefromgif ( $this->getImagePath() );
          break;
        case IMAGETYPE_JPEG:
          $imageResource = imagecreatefromjpeg ( $this->getImagePath() );
          break;
        case IMAGETYPE_PNG:
          $imageResource = imagecreatefrompng ( $this->getImagePath() );
          break;
        default:
          trigger_error ( "Sortiment::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
      }

      // Copy and resize the image to create the thumbnail
      $thumbHeight = intval ( $imageHeight / $imageWidth * SORTIMENT_THUMB_WIDTH );
      $thumbResource = imagecreatetruecolor ( SORTIMENT_THUMB_WIDTH, $thumbHeight );
      imagecopyresampled( $thumbResource, $imageResource, 0, 0, 0, 0, SORTIMENT_THUMB_WIDTH, $thumbHeight, $imageWidth, $imageHeight );

      // Save the thumbnail
      switch ( $imageType ) {
        case IMAGETYPE_GIF:
          imagegif ( $thumbResource, $this->getImagePath( IMG_TYPE_THUMB ) );
          break;
        case IMAGETYPE_JPEG:
          imagejpeg ( $thumbResource, $this->getImagePath( IMG_TYPE_THUMB ), JPEG_QUALITY );
          break;
        case IMAGETYPE_PNG:
          imagepng ( $thumbResource, $this->getImagePath( IMG_TYPE_THUMB ) );
          break;
        default:
          trigger_error ( "Sortiment::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
      }

      $this->update();
    }
  }


  /**
  * Deletes any images and/or thumbnails associated with the Sortiment
  */

  public function deleteImages() {

    // Delete all fullsize images for this Sortiment
    foreach (glob( SORTIMENT_IMAGE_PATH . "/" . IMG_TYPE_FULLSIZE . "/" . $this->id . ".*") as $filename) {
      if ( !unlink( $filename ) ) trigger_error( "Sortiment::deleteImages(): Couldn't delete image file.", E_USER_ERROR );
    }
    
    // Delete all thumbnail images for this Sortiment
    foreach (glob( SORTIMENT_IMAGE_PATH . "/" . IMG_TYPE_THUMB . "/" . $this->id . ".*") as $filename) {
      if ( !unlink( $filename ) ) trigger_error( "Sortiment::deleteImages(): Couldn't delete thumbnail file.", E_USER_ERROR );
    }

    // Remove the image filename extension from the object
    $this->imageExtension = "";
  }


  /**
  * Returns the relative path to the Sortiment's full-size or thumbnail image
  *
  * @param string The type of image path to retrieve (IMG_TYPE_FULLSIZE or IMG_TYPE_THUMB). Defaults to IMG_TYPE_FULLSIZE.
  * @return string|false The image's path, or false if an image hasn't been uploaded
  */

  public function getImagePath( $type=IMG_TYPE_FULLSIZE ) {
    return ( $this->id && $this->imageExtension ) ? ( SORTIMENT_IMAGE_PATH . "/$type/" . $this->id . $this->imageExtension ) : false;
  }


  /**
  * Returns an Sortiment object matching the given Sortiment ID
  *
  * @param int The Sortiment ID
  * @return Sortiment|false The Sortiment object, or false if the record was not found or there was a problem
  */

  public static function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT *  FROM Sortiments WHERE id = :id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new Sortiment( $row );
  }


  /**
  * Returns all (or a range of) Sortiment objects in the DB
  *
  * @param int Optional The number of rows to return (default=all)
  * @param string Optional column by which to order the Sortiments (default="id DESC")
  * @return Array|false A two-element array : results => array, a list of Sortiment objects; totalRows => Total number of Sortiments
  */

  public static function getList( $numRows=1000000, $order="id DESC" ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Sortiments
            ORDER BY " . mysql_escape_string($order) . " LIMIT :numRows";

    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $Sortiment = new Sortiment( $row );
      $list[] = $Sortiment;
    }

    // Now get the total number of Sortiments that matched the criteria
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }


  /**
  * Inserts the current Sortiment object into the database, and sets its ID property.
  */

  public function insert() {

    // Does the Sortiment object already have an ID?
    if ( !is_null( $this->id ) ) trigger_error ( "Sortiment::insert(): Attempt to insert an Sortiment object that already has its ID property set (to $this->id).", E_USER_ERROR );

    // Insert the Sortiment
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO Sortiments ( Artikelid, Varnummer, Namn, Namn2, Prisinklmoms, Pant, Volymiml, 
		PrisPerLiter, Saljstart, Slutlev, Varugrupp, Forpackning, Forslutning, Ursprung, Ursprunglandnamn, 
		Producent, Leverantor, Argang, Alkoholhalt, Sortiment, Ekologisk, Koscher, RavarorBeskrivning, imageExtension ) VALUES ( :Artikelid, :Varnummer, :Namn, :Namn2, :Prisinklmoms, :Pant, :Volymiml, 
		:PrisPerLiter, :Saljstart, :Slutlev, :Varugrupp, :Forpackning, :Forslutning, :Ursprung, :Ursprunglandnamn, 
		:Producent, :Leverantor, :Argang, :Alkoholhalt, :Sortiment, :Ekologisk, :Koscher, :RavarorBeskrivning, :imageExtension )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":Artikelid", $this->Artikelid, PDO::PARAM_STR );
    $st->bindValue( ":Varnummer", $this->Varnummer, PDO::PARAM_STR );
    $st->bindValue( ":Namn", $this->Namn, PDO::PARAM_STR );
	$st->bindValue( ":Namn2", $this->Namn2, PDO::PARAM_STR );
	$st->bindValue( ":Prisinklmoms", $this->Prisinklmoms, PDO::PARAM_STR );
	$st->bindValue( ":Pant", $this->Pant, PDO::PARAM_STR );
	$st->bindValue( ":Volymiml", $this->Volymiml, PDO::PARAM_STR );
	$st->bindValue( ":PrisPerLiter", $this->PrisPerLiter, PDO::PARAM_STR );
	$st->bindValue( ":Saljstart", $this->Saljstart, PDO::PARAM_STR );
	$st->bindValue( ":Slutlev", $this->Slutlev, PDO::PARAM_STR );
	$st->bindValue( ":Varugrupp", $this->Varugrupp, PDO::PARAM_STR );
	$st->bindValue( ":Forpackning", $this->Forpackning, PDO::PARAM_STR );
	$st->bindValue( ":Forslutning", $this->Forslutning, PDO::PARAM_STR );
	$st->bindValue( ":Ursprung", $this->Ursprung, PDO::PARAM_STR );
	$st->bindValue( ":Ursprunglandnamn", $this->Ursprunglandnamn, PDO::PARAM_STR );
	$st->bindValue( ":Producent", $this->Producent, PDO::PARAM_STR );
	$st->bindValue( ":Leverantor", $this->Leverantor, PDO::PARAM_STR );
	$st->bindValue( ":Argang", $this->Argang, PDO::PARAM_STR );
	$st->bindValue( ":Alkoholhalt", $this->Alkoholhalt, PDO::PARAM_STR );
	$st->bindValue( ":Sortiment", $this->Sortiment, PDO::PARAM_STR );
	$st->bindValue( ":Ekologisk", $this->Ekologisk, PDO::PARAM_STR );
	$st->bindValue( ":Koscher", $this->Koscher, PDO::PARAM_STR );
	$st->bindValue( ":RavarorBeskrivning", $this->RavarorBeskrivning, PDO::PARAM_STR );    
    $st->bindValue( ":imageExtension", $this->imageExtension, PDO::PARAM_STR );
    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  }


  /**
  * Updates the current Sortiment object in the database.
  */

  public function update() {

    // Does the Sortiment object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "Sortiment::update(): Attempt to update an Sortiment object that does not have its ID property set.", E_USER_ERROR );
   
    // Update the Sortiment
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "UPDATE Sortiments SET Artikelid=:Artikelid, Varnummer=:Varnummer, Namn=:Namn, Namn2=:Namn2, Prisinklmoms=:Prisinklmoms, Pant=:Pant, Volymiml=:Volymiml, 
		PrisPerLiter=:PrisPerLiter, Saljstart=:Saljstart, Slutlev=:Slutlev, Varugrupp=:Varugrupp, Forpackning=:Forpackning, Forslutning=:Forslutning, Ursprung=:Ursprung, Ursprunglandnamn=:Ursprunglandnamn, 
		Producent=:Producent, Leverantor=:Leverantor, Argang=:Argang, Alkoholhalt=:Alkoholhalt, Sortiment=:Sortiment, Ekologisk=:Ekologisk, Koscher=:Koscher, RavarorBeskrivning=:RavarorBeskrivning, imageExtension=:imageExtension WHERE id = :id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":Artikelid", $this->Artikelid, PDO::PARAM_STR );
    $st->bindValue( ":Varnummer", $this->Varnummer, PDO::PARAM_STR );
    $st->bindValue( ":Namn", $this->Namn, PDO::PARAM_STR );
	$st->bindValue( ":Namn2", $this->Namn2, PDO::PARAM_STR );
	$st->bindValue( ":Prisinklmoms", $this->Prisinklmoms, PDO::PARAM_STR );
	$st->bindValue( ":Pant", $this->Pant, PDO::PARAM_STR );
	$st->bindValue( ":Volymiml", $this->Volymiml, PDO::PARAM_STR );
	$st->bindValue( ":PrisPerLiter", $this->PrisPerLiter, PDO::PARAM_STR );
	$st->bindValue( ":Saljstart", $this->Saljstart, PDO::PARAM_STR );
	$st->bindValue( ":Slutlev", $this->Slutlev, PDO::PARAM_STR );
	$st->bindValue( ":Varugrupp", $this->Varugrupp, PDO::PARAM_STR );
	$st->bindValue( ":Forpackning", $this->Forpackning, PDO::PARAM_STR );
	$st->bindValue( ":Forslutning", $this->Forslutning, PDO::PARAM_STR );
	$st->bindValue( ":Ursprung", $this->Ursprung, PDO::PARAM_STR );
	$st->bindValue( ":Ursprunglandnamn", $this->Ursprunglandnamn, PDO::PARAM_STR );
	$st->bindValue( ":Producent", $this->Producent, PDO::PARAM_STR );
	$st->bindValue( ":Leverantor", $this->Leverantor, PDO::PARAM_STR );
	$st->bindValue( ":Argang", $this->Argang, PDO::PARAM_STR );
	$st->bindValue( ":Alkoholhalt", $this->Alkoholhalt, PDO::PARAM_STR );
	$st->bindValue( ":Sortiment", $this->Sortiment, PDO::PARAM_STR );
	$st->bindValue( ":Ekologisk", $this->Ekologisk, PDO::PARAM_STR );
	$st->bindValue( ":Koscher", $this->Koscher, PDO::PARAM_STR );
	$st->bindValue( ":RavarorBeskrivning", $this->RavarorBeskrivning, PDO::PARAM_STR );    
    $st->bindValue( ":imageExtension", $this->imageExtension, PDO::PARAM_STR );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }


  /**
  * Deletes the current Sortiment object from the database.
  */

  public function delete() {

    // Does the Sortiment object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "Sortiment::delete(): Attempt to delete an Sortiment object that does not have its ID property set.", E_USER_ERROR );

    // Delete the Sortiment
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM Sortiments WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}

?>


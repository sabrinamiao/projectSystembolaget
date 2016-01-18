

<?php

/**
 * Class to handle Stores
 */

class Stores
{
  // Properties
public $Id = null;
public $Typ = null;
public $Nr = null;
public $Namn = null;
public $Address1 = null;
public $Address2 = null;
public $Address3 = null;
public $Address4 = null;
public $Address5 = null;
public $Telefon = null;
public $ButiksTyp = null;
public $Tjanster = null;
public $SokOrd = null;
public $Oppettider = null;
public $RT90x = null;
public $RT90y = null;
    
    
  /**
  * Sets the object's properties using the values in the supplied array
  *
  * @param assoc The property values
  */

 public function __construct( $data=array() ) {
    if ( isset( $data['Id'] ) ) $this->Id = (int) $data['Id'];
	if ( isset( $data['Typ'] ) ) $this->Typ = $data['Typ'];
	if ( isset( $data['Nr'] ) ) $this->Nr =  $data['Nr'];
	if ( isset( $data['Namn'] ) ) $this->Namn =  $data['Namn'];
	if ( isset( $data['Address1'] ) ) $this->Address1 =  $data['Address1'];
	if ( isset( $data['Address2'] ) ) $this->Address2 =  $data['Address2'];
	if ( isset( $data['Address3'] ) ) $this->Address3 =  $data['Address3'];
	if ( isset( $data['Address4'] ) ) $this->Address4 =  $data['Address4'];
	if ( isset( $data['Address5'] ) ) $this->Address5 =  $data['Address5'];
	if ( isset( $data['Telefon'] ) ) $this->Telefon =  str_replace("/", "-", $data['Telefon']);
	if ( isset( $data['ButiksTyp'] ) ) $this->ButiksTyp =  $data['ButiksTyp'];
	if ( isset( $data['Tjanster'] ) ) $this->Tjanster =  $data['Tjanster'];
	if ( isset( $data['SokOrd'] ) ) $this->SokOrd =  $data['SokOrd'];
	if ( isset( $data['Oppettider'] ) ) $this->Oppettider =  $data['Oppettider'];
	if ( isset( $data['RT90x'] ) ) $this->RT90x =  $data['RT90x'];
	if ( isset( $data['RT90y'] ) ) $this->RT90y =  $data['RT90y'];
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
  * Returns Stores object matching the given Stores ID
  *
  * @param int The Stores ID
  * @return Stores|false The Stores object, or false if the record was not found or there was a problem
  */

  public static function getById( $Id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT *  FROM stores WHERE Id = :Id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":Id", $Id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new Stores( $row );
  }


  /**
  * Returns all (or a range of) Store objects in the DB
  *
  * @param int Optional The number of rows to return (default=all)
  * @param string Optional column by which to order the Stores (default="id DESC")
  * @return Array|false A two-element array : results => array, a list of Store objects; totalRows => Total number of Stores
  */

  public static function getList( $numRows=1000000, $order="id DESC" ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM stores
            ORDER BY " . mysql_escape_string($order) . " LIMIT :numRows";

    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $Stores = new Stores( $row );
      $list[] = $Stores;
    }

    // Now get the total number of Stores that matched the criteria
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }
    
    
    
/* Hämta lista över län */
    
  public static function getListLan( $numRows=1000000, $order="id ASC" ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT DISTINCT Address5 FROM stores
            ORDER BY " . $order . " LIMIT :numRows";

    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $Stores = new Stores( $row );
      $list[] = $Stores;
    }

    // Now get the total number of Stores that matched the criteria
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }
    
    
/* Hämta lista över butiker per län */

 public static function getListByLan( $Address5 ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT *  FROM stores WHERE Address5 = :Address5 AND Typ = 'Butik' ";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":Address5", $Address5, PDO::PARAM_STR );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $Stores = new Stores( $row );
      $list[] = $Stores;
    }

    // Now get the total number of Stores that matched the criteria
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }

/* Hämta lista över ombud per län */
 public static function getListOmbudByLan( $Address5 ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT *  FROM stores WHERE Address5 = :Address5 AND Typ = 'Ombud' ";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":Address5", $Address5, PDO::PARAM_STR );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $Stores = new Stores( $row );
      $list[] = $Stores;
    }

    // Now get the total number of Stores that matched the criteria
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }
    

  /**
  * Inserts the current Stores object into the database, and sets its ID property.
  */

  public function insert() {

    // Does the Store object already have an ID?
    if ( !is_null( $this->Id ) ) trigger_error ( "Stores::insert(): Attempt to insert a Stores object that already has its ID property set (to $this->Id).", E_USER_ERROR );

    // Insert new store
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO stores ( Typ, Nr, Namn, Address1, Address2, Address3, Address4, 
		Address5, Telefon, ButiksTyp, Tjanster, SokOrd, OppetTider, RT90x, RT90y ) VALUES ( :Typ, :Nr, :Namn, :Address1, :Address2, :Address3, :Address4, :Address5, :Telefon, :ButiksTyp, :Tjanster, :SokOrd, :OppetTider, :RT90x, :RT90y )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":Typ", $this->Typ, PDO::PARAM_STR );
    $st->bindValue( ":Nr", $this->Nr, PDO::PARAM_STR );
    $st->bindValue( ":Namn", $this->Namn, PDO::PARAM_STR );
	$st->bindValue( ":Address1", $this->Address1, PDO::PARAM_STR );
	$st->bindValue( ":Address2", $this->Address2, PDO::PARAM_STR );
	$st->bindValue( ":Address3", $this->Address3, PDO::PARAM_STR );
	$st->bindValue( ":Address4", $this->Address4, PDO::PARAM_STR );
	$st->bindValue( ":Address5", $this->Address5, PDO::PARAM_STR );
	$st->bindValue( ":Telefon", $this->Telefon, PDO::PARAM_STR );
	$st->bindValue( ":ButiksTyp", $this->ButiksTyp, PDO::PARAM_STR );
	$st->bindValue( ":Tjanster", $this->Tjanster, PDO::PARAM_STR );
	$st->bindValue( ":SokOrd", $this->SokOrd, PDO::PARAM_STR );
      $st->bindValue( ":Oppettider", $this->Oppettider, PDO::PARAM_STR );
	$st->bindValue( ":RT90x", $this->RT90x, PDO::PARAM_STR );
	$st->bindValue( ":RT90y", $this->RT90y, PDO::PARAM_STR );
    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  }


  /**
  * Updates the current Stores object in the database.
  */

  public function update() {

    // Does the Store object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "Stores::update(): Attempt to update a Stores object that does not have its ID property set.", E_USER_ERROR );
   
    // Update the Store
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "UPDATE stores SET Typ=:Typ, Nr=:Nr, Namn=:Namn, Address1=:Address1, Address2=:Address2, Address3=:Address3, Address4=:Address4, 
		Address5=:Address5, Telfon=:Telefon, ButiksTyp=:ButiksTyp, Tjanster=:Tjanster, SokOrd=:SokOrd, Oppettider=:Oppettider, RT90x=:RT90x, RT90y=:RT90xy WHERE Id = :Id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":Typ", $this->Typ, PDO::PARAM_STR );
    $st->bindValue( ":Nr", $this->Nr, PDO::PARAM_STR );
    $st->bindValue( ":Namn", $this->Namn, PDO::PARAM_STR );
	$st->bindValue( ":Address1", $this->Address1, PDO::PARAM_STR );
	$st->bindValue( ":Address2", $this->Address2, PDO::PARAM_STR );
	$st->bindValue( ":Address3", $this->Address3, PDO::PARAM_STR );
	$st->bindValue( ":Address4", $this->Address4, PDO::PARAM_STR );
	$st->bindValue( ":Address5", $this->Address5, PDO::PARAM_STR );
	$st->bindValue( ":Telefon", $this->Telefon, PDO::PARAM_STR );
	$st->bindValue( ":ButiksTyp", $this->ButiksTyp, PDO::PARAM_STR );
	$st->bindValue( ":Tjanster", $this->Tjanster, PDO::PARAM_STR );
	$st->bindValue( ":SokOrd", $this->SokOrd, PDO::PARAM_STR );
    $st->bindValue( ":Oppettider", $this->Oppettider, PDO::PARAM_STR );
	$st->bindValue( ":RT90x", $this->RT90x, PDO::PARAM_STR );
	$st->bindValue( ":RT90y", $this->RT90y, PDO::PARAM_STR );
    $st->bindValue( ":Id", $this->Id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }


  /**
  * Deletes the current Store object from the database.
  */

  public function delete() {

    // Does the Stores object have an ID?
    if ( is_null( $this->Id ) ) trigger_error ( "Stores::delete(): Attempt to delete a Stores object that does not have its ID property set.", E_USER_ERROR );

    // Delete the Store
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM stores WHERE Id = :Id LIMIT 1" );
    $st->bindValue( ":Id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}

?>


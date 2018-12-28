<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class delete_book_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }
//deleting the books information from every tabel it is in
  function deleteBook($ISBN)
  {
    $sql = "delete from books where `ISBN` = '$ISBN'";
    $this->db->query($sql);
    $sql = "delete from books_has_authors where `ISBN` = '$ISBN'";
    $this->db->query($sql);
    $sql = "delete from books_has_genre where `ISBN` = '$ISBN'";
    $this->db->query($sql);
    $sql = "delete from books_has_type where `ISBN` = '$ISBN'";
    $this->db->query($sql);
    $sql = "delete from books_has_editionnumber where `ISBN` = '$ISBN'";
    $this->db->query($sql);
    return 1;
  }

}

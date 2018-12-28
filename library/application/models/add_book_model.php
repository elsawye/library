<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class add_book_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }

  function getAuthors()
  {
  //this function get the authors from database
    $sql = "select * from authors";
    $query = $this->db->query($sql);
    $results = array();
     foreach ($query->result() as $result) {
       $results[] = $result;
     }
      return $results;
  }

  function getGenres()
  {
  //this function get the genres from database
    $sql = "select * from genre";
    $query = $this->db->query($sql);
    $results = array();
     foreach ($query->result() as $result) {
       $results[] = $result;
     }
      return $results;
  }

  function getTypes()
  {
  //this function get the types from database
    $sql = "select * from type";
    $query = $this->db->query($sql);
    $results = array();
     foreach ($query->result() as $result) {
       $results[] = $result;
     }
      return $results;
  }


  function addBook()
  {
    $data = array(
        'ISBN' => $this->input->post('isbn'),
        'NameBook' => $this->input->post('bookname'),
        'PublishDate' => $this->input->post('publishdate'),
        'numberofpages' => $this->input->post('pagesCount'),
        'bestofcollection' => ($this->input->post('bestOf') == 'on') ? 1 : 0
    );
    $this->db->insert('books', $data);

    $isbn = $data['ISBN'];

    $data = array(
        'ISBN'=> $isbn,
        'EditionNumber' => $this->input->post('editionnumber'),
    );
    $this->db->insert('books_has_editionnumber', $data);

    $data = array(
        'ISBN'=> $isbn
      );
    $authors = $this->input->post('author');
    foreach ($authors as $value) {
     $data['IDAuthor']=$value;
     $this->db->insert('books_has_authors', $data);
    }
    $data = array(
        'ISBN'=> $isbn
    );
    $genres = $this->input->post('genre');
    foreach ($genres as $value) {
      $data['IDGenre'] = $value;
      $this->db->insert('books_has_genre', $data);
    }

    $data = array(
        'ISBN'=> $isbn
    );
    $types = $this->input->post('type');
    foreach ($types as $value) {
      $data['IDType'] = $value;
      $this->db->insert('books_has_type', $data);
    }
  }

}

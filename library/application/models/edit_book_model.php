<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class edit_book_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }

  function getBookEN($ISBN)
  {
  //this function get the authors from database
    $sql = "select * from books_has_editionnumber where ISBN = '$ISBN'";
    $query = $this->db->query($sql);
    $results = array();
     foreach ($query->result() as $result) {
       $results[] = $result->EditionNumber;
     }
      return $results[0];
  }

  function getBookAuthors($ISBN)
  {
  //this function get the authors from database
    $sql = "select * from books_has_authors where ISBN = '$ISBN'";
    $query = $this->db->query($sql);
    $results = array();
     foreach ($query->result() as $result) {
       $results[] = $result->IDAuthor;
     }
      return $results;
  }

  function getBookGenres($ISBN)
  {
  //this function get the authors from database
    $sql = "select * from books_has_genre where ISBN = '$ISBN'";
    $query = $this->db->query($sql);
    $results = array();
     foreach ($query->result() as $result) {
       $results[] = $result->IDGenre;
     }
      return $results;
  }

  function getBookTypes($ISBN)
  {
  //this function get the authors from database
    $sql = "select * from books_has_type where ISBN = '$ISBN'";
    $query = $this->db->query($sql);
    $results = array();
     foreach ($query->result() as $result) {
       $results[] = $result->IDType;
     }
      return $results;
  }

  function editBook()
  {
    $isbn = $this->input->post('isbn');
    $NameBook = $this->input->post('bookname');
    $PublishDate = $this->input->post('publishdate');
    $numberofpages = $this->input->post('pagesCount');
    $bestofcollection = ($this->input->post('bestOf') == 'on') ? 1 : 0;


    $sql = "update books set `NameBook` = '$NameBook', `PublishDate` = '$PublishDate', `numberofpages` = '$numberofpages', `bestofcollection` = '$bestofcollection' where `isbn` = '$isbn'";
    $this->db->query($sql);

    $EditionNumber = $this->input->post('editionnumber');

    $sql = "update books_has_editionnumber set EditionNumber = '$EditionNumber' where `ISBN` = '$isbn'";
    $this->db->query($sql);

    $data = array(
        'ISBN'=> $isbn
    );
    $authors = $this->input->post('author');
    $bookAuthor = $this->getBookAuthors($isbn);
    if (isset($authors) && count($authors) > 0) {
      foreach ($authors as $value) {
        $data['IDAuthor'] = $value;
        $this->db->where('ISBN',$isbn);
        $this->db->where('IDAuthor',$value);
        $query = $this->db->get('books_has_authors');
        if (!$query->num_rows() > 0) {
          $this->db->insert('books_has_authors', $data);
        }
      }
    }

    $data = array(
        'ISBN'=> $isbn
    );
    $genres = $this->input->post('genre');
    $bookGenres = $this->getBookGenres($isbn);
    if (isset($genres) && count($genres) > 0) {
      foreach ($genres as $value) {
        $data['IDGenre'] = $value;
        $this->db->where('ISBN',$isbn);
        $this->db->where('IDGenre',$value);
        $query = $this->db->get('books_has_genre');
        if (!$query->num_rows() > 0) {
          $this->db->insert('books_has_genre', $data);
        }
      }
    }
    foreach ($bookGenres as $genre) {
      if (!in_array($genre, $genres)) {
        $this->db->delete('books_has_genre', array('ISBN' => $isbn, 'IDGenre' => $genre));
      }
    }

    $data = array(
        'ISBN'=> $isbn
    );
    $types = $this->input->post('type');
    $bookTypes = $this->getBookTypes($isbn);
    if (isset($types) && count($types) > 0) {
      foreach ($types as $value) {
        $data['IDType'] = $value;
        $this->db->where('ISBN',$isbn);
        $this->db->where('IDType',$value);
        $query = $this->db->get('books_has_type');
        if (!$query->num_rows() > 0) {
          $this->db->insert('books_has_type', $data);
        }
      }
    }
    foreach ($bookTypes as $type) {
      if (!in_array($type, $types)) {
        $this->db->delete('books_has_type', array('ISBN' => $isbn, 'IDType' => $type));
      }
    }
  }

}

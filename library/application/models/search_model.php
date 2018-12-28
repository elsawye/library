<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class search_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }

  function search($keyword)
  {
    $results = array();
  	$this->db->like('NameBook',$keyword);
    $query = $this->db->get('books');
    foreach ($query->result() as $result) {
    	$editionNumber = $this->edit_book_model->getBookEn($result->ISBN)[0];
    	$result->EditionNumber = $editionNumber;
       	$results[$result->ISBN] = $result;
    }
  	$this->db->like('NameAuthor',$keyword);
    $query1 = $this->db->get('authors');
    $authorBooks = array();
    foreach ($query1->result() as $result) {
      $this->db->where('IDAuthor',$result->IDAuthor);
      $query2 = $this->db->get('books_has_authors');
      foreach ($query2->result() as $authBook) {
      	$this->db->where('ISBN',$authBook->ISBN);
        $query = $this->db->get('books');
        foreach ($query->result() as $book) {
          $authorBooks[$book->ISBN] = $book;
        }
      }
    }
    foreach ($authorBooks as $result) {
      if (!in_array($result->ISBN, array_keys($results))) {
      	$editionNumber = $this->edit_book_model->getBookEn($result->ISBN)[0];
      	$result->EditionNumber = $editionNumber;
         	$results[] = $result;
      }
    }
    return $results;
  }

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class add_author_model extends CI_Model {
//discribes what this model will do which is getting information to add in the database
  function addAuthor()
  {
    $data = array(
        'NameAuthor' => $this->input->post('authorname')
    );
    $this->db->insert('authors', $data);
  }

}

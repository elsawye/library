<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class add_genre_model extends CI_Model {
//adding the data to the database
  function addgenre()
  {
    $data = array(
        'NameGenre' => $this->input->post('genrename')
    );
    $this->db->insert('genre', $data);
  }

}

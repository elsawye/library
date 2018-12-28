<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class login_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }

  function login($AdminName, $Adminpass)
  {
    $sql = "select * from adminacc where AdminName ='$AdminName' AND Adminpass='$Adminpass'";
    $query = $this->db->query($sql);
    if(count($query->result()) == 1)
    {
      return 1;
    }
    else {
      return 0;
    }
  }

}

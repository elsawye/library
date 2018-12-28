<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class library extends CI_Controller {

	public function __construct(){
     	parent::__construct();
			//this lines are callers for the models
     	$this->load->model('login_model');
     	$this->load->model('search_model');
     	$this->load->model('add_author_model');
     	$this->load->model('add_book_model');
     	$this->load->model('delete_book_model');
     	$this->load->model('edit_book_model');
     	$this->load->model('add_genre_model');
		$this->load->helper('url');
}
//this function clles the login view
	public function login()
	{
		$this->load->view('login_main');

	}

	public function loginrequest()
	{
		//call Library_model.login(username,password)
		//pass the values from the form via post
		$result = $this->login_model->login($this->input->post("AdminName"),$this->input->post("Adminpass"));
		//if the result is not zero (if there is a record with the inputted username and password)
		if($result!=0)
		{
			//create session, to make sure a user can't access any page without logging in
			$this->session->set_userdata('isuserloggedin', 'true');
			//store the user role for future use (redirecting to different parts of the app)

			//go to the home page
			redirect($this->config->base_url().'library');
		}
		else
		{
			//disply an error to the user.
			echo "wrong username or password";
		}
	}
//
	public function index()
	{
		$data = array();
		$sql = "select * from books";
	    $query = $this->db->query($sql);
	    $results = array();
	    foreach ($query->result() as $result) {
	    	$editionNumber = $this->edit_book_model->getBookEn($result->ISBN);
	    	$result->EditionNumber = $editionNumber;
	       	$results[] = $result;
	    }
	    $data['books'] = $results;
		$this->load->view('mainpage-view', $data);
	}
	//this is the calling for the search function to work
	public function search()
	{
		$keyword = $this->input->get('keyword');
		$data['books'] = $this->search_model->search($keyword);
		$data['keyword'] = $keyword;
		$this->load->view('search', $data);
	}
	//functionadd author to load the view of add author
	public function addAuthor()
	{
		$this->load->view('add_author');
	}
	//loading the view of add genre
	public function add_genre()
	{
		$this->load->view('add_genre');
	}
	//loading the view and the model of add quthor result
	public function add_author_resault()
	{
		$this->add_author_model->addAuthor();
		$this->load->view('add_author_resault');
	}
	//loading the moadel and the view of add genre result
	public function add_genre_resault()
	{
		$this->add_genre_model->addgenre();
		$this->load->view('add_genre_resault');
	}
	//loading the model and view of add book result
	public function add_book_resault()
	{
		$this->add_book_model->addBook();
		$this->load->view('add_book_resault');
	}
	//loading the view and the model of edit book result
	public function edit_book_resault()
	{
		$this->edit_book_model->editBook();
		$this->load->view('edit_book_resault');
	}
	//in this function it gets the data and load the view of edit book
	public function editBook()
	{
		$data = array();
		$ISBN = $this->input->post('bookISBN');
		$data['authorsList'] = $this->add_book_model->getAuthors();
		$data['genresList'] = $this->add_book_model->getGenres();
		$data['typesList'] = $this->add_book_model->getTypes();
		$data['bookAuthor'] = $this->edit_book_model->getBookAuthors($ISBN);
		$data['bookGenres'] = $this->edit_book_model->getBookGenres($ISBN);
		$data['bookTypes'] = $this->edit_book_model->getBookTypes($ISBN);
		$data['bookEn'] = $this->edit_book_model->getBookEn($ISBN);
		$sql = "select * from books where isbn = '$ISBN'";
	    $data['book'] = $this->db->query($sql)->result()[0];
		$this->load->view('edit_book', $data);
	}
	//it loads the model of deleting book and redirect the user to another url
	public function confirmDeleteBook()
	{
		$this->delete_book_model->deleteBook($this->input->post('bookISBN'));
		redirect($this->config->base_url());
	}
	//loading the view of add book and getting data from it
	public function add_book()
	{
		$data = array();
		$authors = $this->add_book_model->getAuthors();
		$genres = $this->add_book_model->getGenres();
		$types = $this->add_book_model->getTypes();
		$data['authorsList'] = $authors;
		$data['genresList'] = $genres;
		$data['typesList'] = $types;
		$this->load->view('add_book', $data);
	}
//loading model
public function insert_new_book()
{
	$this->add_book_model->add_book();
}
public function showallbooks()
{
 //call student_model.get_all_students(studentName) to get all students
 $all_books = $this->mainscreen_model->get_all_books();
 //create an empty array called data
 $data = array();
 //add the results from the model which are stored in $all_students to data and give it key "students"
 //we'll use this key to access the data in the view
 $data['books'] = $all_books;
 //load view show_students.php and pass to it the array data
 $this->load->view('mainpahe-view',$data);
}
	public function logout()
{
	$this->session->unset_userdata('isuserloggedin');
	redirect('/library');
}


}

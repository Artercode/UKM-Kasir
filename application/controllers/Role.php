<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends MY_Controller
{
   public function __construct()
   {
      parent::__construct();
      // logged();
      $this->load->library('form_validation');
   }

   public function index($page = null)
   {
      if (!$_POST) {
         $input = (object) $this->role->getValuesRole(); // _model.php
      } else {
         $input = (object) $this->input->post(null, true);
      }

      $data['title']       = 'Role';
      $data['input']       = $input;
      $data['content']     = $this->role->paginate($page)->get();
      $data['total_rows']  = $this->role->count(); // total baris data
      $data['pagination']  = $this->role->makePagination(
         base_url('role'), // jika pakai index - setting ada di routes.php
         2, // segment url untuk halaman pagination)
         $data['total_rows']
      );
      $data['page']        = 'role/role';

      return $this->view($data);
   }
}

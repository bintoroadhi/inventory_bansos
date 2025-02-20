<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Jenis Layanan Controller
*| --------------------------------------------------------------------------
*| Jenis Layanan site
*|
*/
class Jenis_layanan extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_jenis_layanan');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Jenis Layanans
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('jenis_layanan_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['jenis_layanans'] = $this->model_jenis_layanan->get($filter, $field, $this->limit_page, $offset);
		$this->data['jenis_layanan_counts'] = $this->model_jenis_layanan->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/jenis_layanan/index/',
			'total_rows'   => $this->data['jenis_layanan_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Jenis Layanan List');
		$this->render('backend/standart/administrator/jenis_layanan/jenis_layanan_list', $this->data);
	}
	
	/**
	* Add new jenis_layanans
	*
	*/
	public function add()
	{
		$this->is_allowed('jenis_layanan_add');

		$this->template->title('Jenis Layanan New');
		$this->render('backend/standart/administrator/jenis_layanan/jenis_layanan_add', $this->data);
	}

	/**
	* Add New Jenis Layanans
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('jenis_layanan_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('jenis_layanan_nama', 'Nama Layanan', 'trim|required|max_length[255]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'jenis_layanan_nama' => $this->input->post('jenis_layanan_nama'),
				'jenis_layanan_created_at' => date('Y-m-d H:i:s'),
				'jenis_layanan_user_created' => get_user_data('username'),
			];

			
			
//$save_data['_example'] = $this->input->post('_example');
			



			
			
			$save_jenis_layanan = $id = $this->model_jenis_layanan->store($save_data);
            

			if ($save_jenis_layanan) {
				
				$id = $save_jenis_layanan;
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_jenis_layanan;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/jenis_layanan/edit/' . $save_jenis_layanan, 'Edit Jenis Layanan'),
						anchor('administrator/jenis_layanan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/jenis_layanan/edit/' . $save_jenis_layanan, 'Edit Jenis Layanan')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/jenis_layanan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/jenis_layanan');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
		/**
	* Update view Jenis Layanans
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('jenis_layanan_update');

		$this->data['jenis_layanan'] = $this->model_jenis_layanan->find($id);

		$this->template->title('Jenis Layanan Update');
		$this->render('backend/standart/administrator/jenis_layanan/jenis_layanan_update', $this->data);
	}

	/**
	* Update Jenis Layanans
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('jenis_layanan_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('jenis_layanan_nama', 'Nama Layanan', 'trim|required|max_length[255]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'jenis_layanan_nama' => $this->input->post('jenis_layanan_nama'),
				'jenis_layanan_created_at' => date('Y-m-d H:i:s'),
				'jenis_layanan_user_created' => get_user_data('username'),
			];

			

			
//$save_data['_example'] = $this->input->post('_example');
			


			
			
			$save_jenis_layanan = $this->model_jenis_layanan->change($id, $save_data);

			if ($save_jenis_layanan) {

				
				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/jenis_layanan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/jenis_layanan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/jenis_layanan');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
	/**
	* delete Jenis Layanans
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('jenis_layanan_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'jenis_layanan'), 'success');
        } else {
            set_message(cclang('error_delete', 'jenis_layanan'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Jenis Layanans
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('jenis_layanan_view');

		$this->data['jenis_layanan'] = $this->model_jenis_layanan->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Jenis Layanan Detail');
		$this->render('backend/standart/administrator/jenis_layanan/jenis_layanan_view', $this->data);
	}
	
	/**
	* delete Jenis Layanans
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$jenis_layanan = $this->model_jenis_layanan->find($id);

		
		
		return $this->model_jenis_layanan->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('jenis_layanan_export');

		$this->model_jenis_layanan->export(
			'jenis_layanan', 
			'jenis_layanan',
			$this->model_jenis_layanan->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('jenis_layanan_export');

		$this->model_jenis_layanan->pdf('jenis_layanan', 'jenis_layanan');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('jenis_layanan_export');

		$table = $title = 'jenis_layanan';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_jenis_layanan->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' => $data,
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}

	
}


/* End of file jenis_layanan.php */
/* Location: ./application/controllers/administrator/Jenis Layanan.php */
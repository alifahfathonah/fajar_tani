<?php
class Obat extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){ 
		if ( $this->session->userdata('login') == 1) {
			$data['obat'] = 'class="active"';
		    $data['title'] = 'Obat';
		    $data['data'] = $this->db->query("SELECT * FROM t_obat WHERE obat_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('obat/index');
		    $this->load->view('v_template_admin/admin_footer');

		} 
		else{
			redirect(base_url('login')); 
		}
	}  
	function add(){ 
		$kode = $_POST['obat_kode'];
		$cek = $this->db->query("SELECT * FROM t_obat WHERE obat_hapus = 0 AND obat_kode = '$kode'")->num_rows();

		if ($cek > 0) {
			$this->session->set_flashdata('gagal','Kode sudah di gunakan');
		}else{

			if (@$_FILES['obat_foto']['name']) {
			
				if($_FILES['obat_foto']['size'] <= 0){
					$this->session->set_flashdata('gagal','Foto tidak boleh lebih dari 2 MB');
					redirect(base_url('obat'));
				}
				else{

					//config uplod foto
					  $config = array(
					  'upload_path' 	=> './assets/gambar/obat',
					  'allowed_types' 	=> "gif|jpg|png|jpeg",
					  'overwrite' 		=> TRUE,
					  );

					//upload foto
					$this->load->library('upload', $config);

					if ($this->upload->do_upload('obat_foto')) {
						
						//replace Karakter name foto
						$name_foto = $_FILES['obat_foto']['name'];
						$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
				        $foto = str_replace($char, '_', $name_foto);
				        $char1 = array('[',']');
				        $foto1 = str_replace($char1, '', $foto);

				        $set = array(	
				        				'obat_foto' => $foto1,
										'obat_kode' => $kode,
										'obat_nama' => $_POST['obat_nama'],
										'obat_aturan' => $_POST['obat_aturan'],
										'obat_harga' => $_POST['obat_harga'],
										'obat_stok' => $_POST['obat_stok'],
										'obat_tanggal'	=> date('Y-m-d'),
									);

						if ($this->query_builder->add('t_obat',$set)) {
							$this->session->set_flashdata('success','Data berhasil di tambah');
						} else {
							$this->session->set_flashdata('gagal','Data gagal di tambah');
						}	
					}else{

						$this->session->set_flashdata('gagal','Data gagal di tambah');
					}
					
				}

			}else{

				$set = array(	
								'obat_kode' => $kode,
								'obat_nama' => $_POST['obat_nama'],
								'obat_aturan' => $_POST['obat_aturan'],
								'obat_harga' => $_POST['obat_harga'],
								'obat_stok' => $_POST['obat_stok'],
								'obat_tanggal'	=> date('Y-m-d'),
							);

				if ($this->query_builder->add('t_obat',$set)) {
					$this->session->set_flashdata('success','Data berhasil di tambah');
				} else {
					$this->session->set_flashdata('gagal','Data gagal di tambah');
				}	
				
			}

		}
		
		redirect(base_url('obat'));
	}
	function delete($id){
        //hapus 
        $this->db->set('obat_hapus',1);
        $this->db->where('obat_id',$id);

		if ($this->db->update('t_obat')) {
			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}

		redirect(base_url('obat'));
	}
	function update($id){
		
		if (@$_FILES['obat_foto']['name']) {
			
			if($_FILES['obat_foto']['size'] <= 0){
				$this->session->set_flashdata('gagal','Foto tidak boleh lebih dari 2 MB');
				redirect(base_url('obat'));
			}
			else{

				//config uplod foto
				  $config = array(
				  'upload_path' 	=> './assets/gambar/obat',
				  'allowed_types' 	=> "gif|jpg|png|jpeg",
				  'overwrite' 		=> TRUE,
				  );

				//upload foto
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('obat_foto')) {
					
					//replace Karakter name foto
					$name_foto = $_FILES['obat_foto']['name'];
					$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
			        $foto = str_replace($char, '_', $name_foto);
			        $char1 = array('[',']');
			        $foto1 = str_replace($char1, '', $foto);

			        $set = array(	
			        				'obat_foto' => $foto1,
									'obat_nama' => $_POST['obat_nama'],
									'obat_aturan' => $_POST['obat_aturan'],
									'obat_harga' => $_POST['obat_harga'],
									'obat_stok' => $_POST['obat_stok'],
									'obat_tanggal'	=> date('Y-m-d'),
								);

					if ($this->query_builder->update('t_obat',$set,'obat_id ='.$id)) {
						$this->session->set_flashdata('success','Data berhasil di ubah');
					} else {
						$this->session->set_flashdata('gagal','Data gagal di ubah');
					}	
				}else{
					
					$this->session->set_flashdata('gagal','Data gagal di ubah');
				}
				
			}

		}else{

			$set = array(	
							'obat_nama' => $_POST['obat_nama'],
							'obat_aturan' => $_POST['obat_aturan'],
							'obat_harga' => $_POST['obat_harga'],
							'obat_stok' => $_POST['obat_stok'],
							'obat_tanggal'	=> date('Y-m-d'),
						);

			if ($this->query_builder->update('t_obat',$set,'obat_id ='.$id)) {
				$this->session->set_flashdata('success','Data berhasil di ubah');
			} else {
				$this->session->set_flashdata('gagal','Data gagal di ubah');
			}	
			
		}

		redirect(base_url('obat'));
	}
}
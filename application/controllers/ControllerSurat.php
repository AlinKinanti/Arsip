<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerSurat extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('m_surat');
    $this->load->model('m_disposisi');
  }

  public function data_ajax($id)
  {
    $data = $this->m_surat->readSurat(FALSE, $id, FALSE);
    echo json_encode($data);
  }

  public function hapusSurat($id){
    if($this->session->userdata('statusLogin') == "loginAdmin"){
      $result = $this->m_surat->readSurat(FALSE, $id, FALSE);
      $fileSurat = ($result->fileSurat);
      unlink($fileSurat);
      $this->m_surat->deleteSurat($id);
      $this->session->set_flashdata('notisSM',
      '  <div class="alert alert-info alert-dismissible pull-right" style="width:30%; height:50px; margin:0px 0px -10px 0px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-trash"></i>Surat Berhasil Dihapus!</h4>
      </div>');
      echo json_encode(array("status" => TRUE));
    }else{
      redirect(base_url(''));
    }
  }

  public function lihatSurat($id){
    if($this->session->userdata('statusLogin') == "loginUser" || $this->session->userdata('statusLogin') == "loginAdmin" || $this->session->userdata('statusLogin') == "loginKepala"){
      $result = $this->m_surat->readSurat(FALSE, $id, FALSE);
      $fileSurat = ($result->fileSurat);
      $file = $fileSurat;
      $filename = $fileSurat;
      header('Content-type: application/pdf');
      header('Content-Disposition: inline; filename="' . $filename . '"');
      header('Content-Transfer-Encoding: binary');
      header('Accept-Ranges: bytes');
      @readfile($file);
    }else{
      redirect(base_url(''));
    }
  }


  public function daftarSuratMasuk(){
    if($this->session->userdata('statusLogin') == "loginAdmin"){
      $data['itemSurat'] = $this->m_surat->readSurat(1, FALSE, FALSE);
      $data['itemDisposisi'] = $this->m_disposisi->getAllDiposisi();
      $this->load->view('admin/a_suratMasuk', $data);
      $this->load->view('footer');
    }
    else if($this->session->userdata('statusLogin') == "loginUser"){
      $where = array(
        'kategori' => 1,
        'statusTampil' => 1
      );
      $data['itemSurat'] = $this->m_surat->readSurat(FALSE, FALSE, $where);
      $data['itemDisposisi'] = $this->m_disposisi->getAllDiposisi();
      $this->load->view('pegawai/u_suratMasuk', $data);
      $this->load->view('footer');
    }
    else if($this->session->userdata('statusLogin') == "loginKepala"){
      $where = array(
        'kategori' => 1,
        'statusTampil' => 1
      );
      $data['itemSurat'] = $this->m_surat->readSurat(FALSE, FALSE, $where);
      $data['itemDisposisi'] = $this->m_disposisi->getAllDiposisi();
      $this->load->view('kepala/k_suratMasuk', $data);
      $this->load->view('footer');
    }
    else{
      redirect(base_url(''));
    }
  }

  public function tambahSuratMasuk(){
    if($this->session->userdata('statusLogin') != "loginAdmin"){
      redirect(base_url(''));
    }else{
      $config['upload_path'] = './assets/DOKUMENSURAT/';
      $config['allowed_types'] = 'pdf';
      $config['max'] = 0;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('fileSurat')){
        $this->session->set_flashdata('notisSM',
        '<div class="alert alert-danger alert-dismissible pull-right" style="width:35%; height:50px; margin:0px 0px -10px 0px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5 style="margin-top:-8px;"><i class="icon fa fa-exclamation-circle"></i><b>Surat Gagal Disimpan!</b><br>Pastikan File berbentuk PDF dan Maksimal 20MB</h5>
        </div>');
        redirect(base_url('admin/suratMasuk'));
      }else{
       
          $bidang = '';
          $proses = '';
          $bidangSK='';

        $this->m_surat->createSurat($this->upload->data('file_name'),$this->input->post(),1,"Bakorwil", $this->input->post('pengirimTS'), $proses, $bidang, $bidangSK);
        $noSurat = $this->m_surat->getIdSurat(['noSurat'=>$this->input->post('noSuratTS')]);
       
        // auto mencreate disposisi
        $this->load->model('M_disposisi');
        $this->M_disposisi->createDisposisi($noSurat[0]->id);
        
        $this->session->set_flashdata('notisSM',
        '<div class="alert alert-info alert-dismissible pull-right" style="width:30%; height:50px; margin:0px 0px -10px 0px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i>Surat Berhasil Ditambah!</h4>
        </div>');
        redirect(base_url('admin/suratMasuk'));
      }
    }
  }


  public function editSuratMasuk()
  {
    if($this->session->userdata('statusLogin') != "loginAdmin"){
      redirect(base_url(''));
    }else{
      $checkboxProses = $this->input->post('prosesEdit');
      $checkboxBidang = $this->input->post('bidangEdit');
      if(is_null($checkboxProses)){
        $proses = "";
      }else{
        $proses = implode(",", $checkboxProses);
      }

      if(is_null($checkboxBidang)){
        $bidang = "";
      }else{
        $bidang = implode(",", $checkboxBidang);
      }

      $data = array(
          'pengirim' => $this->input->post('pengirim'),
          'tgl' => $this->input->post('tgl'),
          'tglSurat' => $this->input->post('tglSurat'),
          'perihal' => $this->input->post('perihal'),
          'keterangan' => $this->input->post('keterangan'),
          'noSurat' => $this->input->post('noSurat'),
          'statusTampil' => $this->input->post('statusTampil'),
          'sm_proses' => $proses,
          'sm_bidang' => $bidang,
        );
        $this->session->set_flashdata('notisSM',
        '  <div class="alert alert-info alert-dismissible pull-right" style="width:30%; height:50px; margin:0px 0px -10px 0px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-edit"></i>Surat Berhasil Diedit!</h4>
        </div>');
      $this->m_surat->updateSurat(array('id' => $this->input->post('id')), $data);
      echo json_encode(array("status" => TRUE));
    }
  }

  public function daftarSuratKeluar(){
    if($this->session->userdata('statusLogin') == "loginAdmin"){
      $data['itemSurat'] = $this->m_surat->readSurat(2, FALSE, FALSE);
      $this->load->view('admin/a_suratKeluar', $data);
      $this->load->view('footer');
    }
    else if($this->session->userdata('statusLogin') == "loginUser"){
      $where = array(
        'kategori' => 2,
        'statusTampil' => 1
      );
      $data['itemSurat'] = $this->m_surat->readSurat(FALSE, FALSE, $where);
      $this->load->view('pegawai/u_suratKeluar', $data);
      $this->load->view('footer');
    }
    else if($this->session->userdata('statusLogin') == "loginKepala"){
      $where = array(
        'kategori' => 2,
        'statusTampil' => 1
      );
      $data['itemSurat'] = $this->m_surat->readSurat(FALSE, FALSE, $where);
      $this->load->view('kepala/k_suratKeluar', $data);
      $this->load->view('footer');
    }
    else{
      redirect(base_url(''));
    }
  }

  public function tambahSuratKeluar(){
    if($this->session->userdata('statusLogin') != "loginAdmin"){
      redirect(base_url(''));
    }else{
      $config['upload_path'] = './assets/DOKUMENSURAT/';
      $config['allowed_types'] = 'pdf';
      $config['max'] = 0;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('fileSurat')){
        $this->session->set_flashdata('notisSM',
        '<div class="alert alert-danger alert-dismissible pull-right" style="width:35%; height:50px; margin:0px 0px -10px 0px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5 style="margin-top:-8px;"><i class="icon fa fa-exclamation-circle"></i><b>Surat Gagal Disimpan!</b><br>Pastikan File berbentuk PDF dan Maksimal 20MB</h5>
        </div>');
        redirect(base_url('admin/suratKeluar'));
      }else{
        $proses = "-";
        $bidang = "-";
        $bidangSK = $this->input->post('bidangTS');
        $this->m_surat->createSurat($this->upload->data('file_name'),$this->input->post(),2,$this->input->post('penerimaTS'),"Bakorwil", $proses, $bidang, $bidangSK);
        $this->session->set_flashdata('notisSM',
        '  <div class="alert alert-info alert-dismissible pull-right" style="width:30%; height:50px; margin:0px 0px -10px 0px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i>Surat Berhasil Ditambah!</h4>
        </div>');
        redirect(base_url('admin/suratKeluar'));
      }
    }
  }

  public function editSuratKeluar()
  {
    if($this->session->userdata('statusLogin') != "loginAdmin"){
      redirect(base_url(''));
    }else{
      $data = array(
          'penerima' => $this->input->post('penerima'),
          'tgl' => $this->input->post('tgl'),
          'tglSurat' => $this->input->post('tglSurat'),
          'perihal' => $this->input->post('perihal'),
          'keterangan' => $this->input->post('keterangan'),
          'noSurat' => $this->input->post('noSurat'),
          'statusTampil' => $this->input->post('statusTampil'),
          'sk_bidang' => $this->input->post('bidang'),
        );
        $this->session->set_flashdata('notisSM',
        '  <div class="alert alert-info alert-dismissible pull-right" style="width:30%; height:50px; margin:0px 0px -10px 0px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-edit"></i>Surat Berhasil Diedit!</h4>
        </div>');
      $this->m_surat->updateSurat(array('id' => $this->input->post('id')), $data);
      echo json_encode(array("status" => TRUE));
    }
  }
 }


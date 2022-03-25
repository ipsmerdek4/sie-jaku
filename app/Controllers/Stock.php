<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JenisKayuModel;
use App\Models\TipeKayuModel;
use App\Models\UkuranKayuModel;





class Stock extends Controller{



/*  start Jenis Kayu */
  public function jenis()
    {   

      $JenisKayuModels = new JenisKayuModel();

      $data = array(
                  'menu' => '3a',
                  'title' => 'Jenis Kayu [SIE-JAKU]', 
                  'batascss' => 'c4a',      
                  'JenisKayuModels' => $JenisKayuModels->findAll(),  

      );   

      echo view('section/header', $data);
      echo view('v_jenis_kayu', $data);
      echo view('section/footer', $data); 

    }

  public function add_jenis_kayu()
    {   
      $data = array(
      'menu' => '3a',
      'title' => 'Tambah Jenis Kayu [SIE-JAKU]', 
      'batascss' => 'c4a', 
      );   
      echo view('section/header', $data);
      echo view('v_add_jenis_kayu', $data);
      echo view('section/footer', $data); 

    }

  public function process()
    {   

        $JenisKayuModels = new JenisKayuModel();


              if (!$this->validate([
                  'jeniskayu' => [
                      'rules' => 'required|min_length[4]|max_length[100]',
                      'errors' => [
                          'required'   => 'Jenis Kayu Harus diisi',
                          'min_length' => 'Jenis Kayu Minimal 4 Karakter',
                          'max_length' => 'Jenis Kayu Maksimal 100 Karakter',  
                      ]
                  ], 
              ])) {
                  session()->setFlashdata('error', $this->validator->listErrors());
                  return redirect()->to(base_url('/jenis-kayu/add'))->withInput(); 
              } 

 
        $JenisKayuModels->insert([ 
            'nama_jenis_kayu' => $this->request->getVar('jeniskayu')
        ]);
        session()->setFlashdata('alert', 'Berhasil Menambah Data. Dengan [ Nama Kayu= '.'#'.$this->request->getVar('jeniskayu').' ]');
        return redirect()->to(base_url('jenis-kayu/'))->withInput(); 



    }

 
    public function deletedata($id = null)
    { 
         $JenisKayuModels = new JenisKayuModel(); 

        if($JenisKayuModels->find($id)){
            $JenisKayuModels->delete($id); 

            session()->setFlashdata('alert', 'Berhasil Menghapus Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('jenis-kayu'))->withInput();  
        }else{
            session()->setFlashdata('alert', 'Terjadi Kesalahan Saat Menghapus Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('jenis-kayu'))->withInput(); 
        } 
          
    }  


    public function edit($id = null)
    {


      $JenisKayuModels = new JenisKayuModel(); 
      
       $data = array(
            'menu' => '3a',
            'title' => 'Edit Jenis Kayu [SIE-JAKU]', 
            'batascss' => 'c4a', 
            'datajeniskayu' => $JenisKayuModels->find($id), 
      );   
      echo view('section/header', $data);
      echo view('v_edt_jenis_kayu', $data);
      echo view('section/footer', $data); 

    }


    
    public function editproses($id = null)
    {
              $JenisKayuModels = new JenisKayuModel(); 

              if (!$this->validate([
                  'jeniskayu' => [
                      'rules' => 'required|min_length[4]|max_length[100]',
                      'errors' => [
                          'required'   => 'Jenis Kayu Harus diisi',
                          'min_length' => 'Jenis Kayu Minimal 4 Karakter',
                          'max_length' => 'Jenis Kayu Maksimal 100 Karakter',  
                      ]
                  ], 
              ])) {
                  session()->setFlashdata('error', $this->validator->listErrors());
                  return redirect()->to(base_url('/jenis-kayu/'.$id))->withInput(); 
              } 

            $data = [
                'nama_jenis_kayu' => $this->request->getpost('jeniskayu'),
                'updated_at'     => date("Y-m-d H:i:s"),   

            ];  
            $JenisKayuModels->update($id, $data);
            
            session()->setFlashdata('alert', 'Berhasil Merubah Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('jenis-kayu'))->withInput();  
       



    }

/* END Jenis Kayu */




  /* start type kayu */
    public function tipe()
    {   

        $TipeKayus = new TipeKayuModel(); 


        $data = array(
            'menu' => '3a',
            'title' => 'Tipe Kayu [SIE-JAKU]', 
            'batascss' => 'c4b',  
            'DataTipeKayus' => $TipeKayus->getjoinall(),  

        );   
        echo view('section/header', $data);
        echo view('v_type_kayu', $data);
        echo view('section/footer', $data); 

    }

    public function add_tipe_kayu()
    {   
          $JenisKayus = new JenisKayuModel(); 


          $data = array(
              'menu' => '3a',
              'title' => 'Tambah Tipe Kayu [SIE-JAKU]', 
              'batascss' => 'c4b', 
              'dataJenisKayus' => $JenisKayus->findall(), 
          );   
          echo view('section/header', $data);
          echo view('v_add_tipe_kayu', $data);
          echo view('section/footer', $data); 

    }

    public function tipe_process()
    {    
              $TipeKayus = new TipeKayuModel();
    

              if (!$this->validate([
                  'tkayu' => [
                      'rules' => 'required|min_length[4]|max_length[100]',
                      'errors' => [
                          'required'   => 'Tipe Kayu Harus diisi',
                          'min_length' => 'Tipe Kayu Minimal 4 Karakter',
                          'max_length' => 'Tipe Kayu Maksimal 100 Karakter',  
                      ]
                  ], 
                  'jkayu' => [
                      'rules' => 'required',
                      'errors' => [
                          'required'   => 'Jenis Kayu Harus dipilih', 
                      ]
                  ], 
              ])) {
                  session()->setFlashdata('error', $this->validator->listErrors());
                  return redirect()->to(base_url('/tipe-kayu/add'))->withInput(); 
              } 
 
              $TipeKayus->insert([ 
                  'nama_tipe_kayu' => $this->request->getVar('tkayu'),
                  'id_jenis_kayu' => $this->request->getVar('jkayu')
              ]);
              session()->setFlashdata('alert', 'Berhasil Menambah Data. Dengan [ Nama Tipe = '.'#'.$this->request->getVar('tkayu').' ]');
              return redirect()->to(base_url('tipe-kayu/'))->withInput(); 

 

    }
 
    public function tipe_deletedata($id = null)
    {
        $TipeKayus = new TipeKayuModel();

        if($TipeKayus->find($id)){
            $TipeKayus->delete($id); 

            session()->setFlashdata('alert', 'Berhasil Menghapus Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('tipe-kayu'))->withInput();  
        }else{
            session()->setFlashdata('alert', 'Terjadi Kesalahan Saat Menghapus Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('tipe-kayu'))->withInput(); 
        }

    }


    public function tipe_edit($id = null)
    {
        
        $JenisKayus = new JenisKayuModel();  
        $TipeKayus = new TipeKayuModel();

 
        $data = array(
            'menu' => '3a',
            'title' => 'Tipe Kayu [SIE-JAKU]', 
            'batascss' => 'c4b',  
            'dataTipeKayus' => $TipeKayus->find($id),
            'dataJenisKayus' => $JenisKayus->findall(), 

        );   
        echo view('section/header', $data);
        echo view('v_edt_tipe_kayu', $data);
        echo view('section/footer', $data); 
    } 
 
    public function tipe_editproses($id = null)
    {
     
              $TipeKayus = new TipeKayuModel();

              if (!$this->validate([
                  'tkayu' => [
                      'rules' => 'required|min_length[4]|max_length[100]',
                      'errors' => [
                          'required'   => 'Tipe Kayu Harus diisi',
                          'min_length' => 'Tipe Kayu Minimal 4 Karakter',
                          'max_length' => 'Tipe Kayu Maksimal 100 Karakter',  
                      ]
                  ], 
                  'jkayu' => [
                      'rules' => 'required',
                      'errors' => [
                          'required'   => 'Jenis Kayu Harus dipilih', 
                      ]
                  ], 
              ])) {
                  session()->setFlashdata('error', $this->validator->listErrors());
                  return redirect()->to(base_url('/tipe-kayu/'.$id))->withInput(); 
              } 

 
            $data = [
                'nama_tipe_kayu' => $this->request->getpost('tkayu'),
                'id_jenis_kayu' => $this->request->getpost('jkayu'),
                'updated_at'     => date("Y-m-d H:i:s"),   

            ];  
            $TipeKayus->update($id, $data);
            
            session()->setFlashdata('alert', 'Berhasil Merubah Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('tipe-kayu'))->withInput();  



    }

 


/* END TYPE KAYU  */


/* START UKURAN KAYU */

  public function ukuran()
  {   
    $UkuranKayus = new UkuranKayuModel();


    $data = array(
    'menu' => '3a',
    'title' => 'Ukuran Kayu [SIE-JAKU]', 
    'batascss' => 'c4c',
    'dataUkuranKayus' => $UkuranKayus->getjoinall(),  
 
    );   
    echo view('section/header', $data);
    echo view('v_ukuran_kayu', $data);
    echo view('section/footer', $data); 

  }

  public function add_ukuran_kayu()
  {   
        $JenisKayus = new JenisKayuModel(); 
        
        $data = array(
            'menu' => '3a',
            'title' => 'Tambah Ukuran Kayu [SIE-JAKU]', 
            'batascss' => 'c4c', 
            'dataJenisKayus' => $JenisKayus->findall(), 
        );   
        echo view('section/header', $data);
        echo view('v_add_ukuran_kayu', $data);
        echo view('section/footer', $data); 

  }

  public function ukuran_process()
  {    
            if (!$this->validate([
                'ukayu' => [
                    'rules' => 'required|min_length[4]|max_length[100]',
                    'errors' => [
                        'required'   => 'Ukuran Kayu Harus diisi',
                        'min_length' => 'Ukuran Kayu Minimal 4 Karakter',
                        'max_length' => 'Ukuran Kayu Maksimal 100 Karakter',  
                    ]
                ], 
                'jkayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Jenis Kayu Harus dipilih', 
                    ]
                ], 
                'tkayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Tipe Kayu Harus dipilih', 
                    ]
                ], 
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to(base_url('/ukuran-kayu/add'))->withInput(); 
            } 

            $UkuranKayus = new UkuranKayuModel(); 
            $UkuranKayus->insert([ 
                'nama_Ukuran_kayu' => $this->request->getVar('ukayu'),
                'id_tipe_kayu' => $this->request->getVar('tkayu')
            ]);
            session()->setFlashdata('alert', 'Berhasil Menambah Data.');
            return redirect()->to(base_url('ukuran-kayu/'))->withInput(); 
       

  }

  public function ukuran_deletedata($id = null)
  {
        $UkuranKayus = new UkuranKayuModel();

        if($UkuranKayus->find($id)){
            $UkuranKayus->delete($id); 

            session()->setFlashdata('alert', 'Berhasil Menghapus Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('ukuran-kayu'))->withInput();  
        }else{
            session()->setFlashdata('alert', 'Terjadi Kesalahan Saat Menghapus Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('ukuran-kayu'))->withInput(); 
        }

  }

 
  public function ukuran_edit($id = null)
  {
        $UkuranKayus = new UkuranKayuModel(); 
        $JenisKayus = new JenisKayuModel();  
        $TipeKayus = new TipeKayuModel();


        $data1 = $UkuranKayus->where('id_ukuran_kayu', $id)->findAll();
        $data2 = $TipeKayus->where('id_tipe_kayu', $data1[0]->id_tipe_kayu)->findAll(); 
        $data3 = $JenisKayus->where('id_jenis_kayu', $data2[0]->id_jenis_kayu)->findAll(); 

  
      $data = array(
          'menu' => '3a',
          'title' => 'Tipe Kayu [SIE-JAKU]', 
          'batascss' => 'c4c',  
          'dataTipeKayus' => $data2,
          'dataTipeKayusall' => $TipeKayus->where('id_jenis_kayu', $data3[0]->id_jenis_kayu)->findAll(),
          'dataJenisKayus' => $JenisKayus->findAll(), 
          'UkuranKayus' => $data1, 

      );   
      echo view('section/header', $data);
      echo view('v_edt_ukuran_kayu', $data);
      echo view('section/footer', $data);  
       
  } 

  public function ukuran_editproses($id = null)
  {
   
 
            if (!$this->validate([
                'ukayu' => [
                    'rules' => 'required|min_length[4]|max_length[100]',
                    'errors' => [
                        'required'   => 'Ukuran Kayu Harus diisi',
                        'min_length' => 'Ukuran Kayu Minimal 4 Karakter',
                        'max_length' => 'Ukuran Kayu Maksimal 100 Karakter',  
                    ]
                ], 
                'jkayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Jenis Kayu Harus dipilih', 
                    ]
                ], 
                'tkayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Tipe Kayu Harus dipilih', 
                    ]
                ], 
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to(base_url('/ukuran-kayu/'.$id))->withInput(); 
            } 

 
          $UkuranKayus = new UkuranKayuModel();

          $data = [
              'nama_Ukuran_kayu' => $this->request->getpost('ukayu'),
              'id_tipe_kayu' => $this->request->getpost('tkayu'),
              'updated_at'     => date("Y-m-d H:i:s"),   

          ];  
          $UkuranKayus->update($id, $data);
          
          session()->setFlashdata('alert', 'Berhasil Merubah Data. Dengan [ ID = #'.$id.' ]');
          return redirect()->to(base_url('ukuran-kayu'))->withInput();  

 

  }

 
  function add_ajax_tkayu($id = null)
  { 
        $TipeKayus = new TipeKayuModel(); 
        $dataTipeKayus = $TipeKayus->where('id_jenis_kayu', $id)->findAll(); 
        $data = "<option value=''>- Select Tipe Kayu -</option>"; 
        foreach ($dataTipeKayus as $value) {
          $data .= "<option value='".$value->id_tipe_kayu."'>".$value->nama_tipe_kayu."</option>";
        } 
        echo $data; 
         
      
  }

 


/* END UKURAN KAYU  */



/*  */
  public function persediaan()
  {   
    $data = array(
            'menu' => '3a',
            'title' => 'Persedian Kayu [SIE-JAKU]', 
            'batascss' => 'c4persediaan', 
    );   
    echo view('section/header', $data);
    echo view('v_persediaan', $data);
    echo view('section/footer', $data); 

  }


  public function add_persediaan_kayu()
  {   
        
        
        $data = array(
            'menu' => '3a',
            'title' => 'Tambah Ukuran Kayu [SIE-JAKU]', 
            'batascss' => 'c4persediaan', 
             
        );   
        echo view('section/header', $data);
        echo view('v_add_persediaan', $data);
        echo view('section/footer', $data); 

  }

















}
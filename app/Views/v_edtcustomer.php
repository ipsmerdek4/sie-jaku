



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6"> 
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li> 
              <li class="breadcrumb-item"><a href="<?= base_url('customers'); ?>">Customers</a></li> 
              <li class="breadcrumb-item active">Edit Customer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

 


    <!-- Main content -->
    <div class="content">
        <div class="container"> 
            <div class="card card-dark ">
              <div class="card-header">
                <h3 class="card-title text-lg"> <b>Edit Customers</b> </h3>
              </div>
               <!-- /.card-header -->
               <div class="card-body">


                  <?php if (!empty(session()->getFlashdata('error'))) : ?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <h4>Periksa Entrian Form</h4>
                      </hr />
                      <?php echo session()->getFlashdata('error'); ?>
                  </div>
                  <?php endif; ?> 



 
                <form method="post" action="<?= base_url(); ?>/customers/u/<?=$datacustomers[0]->id_customers ?>"> 
                <?= csrf_field(); ?>
                <div class="row"> 
                    <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="username" class="form-label">Customers# <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" id="" name="customers" placeholder="Masukan Nama Singkat Customer" 
                                value="<?=$datacustomers[0]->customers?>">
                            </div> 
                            <div class="form-group">
                                <label for="username" class="form-label">Nama Lengkap <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" id="" name="nama" placeholder="Masukan Nama Lengkap Customer"  value="<?=$datacustomers[0]->nama?>">
                            </div> 
                            <div class="form-group">
                                <label for="username" class="form-label">Nomer Telp</label> 
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input name="telp" type="text" class="form-control" data-inputmask='"mask": "(+62 999) 999-9999"' data-mask placeholder="Masukan Nomer Telp" value="<?=$datacustomers[0]->telp?>">
                                </div> 
                             </div> 
                            <div class="form-group">
                                <label for="username" class="form-label">Nomer Hp <b class="text-danger">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-mobile-screen-button"></i></span>
                                    </div>
                                    <input name="hp" type="text" class="form-control" data-inputmask='"mask": "(+62 99) 999-999-999"' data-mask placeholder="Masukan Nomer Hp" value="<?=$datacustomers[0]->hp?>">
                                </div> 
                            </div> 
                            <div class="form-group">
                                <label for="username" class="form-label">Nomer WhatsApp</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-brands fa-whatsapp"></i></span>
                                    </div>
                                    <input name="wa" type="text" class="form-control" data-inputmask='"mask": "(+62 99) 999-999-999"' data-mask placeholder="Masukan Nomer WhatsApp" value="<?=$datacustomers[0]->wa?>">
                                </div> 
                            </div>  
                    </div>
                    <div class="col-md-6">  
                            <div class="form-group">
                                <label for="username" class="form-label">Provinsi <b class="text-danger">*</b></label>
                                <input type="text" name="provinsi_id" class="form-control" value="<?=$datacustomers[0]->nama_provinsi?>">

                            </div> 
                            <div class="form-group">
                                <label for="username" class="form-label">Kabupaten <b class="text-danger">*</b></label>
                                <input type="text" name="kabupaten_id" class="form-control" value="<?=$datacustomers[0]->nama_kabupaten?>"> 
                            </div> 
                            <div class="form-group">
                                <label for="username" class="form-label">Kecamatan <b class="text-danger">*</b></label>
                                <input type="text" name="kecamatan_id" class="form-control" value="<?=$datacustomers[0]->nama_kecamatan?>"> 
                            </div> 
                            <div class="form-group">
                                <label for="username" class="form-label">Desa <b class="text-danger">*</b></label>
                                <input type="text" name="desa_id" class="form-control" value="<?=$datacustomers[0]->nama_desa?>">  
                            </div> 

                            <div class="form-group">
                                <label for="username" class="form-label" >Alamat <b class="text-danger">*</b></label>
                                <textarea placeholder="Masukan Alamat Lengkap Customer" name="alamat"  class="form-control" ><?=$datacustomers[0]->alamat?></textarea> 
                            </div> 


                    </div>
                    <div class="col-md-12 "> 
                        <br><br><hr class="bg-danger">
                        <div class="form-group d-flex justify-content-center"> 
                        <button type="submit" class="btn btn-block bg-success btn-lg col-md-5"> <b> Simpan </b></button>
                        </div>
                    </div> 
                </div> 
                </form> 

              





                </div>
              <!-- /.card-body -->



            </div>

        </div>
    </div>
</div>


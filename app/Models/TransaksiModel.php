<?php 
namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model{
   
    
    protected $table = "db_transaksi";
    protected $primaryKey = "id_transaksi";
    protected $returnType = "object";
   // protected $useTimestamps = true;
    protected $allowedFields = ['kode_transaksi','id_customers','jumlah_pembelian','total_harga','id_jenis_kayu','id_tipe_kayu','id_ukuran_kayu','id_persediaan','tipe_pesanan','tgl_transaksi'];




    
     
    function getlikeall($bln1 = null, $bln2 = null, $bln3 = null)
    {
        $builder = $this->db->table('db_transaksi');
        $builder->join('db_jenis_kayu', 'db_jenis_kayu.id_jenis_kayu = db_transaksi.id_jenis_kayu');
        $builder->join('db_tipe_kayu', 'db_tipe_kayu.id_tipe_kayu = db_transaksi.id_tipe_kayu'); 
        $builder->join('db_ukuran_kayu', 'db_ukuran_kayu.id_ukuran_kayu = db_transaksi.id_ukuran_kayu'); 
        $builder->join('db_persediaan_kayu', 'db_persediaan_kayu.id_persediaan  = db_transaksi.id_persediaan '); 
        $builder->join('db_customers', 'db_customers.id_customers = db_transaksi.id_customers');


        $builder->like('tgl_transaksi', $bln1);  
        $builder->orLike('tgl_transaksi', $bln2);  
        $builder->orLike('tgl_transaksi', $bln3);  

        $builder->orderBy('tgl_transaksi', 'DESC');

        $query = $builder->get();

        return $query->getResult();
    }

    

    function getcountall($bln1 = null, $bln2 = null, $bln3 = null, $count = null)
    { 
        $builder = $this->db->table('db_transaksi');  
        $builder->select(); 
        $builder->selectCount($count);
        $builder->groupBy($count);

        $builder->like('tgl_transaksi', $bln1);  
        $builder->orLike('tgl_transaksi', $bln2);  
        $builder->orLike('tgl_transaksi', $bln3);  
        $query = $builder->get();

        return $query->getResult();
    }

    function getjoinall()
    {
        $builder = $this->db->table('db_transaksi');
        $builder->join('db_jenis_kayu', 'db_jenis_kayu.id_jenis_kayu = db_transaksi.id_jenis_kayu');
        $builder->join('db_tipe_kayu', 'db_tipe_kayu.id_tipe_kayu = db_transaksi.id_tipe_kayu'); 
        $builder->join('db_ukuran_kayu', 'db_ukuran_kayu.id_ukuran_kayu = db_transaksi.id_ukuran_kayu'); 
        $builder->join('db_persediaan_kayu', 'db_persediaan_kayu.id_persediaan = db_transaksi.id_persediaan '); 
        $builder->join('db_customers', 'db_customers.id_customers = db_transaksi.id_customers');
        $query = $builder->get();

        return $query->getResult();
    }

    function getlike($id = null)
    {
        $builder = $this->db->table('db_transaksi');
        $builder->join('db_jenis_kayu', 'db_jenis_kayu.id_jenis_kayu = db_transaksi.id_jenis_kayu');
        $builder->join('db_tipe_kayu', 'db_tipe_kayu.id_tipe_kayu = db_transaksi.id_tipe_kayu'); 
        $builder->join('db_ukuran_kayu', 'db_ukuran_kayu.id_ukuran_kayu = db_transaksi.id_ukuran_kayu'); 
        $builder->join('db_customers', 'db_customers.id_customers = db_transaksi.id_customers');

        $builder->like('nama_jenis_kayu', $id);   
        $builder->orLike('nama_tipe_kayu', $id);   
        $builder->orLike('nama_Ukuran_kayu', $id);   
        $builder->orLike('jumlah_pembelian', $id);   
        $builder->orLike('total_harga', $id);   
        $builder->orLike('kode_transaksi', $id);   
        $builder->orLike('tipe_pesanan', $id);    
        $query = $builder->get();
        
        return $query->getResult();

    }



}
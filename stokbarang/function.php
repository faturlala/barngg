<?php
session_start();
//membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","stokbarang");


if(isset($_POST['addnewbarang'])){
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];

    $cek =mysqli_query($conn,"select * from stock where namabarang='$namabarang'");
    $hitung = mysqli_num_rows($cek);

    //soal gambar
    $allowed_extension=array('xls','xlsx','csv','doc','jpg');
    $nama =$_FILES['file']['name'];
    $dot = explode('.',$nama);
    $ekstensi = strtolower(end($dot));
    $ukuran = $_FILES['file']['size'];
    $file_tmp =$_FILES['file']['tmp_name'];
    //penamaan file -> enkripsi
    $image=md5(uniqid($nama,true).time()).'.'.$ekstensi; //menggabungkan nama file yg dienkripsi dgn ekstensinya
    //validasi
    $cek =mysqli_query($conn,"select * from stock where namabarang='$namabarang'");
    $hitung =mysqli_num_rows($cek);

    if($hitung<1){
    //proses upload
    if(in_array($ekstensi, $allowed_extension) === true){
        //validasi ukuran
        if($ukuran <15000000){
            move_uploaded_file($file_tmp,'images/'.$image);
            $addtotable = mysqli_query($conn,"insert into stock (namabarang, deskripsi, stock, image) values('$namabarang','$deskripsi','$stock','$image')");
    if($addtotable){
        echo 'succes input data';
        header('location:index.php');
    } else {
        echo 'input gagal silahkan cek kembali';
        header('location:index.php');
    }
        }else {
            echo '<script> alert("Ukuran Terlalu Besar");
            window.location.href="index.php";
            </script>';
        }
    } else {
        echo '<script> alert("File tidak sesuai");
        window.location.href="index.php";
        </script>';
    }
} else {
    echo '<script> alert("Nama Barang Sudah Terdaftar");
    window.location.href="index.php";
    </script>';
}
};
if(isset($_POST['barangmasuk'])){
    $barangnya = $_POST['barangnya'];
    $keterangan = $_POST['keterangan'];
    $qty = $_POST['qty'];

    $cekstoksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstoksekarang);

    $stoksekarang = $ambildatanya['stock'];
    $tambahkanstoksekarangdenganquantity = $stoksekarang+$qty;

    $addtomasuk = mysqli_query($conn,"insert into masuk(idbarang, keterangan, qty) values('$barangnya','$keterangan','$qty')");
    $updatestokmasuk = mysqli_query($conn,"update stock set stock='$tambahkanstoksekarangdenganquantity' where idbarang='$barangnya'");
    if($addtomasuk&&$updatestokmasuk){
        echo 'succes input data';
        header('location:masuk.php');
    } else {
        echo '<script> alert("isi data dengan benar!");
    window.location.href="masuk.php";
    </script>';
    }
}

if(isset($_POST['addbarangkeluar'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstoksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstoksekarang);

    $stoksekarang = $ambildatanya['stock'];
    $tambahkanstoksekarangdenganquantity = $stoksekarang-$qty;

    $addtokeluar = mysqli_query($conn,"insert into keluar(idbarang, penerima, qty) values('$barangnya','$penerima','$qty')");
    $updatestokmasuk = mysqli_query($conn,"update stock set stock='$tambahkanstoksekarangdenganquantity' where idbarang='$barangnya'");
    if($addtokeluar&&$updatestokmasuk){
        echo 'succes input data';
        header('location:keluar.php');
    } else {
        echo '<script> alert("isi data dengan benar!");
    window.location.href="keluar.php";
    </script>';
    }
}


//update barang
if(isset($_POST['updatebarang'])){
    $idb =$_POST['idb'];
    $namabarang =$_POST['namabarang'];
    $deskripsi =$_POST['deskripsi'];

    //soal gambar
    $allowed_extension=array('xls','xlsx','csv','doc','jpg');
    $nama =$_FILES['file']['name'];
    $dot = explode('.',$nama);
    $ekstensi = strtolower(end($dot));
    $ukuran = $_FILES['file']['size'];
    $file_tmp =$_FILES['file']['tmp_name'];
    //penamaan file -> enkripsi
    $image=md5(uniqid($nama,true).time()).'.'.$ekstensi; //menggabungkan nama file yg dienkripsi dgn ekstensinya
    if($ukuran==0){
        //jika tdk ingin        
    $update =mysqli_query($conn,"update stock set namabarang='$namabarang',deskripsi='$deskripsi' where idbarang='$idb'");
    if($update){
        header('location:index.php');
    } else {
        echo 'gagal menghapus';
        header('location:index.php');
    }
    } else {
        //jika ingin 
    move_uploaded_file($file_tmp,'images/'.$image);       
    $update =mysqli_query($conn,"update stock set namabarang='$namabarang', deskripsi='$deskripsi', image='$image' where idbarang='$idb'");
    if($update){
        header('location:index.php');
    } else {
        echo 'gagal menghapus';
        header('location:index.php');
    }
    }
}

//menghapus data
if(isset($_POST['hapusbarang'])){
    $idb = $_POST['idb'];

    $gambar= mysqli_query($conn,"delete from stock where idbarang='$idb'");
    $get= mysqli_fetch_array($gambar);
    $img= 'images/'.$get['image'];
    unlink($img);

    $hapus = mysqli_query($conn,"delete from stock where idbarang='$idb'");
    if($hapus){
        header('location:index.php');
    } else {
        echo 'gagal menghapus';
        header('location:index.php');
    }
}

//mengubah data masuk
if(isset($_POST['updatebarangmasuk'])){
    $idb =$_POST['idb'];
    $idm =$_POST['idm'];
    $keterangan =$_POST['keterangan'];
    $qty =$_POST['qty'];

    $lihatstock= mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $stocknya=mysqli_fetch_array($lihatstock);
    $stockskrg= $stocknya['stock'];

    $qtyskrg=mysqli_query($conn,"select * from masuk where idmasuk='$idm'");
    $qtynya=mysqli_fetch_array($qtyskrg);
    $qtyskrg= $qtynya['qty'];

    if($qty>$qtyskrg){
        $selisih=$qty-$qtyskrg;
        $kurangin=$stockskrg+$selisih;
        $kurangistocknya=mysqli_query($conn,"update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya=mysqli_query($conn,"update masuk set qty='$qty', keterangan='$keterangan' where idmasuk='$idm'");
            if($kurangistocknya&&$updatenya){
                header('location:masuk.php');
    } else {
        echo 'gagal update';
        header('location:masuk.php');
            }
    }   else{
        $selisih=$qtyskrg-$qty;
        $kurangin=$stockskrg-$selisih;
        $kurangistocknya=mysqli_query($conn,"update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya=mysqli_query($conn,"update masuk set qty='$qty', keterangan='$keterangan' where idmasuk='$idm'");
            if($kurangistocknya&&$updatenya){
                header('location:masuk.php');
    } else {
        echo 'gagal update';
        header('location:masuk.php');
            }
    }
}

if(isset($_POST['hapusbarangmasuk'])){
    $idb =$_POST['idb'];
    $idm =$_POST['idm'];
    $qty =$_POST['kty'];

    $getdatastock =mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $data=mysqli_fetch_array($getdatastock);
    $stok=$data['stock'];

    $selisih=$stok-$qty;

    $update= mysqli_query($conn,"update stock set stock='$selisih' where idbarang='$idb'");
    $hapusdata= mysqli_query($conn,"delete from masuk where idmasuk='$idm'");

    if($update&&$hapusdata){
        header('location:masuk.php');
    } else {
        header('location:masuk.php');
    }
}


//mengubah data keluar
if(isset($_POST['updatebarangkeluar'])){
    $idb =$_POST['idb'];
    $idk =$_POST['idk'];
    $penerima =$_POST['penerima'];
    $qty =$_POST['qty'];

    $lihatstock= mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $stocknya=mysqli_fetch_array($lihatstock);
    $stockskrg= $stocknya['stock'];

    $qtyskrg=mysqli_query($conn,"select * from keluar where idkeluar='$idk'");
    $qtynya=mysqli_fetch_array($qtyskrg);
    $qtyskrg= $qtynya['qty'];

    if($qty>$qtyskrg){
        $selisih=$qty-$qtyskrg;
        $kurangin=$stockskrg-$selisih;
        $kurangistocknya=mysqli_query($conn,"update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya=mysqli_query($conn,"update keluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");
            if($kurangistocknya&&$updatenya){
                header('location:keluar.php');
    } else {
        echo 'gagal update';
        header('location:keluar.php');
            }
    }   else{
        $selisih=$qtyskrg-$qty;
        $kurangin=$stockskrg+$selisih;
        $kurangistocknya=mysqli_query($conn,"update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya=mysqli_query($conn,"update keluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");
            if($kurangistocknya&&$updatenya){
                header('location:keluar.php');
    } else {
        echo 'gagal update';
        header('location:keluar.php');
            }
    }
}

if(isset($_POST['hapusbarangkeluar'])){
    $idb =$_POST['idb'];
    $idk =$_POST['idk'];
    $qty =$_POST['kty'];

    $getdatastock =mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $data=mysqli_fetch_array($getdatastock);
    $stok=$data['stock'];

    $selisih=$stok+$qty;

    $update= mysqli_query($conn,"update stock set stock='$selisih' where idbarang='$idb'");
    $hapusdata= mysqli_query($conn,"delete from keluar where idkeluar='$idk'");

    if($update&&$hapusdata){
        header('location:keluar.php');
    } else {
        header('location:keluar.php');
    }
}

//menambah admin baru
if(isset($_POST['addnewadmin'])){
    $email =$_POST['email'];
    $password =$_POST['password'];

    $queryinsert = mysqli_query($conn,"insert into login (email,password) values ('$email','$password')");

    if($queryinsert){
        header('location:admin.php');
    }else{
        echo '<script> alert("isi data dengan benar!");
    window.location.href="index.php";
    </script>';
    }
}

//update admin baru
if(isset($_POST['updateadmin'])){
    $emailbaru =$_POST['emailadmin'];
    $passwordbaru =$_POST['passwordbaru'];
    $idnya = $_POST['id'];

    $queryupdate = mysqli_query($conn,"update login set email='$emailbaru' , password='$passwordbaru' where iduser='$idnya'");

    if($queryupdate){
        header('location:admin.php');
    }else{
        echo '<script> alert("isi data dengan benar!");
    window.location.href="index.php";
    </script>';
    }
}

//update admin baru
if(isset($_POST['hapusadmin'])){
    $id =$_POST['id'];

    $querydelete = mysqli_query($conn,"delete from login where iduser='$id'");
    
    if($querydelete){
        header('location:admin.php');
    }else{
        header('location:admin.php');
    }
}

?>
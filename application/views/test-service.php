<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
    <!-- customer -->
    <!-- input/update customer -->
    <!-- <form action="<?php echo base_url(); ?>customer/manageCustomer" method='POST'>
        <input type="text" name="id" placeholder="id"><br>
        <input type="text" name="name" placeholder="nama"><br>
        <input type="text" name="phone_number" placeholder="nomor telpon"><br>
        <input type="text" name="address" placeholder="alamat"><br>
        <input type="submit" name="submit">
    </form> -->

    <!-- delete customer -->
    <!-- <a href="<?php echo base_url(); ?>customer/deleteCustomer/C00001">Hapus</a> -->

    <!-- get customer -->
    <!-- <a href="<?php echo base_url(); ?>customer/getCustomer/C00001">Get data</a> -->

    <!-- input bahan -->
    <!-- <?php echo form_open_multipart('Gudang_bahan/tambahBahan');?>
    <input type="text" name="name" placeholder="name"><br>
    <input type="text" name="unit" placeholder="unit"><br>
    <input type="text" name="stock" placeholder="Stok"><br>
    <input type="text" name="price" placeholder="harga satuan"><br>
    <input type="text" name="origin" placeholder="asal"><br>
    <input type="text" name="type" placeholder="kategori"><br>
    <input type='file' name='image'><br>
    <input type="submit" name="submit"> -->
    
    <!-- edit bahan -->
    <?php echo form_open_multipart('Gudang_bahan/ubahBahan/8');?>
    <h1>edit bahan</h1>
    <input type="text" name="name" placeholder="name"><br>
    <input type="text" name="unit" placeholder="unit"><br>
    <input type="text" name="stock" placeholder="Stok"><br>
    <input type="text" name="price" placeholder="harga satuan"><br>
    <input type="text" name="origin" placeholder="asal"><br>
    <input type="text" name="type" placeholder="kategori"><br>
    <input type='file' name='image'><br>
    <input type="submit" name="submit">

    <!-- login -->
    <!-- <form action="<?php echo base_url(); ?>Auth/login" method='POST'>
        <h1>Login</h1>
        <input type="text" name="email" placeholder="email"><br>
        <input type="password" name="password" placeholder="password"><br>
        <input type="submit" name="login" value="login">
    </form> -->
             
    <!-- logout -->
    <a href="<?php echo base_url(); ?>Auth/logout">Logout</a>
</body>
</html
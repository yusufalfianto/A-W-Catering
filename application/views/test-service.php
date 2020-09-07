<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
    <!-- input/update customer ---------------------------------------------------------------------------------->
    <!-- <form action="<?php echo base_url(); ?>customer/manageCustomer" method='POST'>
        <input type="text" name="id" placeholder="id"><br>
        <input type="text" name="name" placeholder="nama"><br>
        <input type="text" name="phone_number" placeholder="nomor telpon"><br>
        <input type="text" name="address" placeholder="alamat"><br>
        <input type="submit" name="submit">
    </form> -->

    <!-- delete customer ---------------------------------------------------------------------------------->
    <!-- <a href="<?php echo base_url(); ?>customer/deleteCustomer/C00001">Hapus</a> -->

    <!-- get customer ---------------------------------------------------------------------------------->
    <!-- <a href="<?php echo base_url(); ?>customer/dataCustomer/C00002">Get data</a> -->

    <!-- input bahan ---------------------------------------------------------------------------------->
    <!-- <?php echo form_open_multipart('Gudang_bahan/tambahBahan');?>
    <input type="text" name="name" placeholder="name"><br>
    <input type="text" name="unit" placeholder="unit"><br>
    <input type="text" name="stock" placeholder="Stok"><br>
    <input type="text" name="price" placeholder="harga satuan"><br>
    <input type="text" name="origin" placeholder="asal"><br>
    <input type="text" name="type" placeholder="kategori"><br>
    <input type='file' name='image'><br>
    <input type="submit" name="submit"> -->
    
    <!-- edit bahan ---------------------------------------------------------------------------------->
    <!-- <?php echo form_open_multipart('Gudang_bahan/ubahBahan/8');?>
    <h1>edit bahan</h1>
    <input type="text" name="name" placeholder="name"><br>
    <input type="text" name="unit" placeholder="unit"><br>
    <input type="text" name="stock" placeholder="Stok"><br>
    <input type="text" name="price" placeholder="harga satuan"><br>
    <input type="text" name="origin" placeholder="asal"><br>
    <input type="text" name="type" placeholder="kategori"><br>
    <input type='file' name='image'><br>
    <input type="submit" name="submit"> -->
    
    <!-- tambah admin ---------------------------------------------------------------------------------->
    <!-- <form action="<?php echo base_url(); ?>Admin/tambahAdmin" method='POST'>
        <h1>tambah admin</h1>
        <input type="text" name="name" placeholder="name"><br>
        <input type="text" name="email" placeholder="email"><br>
        <input type="text" name="phone" placeholder="phone"><br>
        <input type="text" name="role_name" placeholder="role"><br>
        <input type="checkbox" name="roles[]" value="1">
        <label for="pesanan">pesanan</label>
        <input type="checkbox" name="roles[]" value="2">
        <label for="bhn_makanan">bahan makanan</label>
        <input type="checkbox" name="roles[]" value="3">
        <label for="mnu_makanan">menu makanan</label>
        <input type="checkbox" name="roles[]" value="4">
        <label for="customer">customer</label><br>
        <input type="submit" name="submit"><br>
    </form> -->

    <!-- edit admin ---------------------------------------------------------------------------------->
    <!-- <form action="<?php echo base_url(); ?>Admin/ubahAdmin/8" method='POST'>
        <h1>tambah admin</h1>
        <input type="text" name="name" placeholder="name"><br>
        <input type="text" name="email" placeholder="email"><br>
        <input type="text" name="phone" placeholder="phone"><br>
        <input type="text" name="role_name" placeholder="role"><br>
        <input type="checkbox" name="roles[]" value="1">
        <label for="pesanan">pesanan</label>
        <input type="checkbox" name="roles[]" value="2">
        <label for="bhn_makanan">bahan makanan</label>
        <input type="checkbox" name="roles[]" value="3">
        <label for="mnu_makanan">menu makanan</label>
        <input type="checkbox" name="roles[]" value="4">
        <label for="customer">customer</label><br>
        <input type="submit" name="submit"><br>
    </form> -->
    
    <!-- edit profile ---------------------------------------------------------------------------------->
    <!-- <?php echo form_open_multipart('Profile/ubahProfil');?>
    <h1>Edit profile</h1>
    <input type="text" name="name" placeholder="name"><br>
    <input type="password" name="password" placeholder="password"><br>
    <input type="text" name="adm_email" placeholder="email"><br>
    <input type="text" name="phone" placeholder="phone"><br>
    <input type='file' name='image'><br>
    <input type="submit" name="submit"><br>
    <?php?> -->
    
    <!-- login ---------------------------------------------------------------------------------->
    <form action="<?php echo base_url(); ?>Auth/login" method='POST'>
        <h1>Login</h1>
        <input type="text" name="email" placeholder="email"><br>
        <input type="password" name="password" placeholder="password"><br>
        <input type="submit" name="login" value="login">
    </form>
             
    <!-- logout ---------------------------------------------------------------------------------->
    <br><br><br>
    <a href="<?php echo base_url(); ?>Auth/logout">Logout</a>
</body>
</html
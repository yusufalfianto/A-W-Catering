<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
    <!-- input/update customer ---------------------------------------------------------------------------------->
    <!-- <form action="<?php echo base_url(); ?>customer/manageCustomer" method='POST'>
        <input type="text" name="name" placeholder="nama"><br>
        <input type="text" name="phone_number" placeholder="nomor telpon"><br>
        <input type="text" name="address" placeholder="alamat"><br>
        <input type="text" name="type" placeholder="Tipe Customer"><br>
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
    <input type="text" name="brand" placeholder="Merek"><br>
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

    <!-- tambah menu ------------------------------------------------------------------------------->
    <!-- <?php echo form_open_multipart('Food_menu/tambahMenu');?>
    <input type="text" name="menu_name" placeholder="nama"><br>
    <input type="text" name="menu_type" placeholder="Tipe Makanan"><br>
    <input type="text" name="menu_unit" placeholder="Satuan"><br>
    <input type="text" name="price" placeholder="Price"><br>
    <div style="display:flex; margin-right:50px;">
        <input type="text" name="ingrdnt_id[]" placeholder="Id Bahan"><br>
        <input type="text" name="ingrdnt_unit[]" placeholder="Satuan"><br>
        <input type="text" name="ingrdnt_amount[]" placeholder="Takaran"><br>
    </div>
    <div style="display:flex; margin-right:50px;">
        <input type="text" name="ingrdnt_id[]" placeholder="Id Bahan"><br>
        <input type="text" name="ingrdnt_unit[]" placeholder="Satuan"><br>
        <input type="text" name="ingrdnt_amount[]" placeholder="Takaran"><br>
    </div>
    <div style="display:flex; margin-right:50px;">
        <input type="text" name="ingrdnt_id[]" placeholder="Id Bahan"><br>
        <input type="text" name="ingrdnt_unit[]" placeholder="Satuan"><br>
        <input type="text" name="ingrdnt_amount[]" placeholder="Takaran"><br>
    </div>
    <input type='file' name='image'><br>
    <input type="submit" name="submit"> -->
    
    <!-- login ---------------------------------------------------------------------------------->
    <!-- <form action="<?php echo base_url(); ?>Auth/login" method='POST'>
        <h1>Login</h1>
        <input type="text" name="email" placeholder="email"><br>
        <input type="password" name="password" placeholder="password"><br>
        <input type="submit" name="login" value="login">
    </form> -->

    <!-- update menu ------------------------------------------------------------------------------->
    <!-- <?php echo form_open_multipart('Food_menu/ubahMenu/17');?>
    <input type="text" name="menu_name" placeholder="nama"><br>
    <input type="text" name="menu_type" placeholder="Tipe Makanan"><br>
    <input type="text" name="menu_unit" placeholder="Satuan"><br>
    <input type="text" name="price" placeholder="Price"><br>
    <div style="display:flex; margin-right:50px;">
        <input type="text" name="ingrdnt_id[]" placeholder="Id Bahan"><br>
        <input type="text" name="ingrdnt_unit[]" placeholder="Satuan"><br>
        <input type="text" name="ingrdnt_amount[]" placeholder="Takaran"><br>
    </div>
    <div style="display:flex; margin-right:50px;">
        <input type="text" name="ingrdnt_id[]" placeholder="Id Bahan"><br>
        <input type="text" name="ingrdnt_unit[]" placeholder="Satuan"><br>
        <input type="text" name="ingrdnt_amount[]" placeholder="Takaran"><br>
    </div>
    <div style="display:flex; margin-right:50px;">
        <input type="text" name="ingrdnt_id[]" placeholder="Id Bahan"><br>
        <input type="text" name="ingrdnt_unit[]" placeholder="Satuan"><br>
        <input type="text" name="ingrdnt_amount[]" placeholder="Takaran"><br>
    </div>
    <input type='file' name='image'><br>
    <input type="submit" name="submit"> -->
    
    <!-- lupa password ---------------------------------------------------------------------------------->
    <!-- <form action="<?php echo base_url(); ?>Auth/sendNewPassword" method='POST'>
        <input type="text" name="email" placeholder="email"><br>
        <input type="submit" name="login" value="kirim password">
    </form> -->

    <!-- tambah Pesanan ---------------------------------------------------------------------------------->
    <?php echo form_open_multipart('Pesanan/tambahPesanan');?>
    <input type="text" name="customer_type" placeholder="Tipe customer"><br>
    <input type="text" name="customer_id" placeholder="Id customer"><br>
    <input type="text" name="customer_name" placeholder="Nama customer"><br>
    <input type="text" name="address" placeholder="Alamat"><br>
    <input type="text" name="phone" placeholder="Nomor telpon"><br>
    <div style="display:flex; margin-right:50px;"> -->
        <input type="date" name="from_date" placeholder="Tanggal dan waktu kirim">
        <p> TO </p>
        <input type="date" name="to_date" placeholder="Tanggal dan waktu kirim">
        <!-- <input type="date" name="finish_date" placeholder="Tanggal dan waktu kirim"> -->
    </div>
    <div style="display:flex; margin-right:50px;">
        <input type="text" name="menu_id[]" placeholder="Menu makanan"><br>
        <input type="text" name="unit_price[]" placeholder="Harga satuan"><br>
        <input type="text" name="menu_amount[]" placeholder="Jumlah porsi"><br>
        <input type="text" name="sub_tot_price[]" placeholder="subtotal"><br>
    </div>
    <div style="display:flex; margin-right:50px;">
        <input type="text" name="menu_id[]" placeholder="Menu makanan"><br>
        <input type="text" name="unit_price[]" placeholder="Harga satuan"><br>
        <input type="text" name="menu_amount[]" placeholder="Jumlah porsi"><br>
        <input type="text" name="sub_tot_price[]" placeholder="subtotal"><br>
    </div>
    <div style="display:flex; margin-right:50px;">
        <input type="text" name="menu_id[]" placeholder="Menu makanan"><br>
        <input type="text" name="unit_price[]" placeholder="Harga satuan"><br>
        <input type="text" name="menu_amount[]" placeholder="Jumlah porsi"><br>
        <input type="text" name="sub_tot_price[]" placeholder="subtotal"><br>
    </div>
    <div style="display:flex; margin-right:50px;">
        <input type="text" name="total_amount" placeholder="Total porsi"><br>
        <input type="text" name="total_price" placeholder="Harga total"><br>
    </div>
    <input type="submit" name="submit">
    
    <!-- update status ---------------------------------------------------------------------------------->
    <!-- <form action="<?php echo base_url(); ?>Pesanan/ubahStatus/2" method='POST'>
        <input type="text" name="status" placeholder="status"><br>
        <input type="submit" name="login">
    </form> -->

    <!-- login ---------------------------------------------------------------------------------->
    <!-- <form action="<?php echo base_url(); ?>Auth/login" method='POST'>
        <h1>Login</h1>
        <input type="text" name="email" placeholder="email"><br>
        <input type="password" name="password" placeholder="password"><br>
        <input type="submit" name="login" value="login">
    </form> -->
             
    <!-- logout ---------------------------------------------------------------------------------->
    <br><br><br>
    <a href="<?php echo base_url(); ?>Auth/logout">Logout</a>
</body>
</html
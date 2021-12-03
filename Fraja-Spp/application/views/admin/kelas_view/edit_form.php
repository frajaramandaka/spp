<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body class="animsition">
    <div class="page-wrapper">

        <!-- MENU SIDEBAR-->
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php $this->load->view("admin/_partials/navbar.php") ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="card mb-3">
                        <div class="card-header">
                             <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        </div>
                        </div>
                   
                        <div class="card mb-3">
                        <div class="card-header">
                            <a href="<?php echo site_url('admin/kelas/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="<?php base_url(" admin/kelas/edit") ?>" method="post"
                            enctype="multipart/form-data" >

                            <input type="hidden" name="id" value="<?php echo $kelas->id_kelas?>" />

                            <div class="form-group">
                                <label for="nama_kelas">Nama Kelas*</label>
                                <input class="form-control <?php echo form_error('nama_kelas') ? 'is-invalid':'' ?>"
                                 type="text" name="nama_kelas" placeholder="Nama Kelas" value="<?php echo $kelas->nama_kelas ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('nama_kelas') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kompetensi_keahlian">Pilih Kompetensi Keahlian*</label>
                                    <select class="form-control" name="id_kk" id="id_kk" required>
                                       <option value="">Pilih Kompetensi Keahlian</option>
                                            <?php foreach ($id_kk as $row) { ?>
                                        <option <?php if($row->id_kk ==$kelas->id_kk){ echo 'selected="selected"'; } ?> 
                                            value="<?php echo $row->id_kk ?>"><?php echo $row->nama_kk?> </option>
                                            <?php } ?>
                                    </select>
                            </div>
                                    
                                
                            </div>

                            <input class="btn btn-success" type="submit" name="btn" value="Save" />
                            </form>
                        </div>
                        <div class="card-footer small text-muted">
                            * required fields
                        </div>
                    </div>
                    <?php $this->load->view("admin/_partials/footer.php") ?>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <?php $this->load->view("admin/_partials/js.php") ?>
    <!-- <?php //$this->load->view("admin/_partials/scrolltop.php") ?>
     --><?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
<!-- end document-->

<!doctype html>
<html>
    <head>
        <title>Role Operator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Role Operator</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('role_operator/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <form action="<?php echo site_url('role_operator/search'); ?>" class="form-inline" method="post">
                    <input name="keyword" class="form-control" value="<?php echo $keyword; ?>" />
                    <?php 
                    if ($keyword <> '')
                    {
                        ?>
                        <a href="<?php echo site_url('role_operator'); ?>" class="btn btn-default">Reset</a>
                        <?php
                    }
                    ?>
                    <input type="submit" value="Search" class="btn btn-primary" />
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama role operator</th>
		<th>Action</th>
            </tr><?php
            foreach ($role_operator_data as $role_operator)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td><?php echo $role_operator->nama_role_operator ?></td>
			<td style="text-align:center">
				<?php 
				echo anchor(site_url('role_operator/update/'.$role_operator->id_role_operator),'Update'); 
				echo ' | '; 
				echo anchor(site_url('role_operator/delete/'.$role_operator->id_role_operator),'Delete','onclick="javasciprt: return confirm(\'Anda Yakin ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <ul class="pagination" style="margin-top: 0px">
                    <li class="active"><a href="#">Total Record : <?php echo $total_rows ?></a></li>
                </ul>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
<?php
$userinformation = $this->item_model->fetch('accounts', array('user_id' => $this->session->uid))[0];
?>
<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							<center>
							<div class="panel-title">
							 Hello <?= $userinformation->firstname?>!
							</div>
							<img src = "<?= base_url() ?>uploads/<?= $userinformation->image ?>" class = "img-circle" width = "250" height = "250"/>
							</center>
							<div class="panel-body">
								<!-- status -->
								<div class="contain">	
									<div class="gantt"></div>
								</div>
								<!-- status -->
							</div>
						</div>
					</div>
			
						
    <script src="<?php echo $this->config->base_url() ?>js/scripts.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $this->config->base_url() ?>js/bootstrap.min.js"></script>
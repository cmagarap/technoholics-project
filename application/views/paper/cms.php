<div class="content">
 <div class="container-fluid">
            <div class="col-md-12">
                <div class="card" style = "padding: 30px">
                    <div class="header">
                        <div align = "left">
                            
                            <a href = "<?= $this->config->base_url() ?>Cms/database_backup" class="btn btn-info btn-fill" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;" title = "Export Database">Backup Database</a>


                        		</div>
                   		 </div>
										<br>
           						<h4 class="title"><b>Edit Sliding Images</b></h4>




           				</div>   


        </div>
        <form action = "<?= $this->config->base_url() ?>Cms/edit_images/" method = "POST" enctype = "multipart/form-data">
        	<div class = "col-md-12">
        	Image 1
        			<div id="filediv"><input name="user_file[]" type="file" id="file"/></div><br>
        	</div>

			<div class = "col-md-12">
        	Image 2
        			<div id="filediv"><input name="user_file[]" type="file" id="file"/></div><br>
        	</div>

        	<div class = "col-md-12">
        	Image 3
        			<div id="filediv"><input name="user_file[]" type="file" id="file"/></div><br>
        	</div>

        	 <div align = "left">
                            
                             <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;">Edit Picture Slider</button>


                        		</div>
                 </form>
   </div>

</div>


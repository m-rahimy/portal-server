    <div class="container top">

      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a>
          <span class="divider">/</span>
        </li>
        <li>
          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>">
            <?php echo ucfirst($this->uri->segment(2));?>
          </a>
          <span class="divider">/</span>
        </li>
        <li class="active">
          <a href="#">ویرایش</a>
        </li>
      </ul>

      <div class="page-header">
        <h2>
          در حال ویرایش <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>

		<?php
			/*$checkedAv = $product[0]['is_available']?'checked':'';
			$checkedNew = $product[0]['is_new']?'checked':''; */
		?>
      <?php
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>بسیار عالی!</strong> updated with success.';
          echo '</div>';
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';
        }
      }
      ?>


      <?php
      //form data
      $attributes = array('class' => 'form-horizontal', 'id' => '');
      // $options_category = array('' => "Select");
      // foreach ($categories as $row)
      // {
      //   $options_category[$row['_id_']] = $row['name'];
      // }

      //form validation
      echo validation_errors();

      echo form_open('admin/cols/update/'.$this->uri->segment(4).'', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">نام</label>
            <div class="controls">
              <input type="text" id="" name="name" value="<?php echo $col_titles[0]['name']; ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>

          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
<!--
            <button class="btn" type="reset">Cancel</button>
-->
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>

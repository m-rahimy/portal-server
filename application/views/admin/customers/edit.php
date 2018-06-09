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
			//$checkedAv = $product[0]['is_available']?'checked':''; 
			//$checkedNew = $product[0]['is_new']?'checked':''; 
		?>
      <?php
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>بسیار عالی!</strong> product updated with success.';
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
      $phone_numbers = array('' => "Select");
      foreach ($phones as $row)
      {
        $phone_numbers[] = $row;
      }

      //form validation
      echo validation_errors();
      echo form_open('admin/customers/update/'.$this->uri->segment(4).'', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">نام کاربری</label>
            <div class="controls">
              <input type="text" id="" name="username" value="<?php echo $customer[0]['username']; ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">نام کامل</label>
            <div class="controls">
              <input type="text" id="" name="complete_name" value="<?php echo $customer[0]['complete_name']; ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>       
             
          <div class="control-group">
            <label for="inputError" class="control-label">کد ملی</label>
            <div class="controls">
              <input type="text" id="" name="national_code" value="<?php echo $customer[0]['national_code']; ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>       
<!--
             
          <div class="control-group">
            <label for="inputError" class="control-label">موجود است؟</label>
            <div class="controls">
				<input type="checkbox" name="is_available" value="1" <?php echo $checkedAv;?> >
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">جدید است؟</label>
            <div class="controls">
			<input type="checkbox" name="is_new" value="1" <?php echo $checkedNew;?> >
            </div>
          </div>
-->
<!--
          
          <div class="control-group">
            <label for="inputError" class="control-label">آدرس تصویر</label>
            <div class="controls">
              <input type="text" id="" name="picture_address" value="<?php echo $customer[0]['picture_address']; ?>">
            </div>
          </div>  
-->
          
          <?php
          echo '<div class="control-group">';
            echo '<label for="category_id" class="control-label">تلفن‌ها</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');
              
              echo form_dropdown('category_id', $phone_numbers, '', 'class="span2"');

            echo '</div>';
          echo '</div">';
          ?>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <button class="btn" type="reset">Cancel</button>
          </div>
        </fieldset>

      <?php echo form_close(); ?>
      
<!--
      <img src="<?php echo base_url().'images/'.$customer[0]['picture_address']; ?>" alt="alt of image here" style="position:absolute; right:150px; top:248px"/>
-->
    </div>
     

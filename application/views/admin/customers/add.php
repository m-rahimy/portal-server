    <div class="container top insert-main">
      
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
          <a href="#">جدید</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          در حال درج <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>
 
      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>بسیار عالی!</strong> درج محصول موفق بود.';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>خطا!</strong> نشد.';
          echo '</div>';          
        }
      }
      ?>
      
      <?php
      //form data
      $attributes = array('class' => 'form-horizontal', 'id' => '');
      $options_category = array('' => "Select");
      foreach ($categories as $row)
      {
        $options_category[$row['_id_']] = $row['name'];
      }

      //form validation
      echo validation_errors();
      
      echo form_open('admin/products/add', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">نام</label>
            <div class="controls">
              <input type="text" id="" name="name" value="<?php echo set_value('name'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">قیمت</label>
            <div class="controls">
              <input type="text" id="" name="price" value="<?php echo set_value('price'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>        
            
         <div class="control-group">
            <label for="inputError" class="control-label">موجود است؟</label>
            <div class="controls">
				<input type="checkbox" name="is_available" value="1" checked>
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">جدید است؟</label>
            <div class="controls">
			<input type="checkbox" name="is_new" value="1" checked>
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">آدرس تصویر</label>
            <div class="controls">
              <input type="text" id="" name="picture_address" value="">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>  
          
          <?php
          echo '<div class="control-group">';
            echo '<label for="manufacture_id" class="control-label">رده </label>';
            echo '<div class="controls">';              
            echo form_dropdown('category_id', $options_category, set_value('category_id'), 'class="span2"');
            echo '</div>';
          echo '</div">';
          ?>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <button class="btn" type="reset">Cancel</button>
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>
     

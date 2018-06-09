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
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>بسیار عالی!</strong> appinfo updated with success.';
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
      
      //form validation
      echo validation_errors();

      echo form_open('admin/appinfo/update/'.$this->uri->segment(4).'', $attributes);
      ?>
      
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">حداقل خرید</label>
            <div class="controls">
              <input type="text" id="" name="minimum" value="<?php echo $appinfo[0]['minimum']; ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">نام</label>
            <div class="controls">
              <input type="text" id="" name="company_name" value="<?php echo $appinfo[0]['company_name']; ?>" >
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">ایمیل</label>
            <div class="controls">
              <input type="text" id="" name="company_email" value="<?php echo $appinfo[0]['company_email']; ?>" >
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">شماره کارت</label>
            <div class="controls">
              <input type="text" id="" name="card_number" value="<?php echo $appinfo[0]['card_number']; ?>" >
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">صاحب کارت</label>
            <div class="controls">
              <input type="text" id="" name="card_owner_name" value="<?php echo $appinfo[0]['card_owner_name']; ?>" >
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">آدرس سایت</label>
            <div class="controls">
              <input type="text" id="" name="website_address" value="<?php echo $appinfo[0]['website_address']; ?>" >
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">سوالات متداول</label>
            <div class="controls">
              <textarea type="text" id="" name="faq" value="<?php echo $appinfo[0]['faq']; ?>" ><?php echo $appinfo[0]['faq']; ?></textarea>
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">قوانین</label>
            <div class="controls">
              <textarea type="text" id="" name="terms" value="<?php echo $appinfo[0]['terms']; ?>" ><?php echo $appinfo[0]['terms']; ?></textarea>
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">درباره</label>
            <div class="controls">
              <textarea type="text" id="" name="about" value="<?php echo $appinfo[0]['about']; ?>" ><?php echo $appinfo[0]['about']; ?></textarea>
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">تلفن پشتیبانی</label>
            <div class="controls">
              <input type="text" id="" name="contact_phone" value="<?php echo $appinfo[0]['contact_phone']; ?>">
            </div>
          </div>       
             
          <div class="control-group">
            <label for="inputError" class="control-label">ایمیل پشتیبانی</label>
            <div class="controls">
              <input type="text" id="" name="contact_email" value="<?php echo $appinfo[0]['contact_email']; ?>">
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
     

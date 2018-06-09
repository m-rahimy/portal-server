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
            echo '<strong>بسیار عالی!</strong> درج  موفق بود.';
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
      $options_cols = array('' => "Select");
      foreach ($cols as $row)
      {
        $options_cols[$row['id']] = $row['name'];
      }

      $options_rows = array('' => "Select");
      foreach ($rows as $row)
      {
        $options_rows[$row['id']] = $row['name'];
      }

      $options_tables = array('' => "Select");
      foreach ($tables as $row)
      {
        $options_tables[$row['id']] = $row['name'];
      }

      $options_marks = array('' => "Select");
      foreach ($marks as $row)
      {
        $options_marks[$row['id']] = $row['mark'];
      }

      $options_units = array('' => "Select");
      foreach ($units as $row)
      {
        $options_units[$row['id']] = $row['name'];
      }

      //form validation
      echo validation_errors();

      echo form_open('admin/indicators/add', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">عدد</label>
            <div class="controls">
              <input type="text" id="" name="amount" value="<?php set_value('amount') ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>

          <?php
          echo '<div class="control-group">';
            echo '<label for="category_id" class="control-label">ستون</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');

              echo form_dropdown('col_title_id', $options_cols, set_value('col_title_id'), 'class="span2"');

            echo '</div>';
          echo '</div">';
          ?>

          <?php
          echo '<div class="control-group">';
            echo '<label for="category_id" class="control-label">سطر</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');

              echo form_dropdown('row_title_id', $options_rows, set_value('row_title_id'), 'class="span2"');

            echo '</div>';
          echo '</div">';
          ?>

          <?php
          echo '<div class="control-group">';
            echo '<label for="category_id" class="control-label">جدول</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');

              echo form_dropdown('table_name', $options_tables, set_value('table_name'), 'class="span2"');

            echo '</div>';
          echo '</div">';
          ?>

          <?php
          echo '<div class="control-group">';
            echo '<label for="category_id" class="control-label">نشان</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');

              echo form_dropdown('mark_id', $options_marks, set_value('mark_id'), 'class="span2"');

            echo '</div>';
          echo '</div">';
          ?>

          <?php
          echo '<div class="control-group">';
            echo '<label for="category_id" class="control-label">واحد</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');

              echo form_dropdown('unit_id', $options_units, set_value('unit_id'), 'class="span2"');

            echo '</div>';
          echo '</div">';
          ?>

          <div class="control-group">
            <label for="inputError" class="control-label">شهری : 1 - روستایی: 0 - هیچ‌کدام: 2</label>
            <div class="controls">
              <input type="text" id="" name="is_urban" value="<?php set_value('is_urban '); echo '2' ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>

          <div class="control-group">
            <label for="inputError" class="control-label">سال</label>
            <div class="controls">
              <input type="text" id="" name="persian_year" value="<?php set_value('persian_year'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>

          <div class="control-group">
            <label for="inputError" class="control-label">ماه</label>
            <div class="controls">
              <input type="text" id="" name="persian_month" value="<?php set_value('persian_month'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>

          <div class="control-group">
            <label for="inputError" class="control-label">روز</label>
            <div class="controls">
              <input type="text" id="" name="persian_day" value="<?php set_value('persian_day'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>

          <div class="control-group">
            <label for="inputError" class="control-label">فصل</label>
            <div class="controls">
              <input type="text" id="" name="persian_season" value="<?php set_value('persian_season'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>

          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <button class="btn" type="reset">Cancel</button>
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>

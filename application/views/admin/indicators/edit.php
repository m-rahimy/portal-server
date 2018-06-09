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
            echo '<strong>بسیار عالی!</strong>  updated with success.';
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

      /*$data['cols'] = $this->col_titles_model->get_all();
      $data['rows'] = $this->row_titles_model->get_all();
      $data['tables'] = $this->indicator_tables_model->get_all();
      $data['marks'] = $this->marks_model->get_all();
      $data['units'] = $this->units_model->get_all();*/

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

      echo form_open('admin/indicators/update/'.$this->uri->segment(4).'', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">عدد</label>
            <div class="controls">
              <input type="text" id="" name="amount" value="<?php echo $indicators[0]['amount']; ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>

          <?php
          echo '<div class="control-group">';
            echo '<label for="category_id" class="control-label">ستون</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');

              echo form_dropdown('col_title_id', $options_cols, $indicators[0]['col_title_id'], 'class="span2"');

            echo '</div>';
          echo '</div">';
          ?>

          <?php
          echo '<div class="control-group">';
            echo '<label for="category_id" class="control-label">سطر</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');

              echo form_dropdown('row_title_id', $options_rows, $indicators[0]['row_title_id'], 'class="span2"');

            echo '</div>';
          echo '</div">';
          ?>

          <?php
          echo '<div class="control-group">';
            echo '<label for="category_id" class="control-label">جدول</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');

              echo form_dropdown('table_name', $options_tables, $indicators[0]['table_name'], 'class="span2"');

            echo '</div>';
          echo '</div">';
          ?>

          <?php
          echo '<div class="control-group">';
            echo '<label for="category_id" class="control-label">نشان</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');

              echo form_dropdown('mark_id', $options_marks, $indicators[0]['mark_id'], 'class="span2"');

            echo '</div>';
          echo '</div">';
          ?>

          <?php
          echo '<div class="control-group">';
            echo '<label for="category_id" class="control-label">واحد</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');

              echo form_dropdown('unit_id', $options_units, $indicators[0]['unit_id'], 'class="span2"');

            echo '</div>';
          echo '</div">';
          ?>

          <div class="control-group">
            <label for="inputError" class="control-label">شهری : 1 - روستایی: 0 - هیچ‌کدام: 2</label>
            <div class="controls">
              <input type="text" id="" name="is_urban" value="<?php echo $indicators[0]['is_urban']; ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>

          <div class="control-group">
            <label for="inputError" class="control-label">سال</label>
            <div class="controls">
              <input type="text" id="" name="persian_year" value="<?php echo $indicators[0]['persian_year']; ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>

          <div class="control-group">
            <label for="inputError" class="control-label">ماه</label>
            <div class="controls">
              <input type="text" id="" name="persian_month" value="<?php echo $indicators[0]['persian_month']; ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>

          <div class="control-group">
            <label for="inputError" class="control-label">روز</label>
            <div class="controls">
              <input type="text" id="" name="persian_day" value="<?php echo $indicators[0]['persian_day']; ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>

          <div class="control-group">
            <label for="inputError" class="control-label">فصل</label>
            <div class="controls">
              <input type="text" id="" name="persian_season" value="<?php echo $indicators[0]['persian_season'] ?>">
              <!--<span class="help-inline">Cost Price</span>-->
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

    <div class="container top">

      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <?php 
          $invoices = array_reverse($invoices);
          echo ucfirst($this->uri->segment(2));
          
          ?>
        </li>
      </ul>

      <div class="page-header users-header">
        <h2>
          <?php echo ucfirst($this->uri->segment(2));?> 
<!--
          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">جدید</a>
-->
        </h2>
        
        <h4>
		<?php 
		//echo $unhideall;
			if ($unhideall==1) {
				$checked = 'checked';
				$unhide = true;
			}
			else {
				$checked = '';
				$unhide = false;
			}
			$attributes = array('class' => 'form-inline reset-margin', 'id' => 'unhideform');
			echo form_open('admin/invoices', $attributes);
			$fdata = array(
					'type' 			=> 'checkbox',
					'name'          => 'unhideall',
					'id'            => 'unhideall',
					'value'         => 'unhideall',
			);
			echo form_input($fdata, '', $checked);
			echo 'مخفی‌شده‌ها را نشان بده           ';
			/*echo form_checkbox(array(
				'name' => 'unhideall',
				'id' => 'unhideall',
				'value' => '1',
				'checked' => ($this->input->post('unhideall') && $this->input->post('unhideall') == 1 )
			));*/
			$data_submit = array('name' => 'unhidesubmit', 'class' => 'btn btn-success', 'value' => 'اعمال کن');
			echo form_submit($data_submit);
            echo form_close();
			
		?>

		</h4>
      </div>
      
      <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
				//echo $unhideall;
				//trigger_error("INVOICE", E_USER_ERROR);
          
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
           
            $options_username = array(0 => "همه");
            foreach ($customers as $row)
            {
              $options_username[$row['username']] = $row['username'];
            }
            //save the columns names in a array that we will use as filter         
            $options_invoices = array();    
            foreach ($invoices as $array) {
              foreach ($array as $key => $value) {
                $options_invoices[$key] = $key;
              }
              break;
            }

            echo form_open('admin/invoices', $attributes);
     
              echo form_label('Search:', 'search_string');
              echo form_input('search_string', $search_string_selected, 'style="width: 170px;
height: 26px;"');

              echo form_label('Filter by User:', 'username');
              echo form_dropdown('username', $options_username, $username, 'class="span2"');

              echo form_label('Order by:', 'order');
              echo form_dropdown('order', $options_invoices, $order, 'class="span2"');

              $data_submit = array('name' => 'mysubmit', 'class' => 'btn btn-primary', 'value' => 'Go');

              $options_order_type = array('Asc' => 'Asc', 'Desc' => 'Desc');
              echo form_dropdown('order_type', $options_order_type, $order_type_selected, 'class="span1"');

              echo form_submit($data_submit);

            echo form_close();
            ?>

          </div>

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">ردیف</th>
                <th class="header">شماره فاکتور</th>
                <th class="yellow header headerSortDown">تاریخ</th>
                <th class="red header">نام کاربر</th>
                <th class="red header">نام کامل</th>
                <th class="red header">کد ملی</th>
                <th class="red header">آدرس</th>
                <th class="red header">کد پستی</th>
                <th class="red header">عملیات</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $index = 0;
              foreach($invoices as $row)
              {
				  if($row['is_hidden'] == 1 && !$unhide) continue;
				  $index++;
				  //$av = $row['is_available']?'&#10004;':'&#9744;';
				  //$ne = $row['is_new']?'&#10004;':'&#9744;';
                echo '<tr>';
                echo '<td>'.$index.'</td>';
                echo '<td>'.$row['invoice_id'].'</td>';
                echo '<td>'.$row['_date_'].'</td>';
                echo '<td>'.$row['username'].'</td>';                
                echo '<td>'.$row['complete_name'].'</td>';
                echo '<td>'.$row['national_code'].'</td>';
                echo '<td>'.$row['address_text'].'</td>';
                echo '<td>'.$row['address_zipcode'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/invoice_items/show/'.$row['invoice_id'].'" class="btn btn-info">مشاهده اقلام</a> </br> ';
                if(!$row['is_hidden'])  {
					echo '<a href="'.site_url("admin").'/invoices/hide/'.$row['invoice_id'].'" class="btn btn-danger">مخفی شود</a> ';
				}
                if($row['is_hidden'] == 1){
					echo '<a href="'.site_url("admin").'/invoices/reveal/'.$row['invoice_id'].'" class="btn btn-success">مخفی نباشد</a> ';
				}
                echo '</td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>
<script>
	$("#unhideall").on("change", function() {
		console.log("Checked: " + $(this).attr('checked'));
		var data = false;
		if($(this).attr('checked')) data = true;
		console.log(data);
		console.log('posting');
		//ocation.reload(true)
		/*$.post('<?php echo site_url("admin") . "/admin/invoices/list"; ?>', function(data, status){
			console.log('response');
		});*/
		
	});
</script>

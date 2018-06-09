    <div class="container top">

      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <?php echo ucfirst($this->uri->segment(2));?>
        </li>
      </ul>

      <div class="page-header users-header">
        <h2>
          <?php echo ucfirst($this->uri->segment(2)); echo ' ( '.$count_customers.' )';?> 
          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">جدید</a>
        </h2>
      </div>
      
      <div class="row">
        <div class="span12 columns">
          <div class="well">
           
           
            <?php
			   $options_phones = array();
				/*print_r($customers);
				trigger_error("Custimers log", E_USER_ERROR);*/
				/*foreach ($customers as $customer)
				{
				  $options_phones[$customer['username']] = array();
				  $options_phones[$customer['username']] = $customer['phone_number'];
				  foreach ($customer['phone_number'] as $phone)
					{
						$options_phones[$customer['username']][] = $phone;
					}
				}*/
            
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
           
            /*$options_category = array(0 => "all");
            foreach ($categories as $row)
            {
              $options_category[$row['_id_']] = $row['name'];
            }*/
            //save the columns names in a array that we will use as filter         
            $options_fields = array();    
            foreach ($customers as $array) {
              foreach ($array as $key => $value) {
                $options_fields[$key] = $key;
              }
              break;
            }

            echo form_open('admin/customers', $attributes);
     
              echo form_label('Search:', 'search_string');
              echo form_input('search_string', $search_string_selected, 'style="width: 170px;
height: 26px;"');

              /*echo form_label('Filter by category:', 'category_id');
              echo form_dropdown('category_id', $options_category, $category_selected, 'class="span2"');*/

              echo form_label('Order by:', 'order');
              echo form_dropdown('order', $options_fields, $order, 'class="span2"');

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
                <th class="yellow header headerSortDown">نام کاربری</th>
                <th class="red header">نام کامل</th>         
                <th class="green header">کد ملی</th>
                <th class="green header">تلفن‌ها</th>
                <th class="green header">مرتبط</th>
<!--
                <th class="red header">عملیات</th>
-->
              </tr>
            </thead>
            <tbody>
              <?php
              $i =1;
              foreach($customers as $row)
              {
				  //$av = $row['is_available']?'&#10004;':'&#9744;';
				  //$ne = $row['is_new']?'&#10004;':'&#9744;';
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<td>'.$row['username'].'</td>';
                echo '<td>'.$row['complete_name'].'</td>';                
                echo '<td>'.$row['national_code'].'</td>';
                echo '<td>'.$row['phone_number'].'</td>';
                echo '<td class="crud-actions">
					<a href="'.site_url("admin").'/addresses/update/'.$row['username'].'" class="padded btn btn-info">آدرس‌ها</a>  
					<a href="'.site_url("admin").'/payments/update/'.$row['username'].'" class="padded btn btn-info">پرداخت‌ها</a>  
					<a href="'.site_url("admin").'/baskets/update/'.$row['username'].'" class="padded btn btn-info">سبد خرید</a>  
					<a href="'.site_url("admin").'/customers/update/'.$row['username'].'" class="padded btn btn-primary">ویرایش</a>
					<a href="'.site_url("admin").'/customers/'.$row['username'].'/invoices/" class="padded btn btn-info">فاکتورها</a>
					 </td>';
                /*echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/customers/update/'.$row['username'].'" class="btn btn-info">ویرایش</a>  
                  <a href="'.site_url("admin").'/customers/delete/'.$row['username'].'" class="btn btn-danger">حذف</a>
                </td>';*/
                
                echo '</tr>';
                $i = $i+1;
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>

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
          <?php echo ucfirst($this->uri->segment(2));?> 
          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">جدید</a>
        </h2>
      </div>
      
      <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
           
            $options_category = array(0 => "all");
            foreach ($categories as $row)
            {
              $options_category[$row['_id_']] = $row['name'];
            }
            //save the columns names in a array that we will use as filter         
            $options_products = array();    
            /*foreach ($products as $array) {
              foreach ($array as $key => $value) {
                $options_products[$key] = $key;
              }
              break;
            }*/

            echo form_open('admin/categories', $attributes);
     
              echo form_label('Search:', 'search_string');
              echo form_input('search_string', $search_string_selected, 'style="width: 170px;
height: 26px;"');

              echo form_label('Filter by category:', 'category_id');
              echo form_dropdown('category_id', $options_category, $category_selected, 'class="span2"');

              echo form_label('Order by:', 'order');
              echo form_dropdown('order', $options_products, $order, 'class="span2"');

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
                <th class="header">شماره</th>
                <th class="yellow header headerSortDown">نام</th>
<!--
                <th class="red header">رده</th>         
-->
<!--
                <th class="green header">قیمت</th>
-->
                <th class="red header">موجود است؟</th>
<!--
                <th class="red header">جدید است؟</th>
-->
                <th class="red header">عملیات</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($categories as $row)
              {
				  $av = $row['is_available']?'&#10004;':'&#9744;';
				  //$ne = $row['is_new']?'&#10004;':'&#9744;';
                echo '<tr>';
                echo '<td>'.$row['_id_'].'</td>';
                echo '<td>'.$row['name'].'</td>';
                //echo '<td>'.$row['category_name'].'</td>';                
                //echo '<td>'.$row['price'].'</td>';
                echo '<td>'.$av.'</td>';
                //echo '<td>'.$ne.'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/categories/update/'.$row['_id_'].'" class="btn btn-info">view & edit</a>  
                  <a href="'.site_url("admin").'/categories/delete/'.$row['_id_'].'" class="btn btn-danger">delete</a>
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>

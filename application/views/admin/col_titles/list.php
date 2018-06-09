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
        </h2>
        <div width="100%"><a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">جدید</a></h2>
      </div>

      <div class="row">
        <div class="span12 columns">
          <div class="well">

            <?php

            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');

            /*$options_category = array(0 => "همه");
            foreach ($categories as $row)
            {
              $options_category[$row['_id_']] = $row['name'];
            }*/
            //save the columns names in a array that we will use as filter
            $options_products = array();
            foreach ($col_titles as $array) {
              foreach ($array as $key => $value) {
                $options_products[$key] = $key;
              }
              break;
            }

            /*echo form_open('admin/indicators', $attributes);

              echo form_label('جستجو:', 'search_string');
              echo form_input('search_string', $search_string_selected, 'style="width: 170px;
height: 26px;"');

              echo form_label('بر حسب رده:', 'category_id');
              //echo form_dropdown('category_id', $options_category, $category_selected, 'class="span2"');

              echo form_label('ترتیب:', 'order');
              echo form_dropdown('order', $options_products, $order, 'class="span2"');

              $data_submit = array('name' => 'mysubmit', 'class' => 'btn btn-primary', 'value' => 'Go');

              $options_order_type = array('Asc' => 'صعودی', 'Desc' => 'نزولی');
              echo form_dropdown('order_type', $options_order_type, $order_type_selected, 'class="span1"');

              echo form_submit($data_submit);

            echo form_close();*/
            ?>

          </div>

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">شماره</th>
                <th class="green header">نام</th>
                <!-- <th class="yellow header headerSortDown">سطر</th>
                <th class="red header">ستون</th>
                <th class="red header">مقدار</th>
                <th class="red header">واحد</th> -->
                <th class="red header">عملیات</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($col_titles as $row)
              {
				  //$av = $row['is_available']?'&#10004;':'&#9744;';
				  //$ne = $row['is_new']?'&#10004;':'&#9744;';
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['name'].'</td>';
                // echo '<td>'.$row['rowName'].'</td>';
                // echo '<td>'.$row['colName'].'</td>'; // todo: $row['col_title']['name'];
                // echo '<td>'.$row['amount'].'</td>';
                // echo '<td>'.$row['unitName'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/cols/update/'.$row['id'].'" class="btn btn-info">ویرایش</a>
                  <a href="'.site_url("admin").'/cols/delete/'.$row['id'].'" class="btn btn-danger">حذف</a>
                </td>';
                echo '</tr>';
              }
              ?>
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>

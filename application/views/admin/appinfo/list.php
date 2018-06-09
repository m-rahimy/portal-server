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
      
      <div class="row">
        <div class="span12 columns">
          <div class="well">
           
          </div>

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">حداقل خرید</th>
                <th class="yellow header headerSortDown">نام</th>
                <th class="red header">ایمیل</th>         
                <th class="green header">شماره کارت</th>
                <th class="red header">صاحب حساب کارت</th>
                <th class="red header">آدرس وبسایت</th>
                <th class="red header">شماره تلفن</th>
                <th class="red header">ایمیل پشتیبانی</th>
<!--
                <th class="red header">تاریخ به‌روزرسانی</th>
-->
                <th class="red header">عملیات</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($appinfo as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['minimum'].'</td>';
                echo '<td>'.$row['company_name'].'</td>';
                echo '<td>'.$row['company_email'].'</td>';                
                echo '<td>'.$row['card_number'].'</td>';
                echo '<td>'.$row['card_owner_name'].'</td>';
                echo '<td>'.$row['website_address'].'</td>';
                echo '<td>'.$row['contact_phone'].'</td>';
                echo '<td>'.$row['contact_email'].'</td>';
                //echo '<td>'.$row['updated_at'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/appinfo/update/'.$row['_id'].'" class="btn btn-info">view & edit</a>  
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>

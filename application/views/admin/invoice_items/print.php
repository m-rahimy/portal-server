    <div class="container top">
      
      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1)); 
            $invoice = $invoice[0];
            $date = new IntlDateTime($invoice['_date_'], 'Asia/Tehran', 'persian', 'fa');
            ?>
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
          <a href="#">چاپ فاکتور</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
           <?php 
           //print_r($invoice_items);
           //print_r($invoice);
           //trigger_error("SHIT", E_USER_ERROR); //ucfirst($this->uri->segment(2));
           ?>
        </h2>
      </div>      
     
     Install IRANSans font , Print with <button class="btn btn positive">CTRL</button> + <button class="btn btn positive">P</button>
      <?php
      
      /*print_r($invoice_items);
	  trigger_error("DATA DUMP", E_USER_ERROR);*/
      ?>

<style type="text/css">
		body {
			background-color:#ffffff;
			font-family: IRANSans;
		}
		
		.centered_div{
			display:flex;
			justify-content:center;
			align-items:center;
		}
		
		td, th {
			padding:18px;
			text-align:center;
			
		}
		
		th {
			border-bottom: 1px solid black;
		}
		
		.topper {
			border-bottom: 1px dotted black;
		}
		
		.ender{
			border-left: 1px dotted black;
		}
		table {
			width: 100%;
			border: 1px solid black;
		}
		tr {
			width:100%;
		}
		
		@media print {
		  body * {
			visibility: hidden;
		  }
		  #section-to-print, #section-to-print * {
			visibility: visible;
		  }
		  #section-to-print {
			position: absolute;
			left: 0;
			top: 0;
		  }
		}
	</style>
<div dir="rtl" id="section-to-print">
<div class="centered_div">
  <h3>صورتحساب خدمات</h3>
</div>

<hr>
<table>
	<tr>
		<td>شماره فاکتور:</td>
		<td class="ender"><?php echo $invoice['invoice_id'];?></td>
		<td>تاریخ صدور:</td>
		<td class="ender"><?php /*echo $date->format('yyyy/MM/dd');*/ $d = substr(substr_replace($invoice['invoice_id'], '-', 4,0),0, 9);
		$d = substr_replace($d, '-', 7,0);
		//echo $d;
			$date = new IntlDateTime($d, 'Asia/Tehran', 'persian', 'fa');
			//echo $date->format('yyyy/MM/dd'); // ۱۳۸۹/۰۲/۱۰
			echo $date->format('E dd LLL yyyy'); // جمعه ۱۰ اردیبهشت ۱۳۸۹?></td>
		<td>ساعت:</td>
		<td><?php echo $invoice['full_date']; ?></td>
	</tr>
</table>
	<div class="centered_div">
		<h4 style="margin-top:20px;">مشخصات فروشنده</h4>
	</div>
<table>
	<tr>
		<td class="topper">نام:</td>
		<td class="ender topper">شرکت فناوران خلاق حاجیلر</td>
		<td class="topper">code:</td>
		<td class="ender topper">Company Code</td>
		<td class="topper">phone:</td>
		<td class="topper">Company Phone</td>
	</tr>
	<tr>
		<td>address:</td>
		<td>Company address</td>
	</tr>
</table>
	<div class="centered_div">
		<h4 style="margin-top:20px;">مشخصات خریدار:</h4>
	</div>
<table>
	<tr>
		<td class="topper">name:</td>
		<td class="ender topper"><?php echo $invoice['complete_name'];?></td>
		<td class="topper">code:</td>
		<td class="ender topper"><?php echo $invoice['national_code'];?></td>
		<td class="topper">phone:</td>
		<td class="topper"><?php echo $invoice['phone_number'];?></td>
	</tr>
	<tr>
		<td>address:</td>
		<td><?php echo $invoice['address_text'];?></td>
	</tr>
</table>
	<div class="centered_div">
		<h4 style="margin-top:20px;">مشخصات کالا:</h4>
	</div>
<table>
	<tr>
		<th class="ender">ردیف</th>
		<th class="ender">نام محصول</th>
		<th class="ender">قیمت واحد (تومان)</th>
		<th class="ender">تعداد</th>
		<th>قیمت کل</th>
	</tr>	
	<?php 
	$ind = 1; 
	$fee = 0;
	foreach($invoice_items as $item){
		echo "<tr>";
		echo '<td  class="ender">'.$ind++."</td>";
		echo '<td class="ender">'.$item['name']."</td>";
		echo '<td class="ender">'.$item['bought_price']."</td>";
		echo '<td class="ender">'.$item['amount']."</td>";
		$itemPrice = $item['amount']*$item['bought_price'];
		echo '<td  class="ender">'.$itemPrice."</td>";
		$fee += $itemPrice;
		echo "</tr>";
	} ?>
</table>
<p></p>
<table>
	<tr>
		<td>هزینه کل فاکتور</td>
		<td><?php echo $fee; ?> تومان </td>
	</tr>
	
</table>
</div>     

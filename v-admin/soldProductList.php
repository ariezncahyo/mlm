<?php
	$pageTitle = "Sold Product List";
	//get header
	include('v-templates/header.php');
	//include sidebar
	include('v-templates/sidebar.php');
?>

<!--container for content of the website-->
	<div class="span9" id="content_container">
    	<blockquote>
            <p>Sold Product List</p>
            <small>
                <cite title="Source Title">List of sold product of your website.</cite>
            </small>
        </blockquote>
        
        <!--form for selecting date duration-->
        <div class="form-horizontal">
        	<form action="v-includes/functions/function.searchInvoiceDetails.php" method="post">
            	<div class="form-control v-form">
                	<label class="control-label">From Date:</label>
                    <input type="text" class="textbox1" name="from_date" id="calender_date"/>
                </div>
                <div class="form-control v-form">
                	<label class="control-label">To Date:</label>
                    <input type="text" class="textbox1" name="to_date" id="calender_date2"/>
                </div>
                <div class="form-control v-form">
                	<div class="function_result"></div>
                    <input type="hidden" name="redirect_page" value="soldProductList" />
                	<input type="submit" value="SEARCH" class="btn btn-inverse btn1" />
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
        
        <?php
	   		//selecting the values according to search method
			if(!empty($GLOBALS['_GET']))
			{
				$from_date = $_GET['from_date'];
				$to_date = $_GET['to_date'];
				//fetching the values from databases
				echo '<table class="table table-hover">
					<thead>
						<tr>
							<th>Order Id</th>
							<th>Member Name</th>
							<th>Product List</th>
							<th>Quantity</th>
							<th>Date</th>
							<th>Payment Method</th>
							<th>Amount</th>
						</tr>
					</thead>';
					
						//call the method from BLL to get sold product list list
						$manageData->soldProductList($from_date,$to_date);							
							   
				echo '</table>';
			}
			else
			{
				echo "";
			}
	   ?>
        
    </div>
</div>
<!--body main container ends here-->


<?php
	//get footer
	include('v-templates/footer.php');
?>
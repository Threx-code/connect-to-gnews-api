<?php	
header("Access-Control-Allow-Origin: *");
header("Content-Type: text; charset=UTF-8");

require_once "../inc/classesholder.php";

$data = $FormProcessor->readProduct();

$response = http_response_code(200);

foreach($data as $value):	
?>

<div  style="margin:0px auto; border:1px solid #aaa; padding:10px; margin-bottom:10px; width:60%;" class="div<?php echo $value->id ?>">
<form  method="post" role="form" class='update<?php echo $value->id ?>'>
	<div class="form-group">
		
		<p><label>Category</label>: <span style="font-size: 20px;"><?php echo $value->book_category ?></span></p>
	</div>
	<div class="form-group">
		<label>Book Name</label>
		<input type="text" class="form-control" name="name" value="<?php echo $value->name ?>" />
	</div>
	<div class="form-group">
		<label>Book author</label>
		<input type="text" class="form-control" name="author" value="<?php echo $value->author ?>" />
	</div>
	<div class="form-group">
		<label>Book ISBN</label>
		<input type="text" class="form-control" name="isbn" value="<?php echo $value->isbn ?>" />
	</div>
	<div class="form-group">
		<label>country</label>
		<input type="text" class="form-control" name="country" value="<?php echo $value->country ?>" />
	</div>
	<div class="form-group">
		<label>Publisher</label>
		<input type="text" class="form-control" name="publisher" value="<?php echo $value->publisher ?>" />
	</div>
	<div class="form-group">
		<label>Number of Pages</label>
		<input type="text" class="form-control" name="pages" value="<?php echo $value->number_of_pages ?>" />
	</div>
	<div class="form-group">
		<label>Release Date (mm-dd-yyyy)</label>
		<input type="text" class="form-control" name="date" value="<?php echo $value->release_date ?>" />
	</div>
</form>



</div>

<?php
endforeach;
?>

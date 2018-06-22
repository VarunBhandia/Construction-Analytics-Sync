<form method="post" action="<?php echo base_url() ?>Multiple_selectbox_c/create">
<div class="col-md-6">
<input type="name" placeholder="Enter name" class="form-control">
<select name="foods[]" class="selectpicker" multiple title="Choose Foods" multiple data-max-options="2" data-live-search="true">
  <option value="1">Mustard</option>
  <option value="2">Ketchup</option>
  <option value="3">Relish</option>
</select>
</div>
<button class="btn btn-primary">Submit</button>
</form>
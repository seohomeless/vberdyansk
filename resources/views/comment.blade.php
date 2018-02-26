  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
   @endif
								
								
			@if(Session::has('message'))
<font color="green"><h3>{{Session::get('message')}}</h3></font>
@endif					
	<div class="comments2">							
<form method="POST" enctype="multipart/form-data">
<h2>Оставить отзыв</h2>
<div>
<div style="width: 140px; float: left; margin-right: 40px;" required>
Чистота:<br>
<select name="chisto" class="form-control" >
<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
</select><br>
</div>
<div style="width: 130px; float: left; margin-right: 40px;" required>
Сервис:<br>
<select name="servic" class="form-control" >
<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
</select>
<br>
</div>

<div style="width: 160px; float: left;" required>
Цена и качество:<br>
<select name="cena" class="form-control" >
<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
</select><br>

</div></div>

<div style="clear: both">
Ваше имя:<br>
<input type="text" class="form-control"  name="author" style="width: 250px;" required /><br>
Ваш email:<br>
<input type="text"  class="form-control"  name="email"  style="width: 250px;" required /><br>


<div class="otz">
Ваше отзыв:<br>
<textarea name="content"  style="width: 490px; height: 118px;" required></textarea><br>
</div>
<br>
  Прикрепить фото с отдыха
    <br />
    <input type="file" name="filename[]" class="btn" multiple  />
    <br /><br />
	
	
	<input type="hidden" name="_token" value="{{csrf_token()}}"/>


	<input type="submit" value="Добавить отзыв" class="btn btn-primary btn-lg active" /></div>

</form>
</div>

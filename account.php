<?php 
	session_start();
 ?>
<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<meta charset="utf-8">
 	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 	<style type="text/css">
 		.hov:hover {
 			background:lightgray;
 			transition:0.1s;
 		}
 		.search-input{
			border-radius: 15px;
			border:none;
			padding-top: 5px;
			padding-bottom: 5px;
			padding-left: 10px;		
			background: #224b7a;
			color: white;
			outline: none;
			width: 250px;
		}
 	</style>
 </head>
 <body>
<?php 

$con = mysqli_connect("127.0.0.1", "root", "", "lesson40");
$text_query = "SELECT * FROM users WHERE id = '{$_SESSION["id"]}'";
$query = mysqli_query($con, $text_query);

 ?>
<div class="col-12" style="background-color: #4680C2">
	<div class="col-8 mx-auto">
		<div class="row">
			<div class="col-2">
				<img src="img/vk.png" class="w-25">
			</div>
			<div class="col-8">
				<input class="mt-1 search-input" placeholder="Поиск" >
			</div>
		</div>
	</div>
</div>
<?php $stroka = $query->fetch_assoc(); ?>
<div class="col-8 mx-auto">
	<div class="row">
		<div class="col-2">
			<p class="mt-3 hov">Моя страница</p>
			<p class="hov">Новости</p>
			<p class="hov">Мессенджер</p>
			<p class="hov">Друзья</p>
			<p class="hov">Сообщества</p>
			<p class="hov">Фотографии</p>
			<p class="hov">Музыка</p>
			<p class="hov">Видео</p>
			<p class="hov">Клипы</p>			
			<p class="hov">Игры</p>
			<div class="border-bottom mb-2"></div>
			<p class="hov">Мини-приложения</p>
			<p class="hov">VK-Pay</p>
			<div class="border-bottom mb-2"></div>
			<p class="hov">Маркет</p>
			<p class="hov">Закладки</p>
			<p class="hov">Файлы</p>
		</div>
		<div class="col-3 text-center">
			<div>
				<img src="<?php echo $stroka["avatar"]; ?>" class="w-100 img">
				<div style="background-color: rgba(0,0,0,0.7)">
					<p data-toggle="modal" data-target="#exampleModal" class="text-white update">Обновить фотографию</p>
					<p><?php echo $_SESSION["id"] ?></p>
				</div>
			</div>
			
			<button class="btn btn-primary mt-3">Редактировать</button>
		</div>
		<div class="col-7 pt-3">
			<div class="col-12 border-bottom" >
				<h5><!--Здесь вывести имя и фамилию авторизованного пользователя-->
					<?php  echo $stroka["name"].' '.$stroka["surname"]; ?>
				</h5>
				<p class="text-secondary">Изменить статус</p>
			</div>
			<h1 class="mt-3">Новости: </h1>
			<?php $text_news = "SELECT * FROM news INNER JOIN users on users.id = news.CustomerID WHERE CustomerID = '{$_SESSION['id']}'";
				$query_news = mysqli_query($con, $text_news);
				for ($i=0; $i < $query_news->num_rows; $i++) { 
				 	$stroka = $query_news -> fetch_assoc();
				  ?>
			<div class="p-2 col-10 border-bottom mt-5">
				<h2><?php echo $stroka["user"]; ?></h2>
				<p><?php echo $stroka["description"]; ?></p>
				<img src="<?php echo $stroka["img"]; ?>" class="w-100">
			</div>
		<?php }; ?>
		</div>
	</div>
</div>

<!--модальное окно-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Загрузка новой фотографии</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p>Друзьям будет проще узнать Вас, если Вы загрузите свою настоящую фотографию.
		Вы можете загрузить изображение в формате JPG, GIF или PNG.</p>
		<form action="upd.php" method="POST" enctype="multipart/form-data">	
			<p><input type="file" name="ava" placeholder="Выбрать файл"></p>
			<button class="btn btn-primary mt-3">Сохранить и продолжить</button>
		</form>
		
      </div>
      <div class="modal-footer">
        
        <p>Если у Вас возникают проблемы с загрузкой, попробуйте выбрать фотографию меньшего размера.</p>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

 </body>
 </html>
<!DOCTYPE html>
<html>
	<head>
		<title>Weather Api</title>

		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

		<style>
			#bground {
				background: url('images/blue-sky.jpg');
			}

		</style>
		<script>
			$(document).ready(function() {

				$("select").change(function() {

					var city = $("select option:selected").attr('value');
					if (city == 0) {
						$('.desc').empty();
						$('.temp').empty();
						return;

					}
					var urlstr = "https://query.yahooapis.com/v1/public/yql?q=select * from weather.forecast where woeid in (select woeid from geo.places(1) where text='" + city + "')&format=json&callback=callbackFunction"
					$.ajax({
						type : "POST",
						url : urlstr
					});

				});

			});

			var callbackFunction = function(data) {
				//alert(data);
				var tmp = data.query.results.channel.item.condition.temp;
				//alert(tmp + 'F');
				$('.temp').empty();
				$('.temp').append(tmp + 'F');
				var desc = data.query.results.channel.item.description;
				$('.desc').empty();
				$(".desc").append(desc);
				//alert(desc);
				var forecast = data.query.results.channel.item.forecast[0].day;
				//alert(forecast);

			};

		</script>

	</head>
	<body>

		<div id="bground" style="height:900px;">

			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">

						<br>
						<br>
						<br>
						<br>
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4 city" style="padding:20px;box-shadow: 2px 2px 2px;background-color: rgba(255, 255, 255, 0.5);">

								<div class="form-group" style="text-align: center">
									<select id="city" style="width:150px;height:35px;">
										<option value="0">Select City</option>
										<option value='bengaluru'>Bangalore</option>
										<option value='chennai'>Chennai</option>
										<option value='pune'>Pune</option>
										<option value='mumbai'>Mumbai</option>
									</select>
								</div>
								<div class="temp" style="font-size: 60px;color:#fff;text-align: center"></div>

								<div class="desc" style="font-size: 18px;color:#405F87;text-align: center">

								</div>

							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</body>
</html>

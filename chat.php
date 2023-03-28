<!DOCTYPE html>
<html>
<head>
	<title>Chatbot</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<style>
		.container {
			margin-top: 100px;
		}
		.msg-box {
			height: 300px;
			overflow-y: scroll;
			border: 1px solid #ddd;
			padding: 10px;
			margin-bottom: 10px;
		}
		.msg-input {
			border: 1px solid #ddd;
			padding: 10px;
			width: 100%;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h3 class="text-center mb-5">Chatbot</h3>
				<div class="msg-box">
					<!-- Chat messages will be displayed here -->
				</div>
				<input type="text" id="msg-input" class="msg-input" placeholder="Type your message here...">
			</div>
		</div>
	</div>
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Custom JS -->
	<script>
		$(document).ready(function() {
			$('#msg-input').keypress(function(event) {
				if (event.keyCode == 13) {
					event.preventDefault();
					getBotResponse();
				}
			});
		});

		function getBotResponse() {
			var userMsg = $('#msg-input').val();
			$('#msg-input').val('');
			$('.msg-box').append('<

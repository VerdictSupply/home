<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chatbot Example</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		.chat-container {
			height: 400px;
			overflow-y: scroll;
		}
	</style>
</head>
<body>
	<div class="container mt-5">
		<h3 class="text-center mb-5">Chatbot Example</h3>
		<div class="row">
			<div class="col-md-8">
				<div class="chat-container">
					<div class="card">
						<div class="card-body">
							<!-- Chat messages will be displayed here -->
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="user-input" placeholder="Type your message here...">
					<div class="input-group-append">
						<button class="btn btn-primary" type="button" id="send-btn">Send</button>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<h5 class="mb-3">Online Users</h5>
				<ul class="list-group">
					<!-- Online users will be displayed here -->
				</ul>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script>

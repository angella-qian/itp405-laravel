@extends('layout')

@section('title', 'Lab 4 | Editable Document')

@section('main')

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale="1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<style>
		#doc {
			border: 1px solid #000;
			border-radius: 0.5rem;
			padding: 1rem;
		}
	</style>
</head>
<body>
	<h1>Editable Document</h1>
	<div id="doc" contenteditable="true">
		Begin typing here...
	</div>

	<script>

		let connection = new WebSocket('wss://aqian-websocket-demo.herokuapp.com/');
		// let connection = new WebSocket('ws://localhost:8080');

		// Successfully connected to server
		connection.onopen = () => {
			console.log('connected from the frontend');
		};

		// Failure in connecting to server
		connection.onerror = () => {
			console.log('failed to connected from the frontend');
		};

		// Whenever message comes in from server
		connection.onmessage = (event) => {
			console.log('received message', event.data);

			// Append to the p tag
			let p = document.createElement('p');
			p.innerText = event.data;
			document.querySelector('#doc').innerHTML = '';
			document.querySelector('#doc').append(p);
		};

		document.querySelector('#doc').addEventListener('input', (event) => {
			// Prevent page refresh
			event.preventDefault();

			// Send message when submit form
			// Clear out the form
			let message = document.querySelector('#doc').innerText;

			connection.send(message);
		});

	</script>
</body>
</html>

@endsection
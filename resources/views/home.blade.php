<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <h1>Enter ID Card Number</h1>
    <form action="{{ route('submit-id-card-no') }}" method="POST">
        @csrf
        <label for="id_card_no">ID Card Number:</label>
        <input type="text" id="id_card_no" name="id_card_no" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <h1>Enter ID Card Number</h1>
    <form action="{{ route('submit-add-approval') }}" method="POST">
        @csrf
        <label for="id_card_no">ID Card Number:</label>
        <input type="text" id="id_card_no" name="id_card_no" value="{{ session('id_card_no') }}" required>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="{{ session('phone') }}" required>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <label for="instance">Instance:</label>
        <input type="text" id="instance" name="instance">
        <label>Gender:</label>
        <select id="gender" name="gender" required>
            <option value="MALE">Male</option>
            <option value="FEMALE">Female</option>
        </select>
        <label>Location:</label>
        <select id="location_id" name="location_id" required>
            @foreach ($locations as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address">
        <button type="submit">Submit</button>
    </form>
</body>
</html>

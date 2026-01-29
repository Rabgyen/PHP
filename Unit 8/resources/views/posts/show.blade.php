<!-- resources/views/contacts/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>View Contact</title>
</head>
<body>
    <h1>View Contact</h1>
    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Address:</strong> {{ $contact->address }}</p>
    <p><strong>Phone Number:</strong> {{ $contact->phone_number }}</p>
    <a href="{{ route('contacts.index') }}">Back</a>
</body>
</html>

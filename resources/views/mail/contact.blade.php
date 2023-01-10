<p><b>Name:</b>{{ $name }}</p>
<p><b>Email:</b>{{ $email }}</p>
@if(strlen($question) > 0)
    <p><b>Question:</b>{{ $question }}</p>
@endif

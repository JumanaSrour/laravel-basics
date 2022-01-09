<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    @foreach ($students as $student)
    <a>{{ $student->name}}</a>
        @if (!empty($student->registered_courses))
             @foreach ($student->registered_courses as $registered_courses)
                 @if (!empty($registered_courses->course))
                     <a>{{ $registered_courses->course->name}}</a>
                 @endif
             @endforeach    
        @endif
        <hr>
    @endforeach
</body>
</html>
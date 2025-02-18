<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-3">
                <form action='{{route('sendcontactform')}}' method = 'POST' enctype='multipart/form-data'>
                    @csrf
                    <div class="card">
                        @if(session('success'))
                            <div class='alert alert-success m-2' role='alert'>{{session('success')}}</div>
                        @elseif(session('error'))
                        <div class='alert alert-danger m-2' role='alert'>{{session('error')}}</div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputname">name</label>
                            <input type="text" name='name' class="form-control" id="exampleInputname" placeholder="Name">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputsubject">Subject</label>
                            <input type="text" name='subject' class="form-control" id="exampleInputsubject" aria-describedby="emailHelp" placeholder="Enter Subject">
                            @error('subject')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputMessage">Message</label>
                            <input type="text" name='message' class="form-control" id="exampleInputMessage" aria-describedby="emailHelp" placeholder="Enter Message">
                            @error('message')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAttachment">Attachment</label>
                            <input type="file" name='attachment' class="form-control" id="exampleInputAttachment" aria-describedby="emailHelp">
                            @error('attachment')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                  </form>
            </div>
        </div>
    </div>
</body>
</html>
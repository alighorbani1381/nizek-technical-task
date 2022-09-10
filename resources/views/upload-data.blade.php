<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Upload Data File</title>
</head>
<body>
<div class="container">

    <div class="col-md-12 text-center mb-5">
        <img style="width:40%;" src="{{ asset('img/main.jpg') }}" alt="Upload Data">
        <h4 class="mb-4">Upload Excel File Now!</h4>

        @if(Session::has('file-uploaded'))
            <div class="alert alert-success">
                File Uploaded Successfully!
            </div>
        @else
            <div class="alert alert-info">
                @if($stockPriceCounts == 0)
                    We haven't any Stock into Database!
                @else
                    The Count of Stock {{ number_format($stockPriceCounts) }} number right now
                @endif
            </div>
        @endif

        @error('file')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
    </div>


    <div class="col-md-12">
        <form action="{{ route('import.excelFile') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            <button class="btn btn-outline-primary" type="submit">Upload</button>
        </form>
    </div>
</div>
</div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body class="column">
    <header>
        <p class="title">Pet Data Form</p>
    </header>
    <main>
        <form class="row" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="column width-50 content-center">
                <img class="image-view margin-offset" src="{{ asset('image/animal.png') }}" id="animal-picture" alt="animal picture">
                <label class="button" for="upload-image">Upload Image</label>
                <input class="hidden" type="file" accept="image/jpg, image/jpeg, image/png" id="upload-image" name="upload-image"/>
            </div>
            <div class="column width-50 content-center margin-offset">
                <div class="field">
                    <label for="pet-name" class="field-title">Pet Name:</label>
                    <input class="field-input" id="pet-name" name="pet-name" type="text" placeholder="Charlie">
                </div>
                <div class="field">
                    <label for="pet-species" class="field-title">Pet Species:</label>
                    <input class="field-input" id="pet-species" name="pet-species" type="text" placeholder="Dog">
                </div>
                <div class="field">
                    <label for="pet-breed" class="field-title">Pet Breed:</label>
                    <input class="field-input" id="pet-breed" name="pet-breed" type="text" placeholder="Golden Retriever">
                </div>
                <div class="field">
                    <label for="pet-age" class="field-title">Pet Age (y/o):</label>
                    <input class="field-input" id="pet-age" name="pet-age" type="text" placeholder="5">
                </div>
                <div class="field">
                    <label for="pet-weight" class="field-title">Pet Weight (kg):</label>
                    <input class="field-input" id="pet-weight" name="pet-weight" type="text" placeholder="15.5">
                </div>
                <button type="submit" class="button">Submit</button>
            </div>
        </form>

        @if ($errors->any())
            <div id="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div id="alert-success">
                {{ session('success') }}
            </div>
        @endif
        
    </main>
    <script src="{{ asset('script/script.js') }}"></script>
</body>
</html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/484fbcb614.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Montserrat'>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="css/admin-ad-banner.css">
    <script src="js/upload-file.js"></script>
    <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
    <title>Upload ad Banner</title>
</head>

<body>
    <div class="bannerPage">
        <div class="bannerForm">
            <form action="php/addProduct.php" method="post" id="form" enctype="multipart/form-data"><br><br>
                <b><div id="addBanner">Add Banner Upload</div></br>
                        
                           
                Banner Name:&nbsp&nbsp&nbsp&nbsp<input type="text" name="pName" class="bannerInput" placeholder="Banner Name">
                
                <br>
                <div class="desktop">
                    <b>Banner Image (Desktop version):</b>
                    <div class="file-upload">
                        <div class="file-select">

                            <div class="file-select-button" id="fileName">Choose File</div>
                            <div class="file-select-name" id="noFile">No file chosen...</div>
                            <input type="file" name="chooseFile" id="chooseFile">
                        </div>
                    </div>
                </div>

                <div class="mobile">
                    <b>Banner Image (Mobile version):</b>
                    <div class="file-upload2">
                        <div class="file-select2">

                            <div class="file-select2-button2" id="fileName2">Choose File</div>
                            <div class="file-select2-name2" id="noFile2">No file chosen...</div>
                            <input type="file" name="chooseFile2" id="chooseFile2">
                        </div>
                    </div>
                </div>
                <br>

                <div id='bannerSubmitDiv'>
                    <input type="submit" value="Add Banner" class="addBannerBtn" id="bannerSubmit">
                </div>
            </form>
        </div>


        <div class="bannerTable">
            <h1>Banner Management</h1>
            <table width="100%">
                <tr>
                    <th>Name</th>
                    <th>Desktop version</th>
                    <th>Mobile version</th>
                    <th colspan="3">Actions</th>
                    <th>Date</th>

                </tr>

                <tr>
                    <td>Hakdog</td>
                    <td><img src="css/ad banner/sample ads.png logo.png" height="20px" width="40px"></td>
                    <td><img src="css/ad banner/sample ads.png logo.png" height="20px" width="40px"></td>
                    <td><input type='button' value='Edit' class='banner-actions'></td>
                    <td><input type='button' value='Hide' class='banner-actions'></td>
                    <td><input type='button' value='Delete' class='banner-actions'></td>
                    <td>03/27/23</td>
                </tr>

                <tr>
                    <td>Hakdog</td>
                    <td><img src="css/ad banner/sample ads.png logo.png" height="20px" width="40px"></td>
                    <td><img src="css/ad banner/sample ads.png logo.png" height="20px" width="40px"></td>
                    <td><input type='button' value='Edit' class='banner-actions'></td>
                    <td><input type='button' value='Hide' class='banner-actions'></td>
                    <td><input type='button' value='Delete' class='banner-actions'></td>
                    <td>03/27/23</td>
                </tr>

            </table>

        </div>




        <script src="https://code.jquery.com/jquery-1.12.3.js" integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="js/upload-file.js"></script>
        <script src="js/upload-file2.js"></script>
</body>

</html>
<?php
    include '../settings/connection.php';
    if (isset($_POST["Upload"])) {

        $title = $_POST['title'];
        $artiste = $_POST['artiste'];
        $currentUser = $_POST['ID'];
        $file = $_FILES['audioFile'];
        $fileName = $file['name'];
        $fileType = $file['type'];
        $pname = rand(1000,10000000)."-". $artiste . "-" . $fileName;
        $tname = $file["tmp_name"];
        $uploads_dir = '../user_uploads';

        // TODO handle images
        try {
            move_uploaded_file($tname, $uploads_dir.'/'.$pname);
            $uploadDate = date('Y-m-d H:i:s');

            // Upload the audio file and insert the details into the MusicFiles table
            $stmt = $conn->prepare("INSERT INTO MusicFiles (UserID, Title, Artiste, FileName, FileType, UploadDate) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssss", $currentUser, $title, $artiste, $pname, $fileType, $uploadDate);
            $stmt->execute();

            header("Location: ../view/profile.php?message=file-upload-successful-$currentUser");
            $stmt->close();
        } catch (\Throwable $th) {
            header("Location: ../view/profile.php?error=upload-failed");
        }
        
        
        
    } else {
        echo "Failed to upload file!";
    }

?>
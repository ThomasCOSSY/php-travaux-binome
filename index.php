<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=e, initial-scale=1.0">
    <title>exo-binome</title>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="uploadPreview/style.css">
</head>

<body>
<script type="text/javascript">
/////////////////////////////////////////////////////////
// Javascript made by http://peters1.dk/tools/snow.php //
/////////////////////////////////////////////////////////

// N´OUBLIEZ PAS: De changez le chemin vers  l´image snow.png
snow_img = "img/snow.png";

// BONUS: Vous pouvez facilement regler le nombre de flocons que vous voulez sur chaque page...
snow_no = 15;

if (typeof(window.pageYOffset) == "number")
{
	snow_browser_width = window.innerWidth;
	snow_browser_height = window.innerHeight;
} 
else if (document.body && (document.body.scrollLeft || document.body.scrollTop))
{
	snow_browser_width = document.body.offsetWidth;
	snow_browser_height = document.body.offsetHeight;
}
else if (document.documentElement && (document.documentElement.scrollLeft || document.documentElement.scrollTop))
{
	snow_browser_width = document.documentElement.offsetWidth;
	snow_browser_height = document.documentElement.offsetHeight;
}
else
{
	snow_browser_width = 500;
	snow_browser_height = 500;	
}

snow_dx = [];
snow_xp = [];
snow_yp = [];
snow_am = [];
snow_stx = [];
snow_sty = [];

for (i = 0; i < snow_no; i++) 
{ 
	snow_dx[i] = 0; 
	snow_xp[i] = Math.random()*(snow_browser_width-50);
	snow_yp[i] = Math.random()*snow_browser_height;
	snow_am[i] = Math.random()*20; 
	snow_stx[i] = 0.02 + Math.random()/10;
	snow_sty[i] = 0.7 + Math.random();
	if (i > 0) document.write("<\div id=\"snow_flake"+ i +"\" style=\"position:absolute;z-index:"+i+"\"><\img src=\""+snow_img+"\" border=\"0\"><\/div>"); else document.write("<\div id=\"snow_flake0\" style=\"position:absolute;z-index:0\"><a href=\"http://peters1.dk/tools/snow.php\" target=\"_blank\"><\img src=\""+snow_img+"\" border=\"0\"></a><\/div>");
}

function SnowStart() 
{ 
	for (i = 0; i < snow_no; i++) 
	{ 
		snow_yp[i] += snow_sty[i];
		if (snow_yp[i] > snow_browser_height-50) 
		{
			snow_xp[i] = Math.random()*(snow_browser_width-snow_am[i]-30);
			snow_yp[i] = 0;
			snow_stx[i] = 0.02 + Math.random()/10;
			snow_sty[i] = 0.7 + Math.random();
		}
		snow_dx[i] += snow_stx[i];
		document.getElementById("snow_flake"+i).style.top=snow_yp[i]+"px";
		document.getElementById("snow_flake"+i).style.left=snow_xp[i] + snow_am[i]*Math.sin(snow_dx[i])+"px";
	}
	snow_time = setTimeout("SnowStart()", 10);
}
SnowStart();
</script>













    <div class="container flex-column d-flex align-content-center justify-content-center">

        <p class="text-center h1 title mt-3">Veuillez choisir une image :</p>

        <div class="d-flex align-content-center justify-content-center">
        <img class="d-flex align-content-center justify-content-center" id="preview" src="">
        </div>

        <form class="m-auto d-flex align-content-center justify-content-center" action="index.php" method="post" enctype="multipart/form-data">

            <div>            
                <input class="m-3 input1" type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="button d-flex justify-content-end align-content-end">
                <button class="btn btn-danger m-3 " id="submit" type="submit">UPLOAD</button>
            </div>
        </form>
        
            
        
    </div>

    <?php
    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES['fileToUpload']) and $_FILES['fileToUpload']['error'] == 0) {
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['fileToUpload']['size'] <= 1024000) {
            // Testons si l'extension est autorisée
            $infosfichier = pathinfo($_FILES['fileToUpload']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_upload, $extensions_autorisees)) {
                // On peut valider le fichier et le stocker définitivement

                move_uploaded_file($_FILES['fileToUpload']['tmp_name'], 'img/' . uniqid($_FILES['fileToUpload']['name']));

                echo "<script>alert(\"Votre dossier a bien été transféré !\")</script>";
                
            } else {
                echo "Le dossier n'a pas été transmit.";
            }
        } else {
            echo "la taille de votre fichier est trop grande";
        }
    } 
    ?>

<div class="m-auto d-flex align-content-center justify-content-center">
<figure>
        <audio
    controls autoplay loop
        src="img/KeenV_feat_Carla_-_Cest_bientot_Noel_Clip_officiel.mp3">
    </audio>
</figure>
</div>

<script src="uploadPreview/script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    
</body>

</html>
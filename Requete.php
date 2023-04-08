<?php
class Requete
{
    private static $req;
    private static $url;

    public static function requetes($reque)
    {
        if(isset($_POST[$reque]) || isset($_GET[$reque]))
        {
            $req=$_POST[$reque];
            return Requete::specialChar($req);
        }
        else
        {
            return null;
        }
    }
    public static function specialChar($reque)
    {
        if(!empty($reque))
        {
            $reque=htmlentities(htmlspecialchars($reque));
            return $reque;
        }
        else
        {
            return null;
        }
    }
    public static function File($reque,$path,$name)
    {
            $req=$_FILES[$reque];
            try{
               
                $maxsize = 1048576;
                $size = $req['size'];
                
                $extensions_valides = array( ' jpg' , ' jpeg' , ' gif' , ' png', ' pdf' ) ;
                //1. strrchr renvoie l'extension avec le point (« . ») .
                //2. substr(chaine, 1) ignore le premier caractère de chaine.
                //3. strtolower met l'extension en minuscules.
                $extension_upload = strtolower(strrchr( $req ['name'] ,'.')) ;
                
                if ( $req['error'] > 0)
                        {
                            header("Location: profile.php?erreur=Erreur lors de l'envois du fichier");
                        }
                elseif ( $req['size'] > $maxsize) 
                        {
                            header("Location: profile.php?erreur=La taille du fichier est superieur à 2 MB");
                        }
                elseif (in_array($extension_upload, $extensions_valides)) 
                            {
                                header("Location: profile.php?erreur=extension incorrect"); 
                            }
                else
                                {	
                                $nom = "$path/{$name}" . "{$extension_upload}";
                                // $adresse = "$path{$pseudo}" . "{$extension_upload}";
                                // $adresse_mini = "$path{$pseudo}"."{$extension_upload}";
                                $resultat = move_uploaded_file( $req['tmp_name'] , $nom) ;
                                return $name.$extension_upload;
                                }
                        
                                    
                                    
                    
                    if ( $extension_upload == ".jpg" OR ".jpeg")
                {
                    
                        // $source = imagecreatefromjpeg($nom); // La photo est la source
                        // $destination = imagecreatetruecolor(60, 60); // On crée la miniature vide
                        // // Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
                        // $largeur_source = imagesx($source);
                        // $hauteur_source = imagesy($source);
                        // $largeur_destination = imagesx($destination);
                        // $hauteur_destination = imagesy($destination);
                        // // On crée la miniature
                        // imagecopyresampled($destination, $source, 0, 0, 0, 0,
                        // $largeur_destination, $hauteur_destination, $largeur_source,
                        // $hauteur_source);
                        // // On enregistre la miniature sous le nom "mini_couchersoleil.jpg"
                        // imagejpeg($destination, "images/profile/mini". $name.".jpg");
                      	
                }
                elseif ($extension_upload == ".png" )
                {
                    
                //     $source = imagecreatefrompng($adresse); // La photo est la source
                // $destination = imagecreatetruecolor(300, 200); // On crée la miniature vide
                // // Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
                // $largeur_source = imagesx($source);
                // $hauteur_source = imagesy($source);
                // $largeur_destination = imagesx($destination);
                // $hauteur_destination = imagesy($destination);
                // // On crée la miniature
                // imagecopyresampled($destination, $source, 0, 0, 0, 0,
                // $largeur_destination, $hauteur_destination, $largeur_source,
                // $hauteur_source);
                // // On enregistre la miniature sous le nom "mini_couchersoleil.jpg"
                // imagepng($destination, "$path/mini". $name.".png");
   			
                }
               
            }
            catch(PDOException $e)
            {
            die($e->getMessage());
            }
            
            // ob_end_flush();
        
    }
    public static function name($req)
    {
        if(isset($_FILES[$req]) || $_FILES['$req']['error']==0)
        {
            $req=$_FILES[$req];
            return $req['name'];
        }
    }
}
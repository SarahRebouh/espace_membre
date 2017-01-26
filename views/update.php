<?php 
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require '../model/pdo.php';
?>

<?php
								if ((isset($_GET['submit'])) || (isset($_POST['submit']))) {
									if (isset($_GET['nom'])) {
										$pdo->query("UPDATE utilisateur SET nom='".$_GET['nom']."' WHERE id_utilisateur = ".$_GET['id']);
									}

									if (isset($_GET['prenom'])) {
										$pdo->query("UPDATE utilisateur SET prenom='".$_GET['prenom']."' WHERE id_utilisateur = ".$_GET['id']);
									}

									if (isset($_GET['email'])) {
										$pdo->query("UPDATE utilisateur SET email='".$_GET['email']."' WHERE id_utilisateur = ".$_GET['id']);
									}

									if (isset($_GET['mdp'])) {
										$pdo->query("UPDATE utilisateur SET mdp='".$_GET['mdp']."' WHERE id_utilisateur = ".$_GET['id']);
									}
                                    
                                  
                                    if(!empty($_FILES['monfichier']['name'])) {
                                        
//                                        unlink("../images/resize/fichier_du_20170125162622_resize.jpg");
//                                        unlink("../images/fichier_du_20170125162622.jpg");

                                        $nomOrigine = $_FILES['monfichier']['name'];
                                        $elementsChemin = pathinfo($nomOrigine);
                                        $extensionFichier = $elementsChemin['extension'];
                                        $extensionsAutorisees = array("jpeg", "jpg", "gif", "png");
                                        $repertoireResize = "../images/resize/";

                                        if (!(in_array($extensionFichier, $extensionsAutorisees))) {
                                            echo "Ce type de fichier n'est pas supporté";
                                        } 

                                        else {    
                                            // Copie dans le repertoire du script avec un nom
                                            // incluant l'heure a la seconde pres 
                                            $repertoireDestination = "../images/";
                                            $nomDestination = "fichier_du_".date("YmdHis").".".$extensionFichier;

                                            if (move_uploaded_file($_FILES["monfichier"]["tmp_name"], $repertoireDestination.$nomDestination)) {



                                        //        echo "Le fichier temporaire ".$_FILES["monfichier"]["tmp_name"].
                                        //                " a été déplacé vers ".$repertoireDestination.$nomDestination;

                                                include("../controller/test_recize.php");
                                                $resize = new ResizeImage($repertoireDestination."fichier_du_".date("YmdHis").".".$extensionFichier);
                                                $resize->resizeTo(100, 100);
                                                $resize->saveImage($repertoireResize."fichier_du_".date("YmdHis").".".$extensionFichier, "100");
                                                
                                                $url = "fichier_du_".date("YmdHis").".".$extensionFichier;
                                                
                                                $pdo->query("UPDATE utilisateur SET url_image='".$url."' WHERE id_utilisateur = ".$_POST['id']);


                                            } 

                                            else {
                                                echo "Le fichier n'a pas été uploadé.";
                                            }
                                        }
                                    }
								} 

header("location:accueil.php");
								
?>
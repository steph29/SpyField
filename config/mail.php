<?php
session_start();


// A reajuster ! Mais ca fonctionne

$mes =  "Un mail de confirmation vient d'être envoyé à l'adresse suivante : ";

				$header="MIME-Version: 1.0\r\n";
					 $header.='From:"Terre en vie"<communication.terreenvie@gmail.com>'."\n";
					 $header.='Content-Type:text/html; charset="utf-8"'."\n";
					 $header.='Content-Transfer-Encoding: 8bit';
					 $title.='Bénévolat pour la foire Bio 2020';
					 $message = '
           <!doctype html>
           <html lang="fr">
					 <head>
						 <title>R&eacute;sum&eacute; de vos cr&eacute;neaux de b&eacute;n&eacute;volats</title>
						 <meta charset="utf-8" />
					 </head>

					 <body>

						<div align="center" style="background-color:#b4bb00; padding:40px;">
			               <table style="width:600px;background-color:#efefef;padding:40px 40px 10px 40px;text-align:center;color:#303030;border:solid 1px #b4bb00;">
			                 <tr>
			                   <td>
		                       <img src="https://www.terreenvie.com/benevoles/Images/logoTEV.png" width="80" height="80" alt="Terre en Vie">
		                       <h1 style="color:#303030">Bonjour <b></b>,</h1>
		                       <h3 style="color:#303030">Voici un r&eacute;sum&eacute; de tes cr&eacute;neaux pour &ecirc;tre b&eacute;n&eacute;vole &agrave; la prochaine Bio en F&ecirc;te de Muzillac</h3>
		                       
		                     </td>
		                   </tr>
		                   <tr>
		                     <td><p style="color:#b4bb00;">L&apos;&eacute;quipe de <a style="color:#b4bb00;" href="https://www.terreenvie.com/" title="Terre en Vie">Terre en Vie</a></p></td>
		                   </tr>
		                   <tr>
		                     <td><p style="color:#aaa;">Si tu as envie de nous faire un retour sur ton exp&eacute;rience "Inscription b&eacute;n&eacute;vole" ou juste nous dire bonjour, tu peux r&eacute;pondre directement à ce mail ! 👋</p></td>
			                 </tr>
			               </table>
			             </div>

					 </body>
					 </html>
					 ';
					 mail($title, $message, $header);

?>



<?php  


		
		$nome     = utf8_decode (strip_tags(trim($_POST['nomeremetente'])));
		$email    = utf8_decode (strip_tags(trim($_POST['emailremetente'])));
		$ddd = utf8_decode (strip_tags(trim($_POST['ddd'])));
		$telefone = utf8_decode (strip_tags(trim($_POST['telefone'])));
		$assunto = utf8_decode (strip_tags(trim($_POST['assunto'])));
		$mensagem = utf8_decode (strip_tags(trim($_POST['mensagem'])));
			
			require_once('PHPMailer/class.phpmailer.php');
			
			$Email = new PHPMailer();
			$Email->SetLanguage("br");
			$Email->IsSMTP(); // Habilita o SMTP 
			$Email->SMTPAuth = true; //Ativa e-mail autenticado
			$Email->Host = 'mail.wesleydesign.com.br'; // Servidor de envio # verificar qual o host correto com a hospedagem as vezes fica como smtp.
			$Email->Port = '587'; // Porta de envio
			$Email->Username = 'davi@agenciasaymon.com.br'; //e-mail que será autenticado
			$Email->Password = 'ivad135'; // senha do email
			// ativa o envio de e-mails em HTML, se false, desativa.
			$Email->IsHTML(true); 
			// email do remetente da mensagem
			$Email->From = 'davi@agenciasaymon.com.br';
			// nome do remetente do email
			$Email->FromName = utf8_decode($email);
			// Endereço de destino do emaail, ou seja, pra onde você quer que a mensagem do formulário vá?
			$Email->AddReplyTo($email, $nome);
			$Email->AddAddress("davi@agenciasaymon.com.br"); // para quem será enviada a mensagem
			// informando no email, o assunto da mensagem
			$Email->Subject = "(Contato do site - seudominio.com.br)";
			// Define o texto da mensagem (aceita HTML)
			$Email->Body .= "<br /><br />
							 <strong>Nome:</strong> $nome<br /><br />
							 <strong>E-mail:</strong> $email<br /><br />
							 <strong>Telefone:</strong> $ddd - $telefone<br /><br />
							 <strong>Assunto:</strong> $assunto<br /><br />
							 <strong>Mensagem:</strong><br /> $mensagem";	
			// verifica se está tudo ok com oa parametros acima, se nao, avisa do erro. Se sim, envia.
			if(!$Email->Send()){
				echo "<p>A mensagem não foi enviada. </p>";
				echo "Erro: " . $Email->ErrorInfo;
			}else{
				echo "<script>location.href='sucesso.html'</script>";
		
			}
			
?>

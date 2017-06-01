<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Atividade;
use AppBundle\Entity\AtividadeRespository;

class AtividadeController extends Controller
{
	public function cadastroAction()
	{
		return $this->render('atividade/cadastro.html.php', array());
	}

	public function saveAction($id=null)
	{
		
		if(isset($_POST)){
			if(isset($_POST['extra'])){
				$_POST['extra'] = 1;
			}

			$service = $this->get('app.atividade');

			if(is_null($id)){
				//novo
				$result = $service->salvar($_POST);
			}else{
				//edita
				$result = $service->salvar($_POST, $id);
			}	

			if($result){
				return $this->redirectToRoute('atividade_lista');
			}	
		}
	}

	public function listaAction($id=null)
	{
		
		$atividade = $this->getDoctrine()->getRepository('AppBundle:Atividade')->findBy(array('is_active' => 1));
		

		if(!$atividade){
            throw $this->createNotFoundException('Sem atividade para listar');
        }else{
        	return $this->render('atividade/lista.html.php', array(
					'atividade' => $atividade
				));
        }
	}

	public function desativaAction($id)
	{
		if(!$id){
            throw $this->createNotFoundException('Sem atividade para desativar');
        }
    	
    	$service = $this->get('app.atividade');
    	$result = $service->desativar($id);
    	
    	if($result){
        	return $this->redirectToRoute('atividade_lista');
        }	
	}

	public function editaAction($id)
	{
		if(!$id){
            throw $this->createNotFoundException('Sem atividade para editar');
        }

		$atividade = $this->getDoctrine()->getRepository('AppBundle:Atividade')->find($id);        
		    
        if(!$atividade){
        	throw $this->createNotFoundException('Sem atividade para editar');
        }else{
        	return $this->render('atividade/edita.html.php', array(
					'atividade' => $atividade,
				));
        }

	}

	public function extraAction()
	{
		
		$atividade = $this->getDoctrine()->getRepository('AppBundle:Atividade')->findBy(array('is_active' => 1, 'extra' => 1));
		$usuario = $this->get('security.token_storage')->getToken()->getUser();		

		if(!$atividade){
            throw $this->createNotFoundException('Sem atividade para listar');
        }else{
        	return $this->render('atividade/extra.html.php', array(
					'atividade' => $atividade,
					'usuario' => $usuario
				));
        }
	}

	public function meuHorarioAction($id)
	{
		if(!$id){
            throw $this->createNotFoundException('Sem atividade para listar');
        }

        $user = $this->get('security.token_storage')->getToken()->getUser();

		$colaborador = $this->getDoctrine()->getRepository('AppBundle:User')->find($user->getId());        
        $horario =  $colaborador->getHorarios();
        $atividade = $this->getDoctrine()->getRepository('AppBundle:Atividade')->find($id);

	 	return $this->render('atividade/meuHorario.html.php', array(
				'horario' => $horario,
				'atividade' => $atividade
		));
        
	}
}
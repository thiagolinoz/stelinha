<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Entity\UserRespository;
use AppBundle\Entity\Horario;
use AppBundle\Entity\HorarioRespository;

class ColaboradorController extends Controller
{
	public function cadastroAction()
	{
		return $this->render('colaborador/cadastro.html.php', array());
	}

	public function saveAction($id=null)
	{
		if(isset($_POST)){
			if(is_null($id)){
				$colaborador = new User();
				$horario = new Horario();

				if(isset($_POST['User']['role'])){
					//formata no padrao database
					$_POST['User']['role'] = 'ROLE_'.strtoupper($_POST['User']['role']);
				}


				if(isset($_POST['User']['password'])){
					//codifica password
					$encoder = $this->container->get('security.password_encoder');
					$encoded = $encoder->encodePassword($colaborador, $_POST['User']['password']);
					//recebe versao codificada
					$_POST['User']['password'] = $encoded;
				}
			
				$colaboradorService = $this->get('app.colaborador');
    			$retorno = $colaboradorService->salvar($_POST,null, $colaborador);
    			$rota = 'colaborador_lista';

			}else{
				
				if(isset($_POST['User']['role'])){
					//formata no padrao database
					$_POST['User']['role'] = 'ROLE_'.strtoupper($_POST['User']['role']);
				}

				if($this->isGranted('ROLE_USER')){
					if($this->getUser()->getId() != $id){
						throw $this->createNotFoundException('Proibido alterar outro usuario');
					}
				}

				$colaboradorService = $this->get('app.colaborador');
    			$retorno = $colaboradorService->salvar($_POST, $id);
    			$rota = 'index';
	    			

			}	
			
			if($retorno){		
				return $this->redirectToRoute($rota);
			}	
		}
	}

	public function listaAction()
	{
		
		$colaborador = $this->getDoctrine()->getRepository('AppBundle:User')->findBy(array('is_active' => 1));
		

		if(!$colaborador){
            throw $this->createNotFoundException('Sem colaboradores para listar');
        }else{
        	return $this->render('colaborador/lista.html.php', array(
					'colaborador' => $colaborador
				));
        }
	}

	public function desativaAction($id)
	{
		if(!$id){
            throw $this->createNotFoundException('Sem colaborador para desativar');
        }
    	
    	$colaborador = $this->get('app.colaborador');
    	$retorno = $colaborador->desativar($id);

    	if($retorno){
        	return $this->redirectToRoute('colaborador_lista');
        }	
	}

	public function editaAction($id)
	{
		if(!$id){
            throw $this->createNotFoundException('Sem colaborador para editar');
        }

        if(!$this->isGranted('ROLE_ADMIN')){
			if($this->getUser()->getId() != $id){
				throw $this->createNotFoundException('Proibido visualizar outro usuario');
			}
		}

		$colaborador = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);        
        $horario =  $colaborador->getHorarios();

		    
        if(!$colaborador){
        	throw $this->createNotFoundException('Sem colaborador para editar');
        }else{
        	return $this->render('colaborador/edita.html.php', array(
					'colaborador' => $colaborador,
					'horario' => $horario
				));
        }

	}
}
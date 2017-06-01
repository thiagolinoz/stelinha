<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Horario;
use AppBundle\Entity\HorarioRespository;
use AppBundle\Entity\Atividade;
use AppBundle\Entity\AtividadeRespository;
use AppBundle\Entity\Cronograma;
use AppBundle\Entity\CronogramaRespository;

class CronogramaController extends Controller
{
	public function listaAction()
	{

		$cronograma = $this->getDoctrine()->getRepository('AppBundle:Cronograma')->findBy(array('is_active' => 1));

	
		return $this->render('cronograma/lista.html.php', array(
				'crono' => $cronograma,
			));
	}

	public function listaMeuAction()
	{
		$idUser = $this->getUser()->getId();
		$cronograma = $this->getDoctrine()->getRepository('AppBundle:Cronograma')->findCronogramaByUser($idUser);
			
        return $this->render('cronograma/lista_meu.html.php', array(
				'crono' => $cronograma
			));

	}

	public function cadastroAction()
	{
		$atividade = $this->getDoctrine()->getRepository('AppBundle:Atividade')->findBy(array('is_active' => 1));

		$horario = $this->getDoctrine()->getRepository('AppBundle:Horario')->findBy(array('is_active' => 1, 'disponivel' => 0));

		return $this->render('cronograma/cadastro.html.php', array(
				'atividade' => $atividade,
				'horario' => $horario
			));
	}

	public function editaAction($id)
	{
		if(!$id){
            throw $this->createNotFoundException('Sem atividade para editar');
        }

        $cronograma = $this->getDoctrine()->getRepository('AppBundle:Cronograma')->findBy(
        	array(
        		'is_active' => 1, 
        		'id' => $id
        		));
        $atividade = $this->getDoctrine()->getRepository('AppBundle:Atividade')->findBy(array('is_active' => 1));

        return $this->render('cronograma/edita.html.php', array(
				'crono' => $cronograma,
				'atividade' => $atividade
			));
	}

	public function gerarHorariosAction($gerar=null)
	{
		if($gerar){
			$atividade = $this->get('app.cronograma');
			$result = $atividade->horarioAtividade();

			if($result){		
					return $this->redirectToRoute('cronograma_lista');
			}
		}else{
			return $this->render('cronograma/gerar.html.php', array());	
		}
		
	}

	public function saveAction($id=null)
	{
		
		$service = $this->get('app.cronograma');

		if(isset($_POST)){
			if(is_null($id)){
				$retorno = $service->salvar($_POST);
			}else{
				$retorno = $service->salvar($_POST,$id);
			}	
					
			if($retorno){		
				return $this->redirectToRoute('cronograma_lista');
			}
				
		}
	}

	public function excluiAction($id)
	{
		if(!$id){
            throw $this->createNotFoundException('Sem cronograma para desativar');
        }
    	
    	$service = $this->get('app.cronograma');
    	$retorno = $service->excluir($id);

    	if($retorno){
        	return $this->redirectToRoute('cronograma_lista');
        }	
	}

	public function userByHorarioAction()
	{
		if(!$_POST){
			throw $this->createNotFoundException('Sem horario para enviar usuario');
		}

		$horario = $this->getDoctrine()->getRepository('AppBundle:Cronograma')->findIdByUser($_POST['id']);

		print_r($horario);
		exit();
	}

	public function horarioByLocalAction()
	{
		if(!$_POST){
			throw $this->createNotFoundException('Sem local para enviar usuario');
		}

		$horario = $this->getDoctrine()->getRepository('AppBundle:Cronograma')->findHorarioByLocal($_POST['id']);

		print_r($horario);
		exit();
	}

	public function finalizaAction($id)
	{
		if(!$id){
			throw $this->createNotFoundException('Sem atividade para finalizar');
		}

		$cronograma = $this->getDoctrine()->getRepository('AppBundle:Cronograma')->findBy(
	    	array(
	    		'is_active' => 1, 
	    		'id' => $id
	    		));

		return $this->render('cronograma/finaliza.html.php', array(
				'crono' => $cronograma,
			));
	}
}
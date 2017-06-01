<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Realizada;
use AppBundle\Entity\RealizadaRespository;
use AppBundle\Entity\Cronograma;
use AppBundle\Entity\CronogramaRespository;

class RealizadaController extends Controller
{
	public function listaAction()
	{

		
		$realizada = $this->getDoctrine()->getRepository('AppBundle:Realizada')->findBy(
			array(
				'is_active' => 1
			));

		return $this->render('realizada/lista.html.php', array('realizada' => $realizada));
	}

	public function cadastroAction()
	{
		$idUser = $this->getUser()->getId();
		$cronograma = $this->getDoctrine()->getRepository('AppBundle:Cronograma')->findCronogramaByUser($idUser); 

		return $this->render('realizada/cadastro.html.php', array(
			'crono' => $cronograma,
			));	       
	}

	public function saveAction($id=null)
	{
        $service = $this->get('app.realizada');

        if(isset($id)){
        	$retorno = $service->salvar($_POST,$id);
        }else{
        	$retorno = $service->salvar($_POST);
        }

        if($retorno){		
			return $this->redirectToRoute('realizada');
		}
	}

	public function editaAction($id)
	{
		if(!$id){
            throw $this->createNotFoundException('Sem atividade para editar');
        }

        $realizada = $this->getDoctrine()->getRepository('AppBundle:Realizada')->findBy(
			array(
				'is_active' => 1,
				'id' => $id,
			));

        return $this->render('realizada/edita.html.php', array('realizada' => $realizada));
	}

	public function excluiAction($id)
	{
		if(!$id){
            throw $this->createNotFoundException('Sem cronograma para desativar');
        }
    	
    	$service = $this->get('app.realizada');
    	$retorno = $service->excluir($id);

    	if($retorno){
        	return $this->redirectToRoute('realizada');
        }	
	}
}
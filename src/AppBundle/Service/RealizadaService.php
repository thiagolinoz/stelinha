<?php
namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Realizada;

class RealizadaService
{
	protected $em;

	public function __construct(EntityManager $em)
	{
		$this->em = $em;
	}

	public function salvar($post,$id=null)
	{
	
		if(isset($id)){
			$realizada = $this->em->getRepository('AppBundle:Realizada')->find($id);	
		}else{
			$cronograma = $this->em->getRepository('AppBundle:Cronograma')->find($_POST['cronograma']);
			$realizada = new Realizada();
			$realizada->setCronograma($cronograma);
		}
		$realizada->setObservacao($post['observacao']);
		$realizada->setHorarioDe($post['horario_de']);
		$realizada->setHorarioAte($post['horario_ate']);
		
		$this->em->persist($realizada);
		$this->em->flush();

		return true;
	}


	public function excluir($id)
	{
		$realizada = $this->em->getRepository('AppBundle:Realizada')->find($id);
		$realizada->setIsActive(0);
		$this->em->persist($realizada);
		$this->em->flush();

		return true;
	}
}
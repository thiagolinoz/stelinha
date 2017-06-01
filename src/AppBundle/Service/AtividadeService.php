<?php
namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Atividade;


class AtividadeService
{
	//entitymanager
	protected $em;

	public function __construct(EntityManager $em)
	{
		$this->em = $em;
	}

	public function salvar($post, $id=null)
	{
		if(is_null($id)){
			$atividade = new Atividade();
		}else{
			$atividade = $this->em->getRepository("AppBundle:Atividade")->find($id);
		}	

		foreach($post as $k => $v){
			//formata p/set
			$label = 'set'.ucfirst($k);
			$atividade->$label($v);
		}

		$this->em->persist($atividade);
		$this->em->flush();	

		return true;
	}

	public function desativar($id)
	{
		$atividade = $this->em->getRepository('AppBundle:Atividade')->find($id);
		$atividade->setIsActive(0);

		$this->em->persist($atividade);
		$this->em->flush();	

		return true;
	}    
}
<?php
namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Cronograma;


class CronogramaService
{
	protected $em;

	public function __construct(EntityManager $em)
	{
		$this->em = $em;
	}

	public function horarioAtividade()
	{
		//seleciona horarios de atividade q batam c horarios do colaboradores
		$result = $this->em->createQuery('SELECT u.id as user_id, h.id as horario_id, h.horario_de, h.horario_ate, h.dia, a.id as atividade_id, a.horario_de as atividade_de, a.horario_ate as atividade_ate FROM AppBundle:Atividade a JOIN AppBundle:Horario h WITH h.horario_de <= a.horario_de AND h.horario_ate >= a.horario_ate JOIN AppBundle:User u WITH h.user = u.id WHERE a.extra = 0 AND h.disponivel = 0 AND a.is_active = 1 AND u.is_active = 1 AND h.is_active = 1');

		foreach($result->getResult() as $obj){
			$this->saveAutoCrono($obj);
		}

		return true;
	}

	private function saveAutoCrono($obj)
	{
		//salva horarios gerados
		$totalHoras = $obj['atividade_ate']->format("H:i:s") - $obj['atividade_de']->format("H:i:s");

		$atividade = $this->em->getRepository("AppBundle:Atividade")->find($obj['atividade_id']);
		$horario = $this->em->getRepository("AppBundle:Horario")->find($obj['horario_id']);

		$cronograma = new Cronograma();

		$cronograma->setAtividade($atividade);
		$cronograma->setTotalHoras($totalHoras);
		$cronograma->setHorario($horario);
		$horario->setDisponivel(1);

		$this->em->persist($horario);
		$this->em->persist($cronograma);
		$this->em->flush();

		return true;
	}

	public function salvar($post, $id=null)
	{
		$atividade = $this->em->getRepository("AppBundle:Atividade")->find($post['atividade']);		
		
		if(is_null($id)){
			$horario = $this->em->getRepository("AppBundle:Horario")->find($post['horario']);
			$cronograma = new Cronograma();
			$cronograma->setAtividade($atividade);
			$cronograma->setHorario($horario);
			$cronograma->setTotalHoras(0);
			$horario->setDisponivel(1);
			$this->em->persist($horario);
		}else{
			$cronograma = $this->em->getRepository('AppBundle:Cronograma')->find($id);

			$cronograma->setAtividade($atividade);
			$cronograma->setHorarioDe($post['horario_de']);
			$cronograma->setHorarioAte($post['horario_ate']);
			$cronograma->setObservacao($post['observacao']);
		}

		$this->em->persist($cronograma);
		$this->em->flush();	

		return true;
	}

	public function excluir($id)
	{
		$cronograma = $this->em->getRepository('AppBundle:Cronograma')->find($id);
		$cronograma->setIsActive(0);

		$this->em->persist($cronograma);
		$this->em->flush();	

		return true;

	}    
}